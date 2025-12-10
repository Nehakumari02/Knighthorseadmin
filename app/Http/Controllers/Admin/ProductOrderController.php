<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PaymentGatewayCurrency;
use Illuminate\Support\Facades\Notification;
use App\Providers\Admin\BasicSettingsProvider;
use App\Traits\PaymentGateway\PaystackGateway;
use App\Http\Helpers\PaymentGateway as PaymentGatewayHelper;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Constants\GlobalConst;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\BasicSettings;
use App\Models\Admin\PaymentGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Constants\PaymentGatewayConst;
use App\Models\Admin\BookingTempData;
use App\Models\Admin\CryptoTransaction;
use App\Models\Admin\DeliverySettings;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\Product;
use App\Models\Admin\ProductOrder;
use App\Models\Admin\Shipment;
use App\Models\Admin\TempCart;
use App\Models\Admin\TransactionSetting;
use App\Models\TemporaryData;
use App\Models\User;
use App\Models\UserNotification;
use App\Notifications\EmailNotification;

class ProductOrderController extends Controller
{
    use PaystackGateway;
    /**
     * Method for confirm the booking
     * @param $slug
     * @param \Illuminate\Http\Request $request
     */
    public function confirm(Request $request, PaymentGatewayCurrency $gateway_currency)
    {
        $validator = Validator::make($request->all(), [
            'user_cart'              => 'required|string',
            'delivery_charge'        => 'required',
            'address'                => 'nullable',
            'phone'                  => 'required|string',
            'email'                  => "nullable",
            'notes'                  => "nullable",
            'total_cost'             => "required",
            'payment_method'         => 'required',
            'reusable_bag'           => 'nullable',

            'delivery_date.*'        => 'required|date',
            'time_slots'             => 'required|array',
            'time_slots.*.start'     => 'required',
            'time_slots.*.end'       => 'required',
            'delivery_type'          => 'required',

            "together_time_slot_start" => "nullable",
            "together_time_slot_end"   => "nullable",
            "together_delivery_date"   => "nullable",

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }
        $validated = $validator->validate();

        $userCart = json_decode($validated['user_cart'], true);

        $booking_data = [
            'user_cart'     => $userCart,
            'delivery_info' => [
                'address'         => $validated['address'],
                'phone'           => $validated['phone'],
                'email'           => $validated['email'],
                'delivery_charge' => $validated['delivery_charge'],
                'notes'           => $validated['notes'],
                'reusable_bag'    => $validated['reusable_bag'] ?? '0',
                'delivery_type'   => $validated['delivery_type'],
            ],
            'shipment_info' => [
                'delivery_date'            => $request->delivery_date,
                'time_slots'               => $validated['time_slots'],
                'together_time_slot_start' => $validated['together_time_slot_start'],
                'together_time_slot_end'   => $validated['together_time_slot_end'],
                'together_delivery_date'   => $validated['together_delivery_date'],
            ],
            'payment_method' => $validated['payment_method'],
            'total_cost'     => $validated['total_cost'],
        ];

        $booking_temp_data = [
            'uuid'    => Str::uuid(),
            'user_id' => auth()->user()->id,
            'data'    => $booking_data,
        ];

        $booking_temp_data = BookingTempData::create($booking_temp_data);

        $otp_exp_sec = GlobalConst::BOOKING_EXP_SEC;
        $temp_cart   = TempCart::where('id', $userCart['id'])->first();

        if ($temp_cart->created_at->addSeconds($otp_exp_sec) < now()) {
            $temp_cart->delete();
            return redirect()->route('frontend.index')->with(['error' => [__('Booking Time Out!')]]);
        }

        $user = auth()->user();

        $charge_data = TransactionSetting::where('slug', 'doctor')->where('status', 1)->first();

        $price       = floatval($booking_data['total_cost']);
        $total_price = $price;




        if ($validated['payment_method'] == GlobalConst::CASH_PAYMENT || $validated['payment_method'] == GlobalConst::WALLET_PAYMENT) {
            $user = auth()->user();

            if ($validated['payment_method'] == GlobalConst::WALLET_PAYMENT && $total_price > $user->wallets->balance) {
                return
                    back()->with(['error' => ['Your wallet balance is insufficient.']]);
            }

            $order = Order::create([
                'user_id'        => auth('')->user()->id,
                'order_status'   => PaymentGatewayConst::STATUS_PENDING,
                'payment_status' => GlobalConst::UNPAID,
                'total_amount'   => 0,
            ]);

            $total = 0;
            $system_default_lang = get_default_language_code();
            foreach ($userCart['data'] as $item) {

                $product  = Product::findOrFail($item['id']);
                $price    = $item['price'];
                $quantity = $item['quantity'];

                if ($product->available_quantity < $quantity) {
                    return back()->with(['error' => ['Insufficient stock on' . " ". $product->data->language->$system_default_lang->name]]);
                }

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => $quantity,
                    'price'      => $price,
                ]);

                $total += $price * $quantity;
            }


            $order->total_amount = $total;
            $order->save();
            try {
                $trx_id        = generateTrxString('product_orders', 'trx_id', 'PB', 8);
                $product_order = ProductOrder::create([
                    'trx_id'             => $trx_id,
                    'booking_data'       => ['data' => $booking_data],
                    'order_id'           => $order->id,

                    'payment_method'    => $validated['payment_method'] == GlobalConst::WALLET_PAYMENT ? GlobalConst::WALLET_PAYMENT : GlobalConst::CASH_PAYMENT,
                    'uuid'              => $temp_cart->uuid,
                    'type'              => $validated['payment_method'] == GlobalConst::WALLET_PAYMENT ? GlobalConst::WALLET_PAYMENT : GlobalConst::CASH_PAYMENT,
                    'user_id'           => $user->id,
                    'total_charge'      => 0,
                    'price'             => $price,
                    'payable_price'     => $total_price,
                    'remark'            => $validated['payment_method'] == GlobalConst::WALLET_PAYMENT ? 'PAY VIA WALLET' : GlobalConst::CASH_PAYMENT,
                    'status'            => PaymentGatewayConst::STATUS_PENDING,
                ]);
                if ($request->delivery_type == 'separate') {

                    foreach ($request->delivery_date as $shipment_id => $date) {

                        $shipment = Shipment::where('id', $shipment_id)->first();
                        OrderShipment::create([
                            'product_order_id' => $product_order->id,
                            'start_time'       => $validated['time_slots'][$item['shipment_type']]['start'],
                            'end_time'         => $validated['time_slots'][$item['shipment_type']]['end'],
                            'delivery_date'    => $validated['delivery_date'][$item['shipment_type']],
                            'delivery_charge'  => $shipment->delivery_charge,
                            'shipment_id'      => $shipment_id,
                            'user_id'          => $user->id,
                            'shipment_status'  => GlobalConst::BOOKED,
                            'tracking_number'  => Str::uuid(),
                        ]);
                    }
                }


                if ($request->delivery_type == 'together') {
                    $shipment = Shipment::where('default', true)->first();

                    OrderShipment::create([
                        'product_order_id' => $product_order->id,
                        'start_time'       => $request->together_time_slot_start,
                        'end_time'         => $request->together_time_slot_end,
                        'delivery_date'    => $request->together_delivery_date,
                        'delivery_charge'  => $shipment->delivery_charge,
                        'shipment_id'      => $shipment->id,
                        'user_id'          => auth()->user()->id,
                        'shipment_status'  => GlobalConst::BOOKED,
                        'tracking_number'  => Str::uuid(),
                    ]);
                }


                $cartItems = $booking_data['user_cart']['data'];

                foreach ($cartItems as $item) {

                    $product = Product::find($item['id']);

                    if ($product) {
                        $newQuantity = $product->available_quantity - $item['quantity'];


                        $newQuantity = max(0, $newQuantity);

                        $product->update([
                            'available_quantity' => $newQuantity
                        ]);
                    }
                }

                //free delivery logic

                $deliverySettings = DeliverySettings::first();
                if ($deliverySettings->free_delivery_status == 1) {

                    if ($user->free_delivery_status == 1) {
                        $total = $user->total_spend_amount + $userCart['sub_total'];

                        User::where('id', $user->id)
                            ->update([
                                'total_spend_amount' => $total
                            ]);
                    } else {
                        User::where('id', $user->id)
                            ->update([
                                'free_delivery_token' => max($user->free_delivery_token - 1, 0)
                            ]);
                    }

                    $user->refresh();
                    if ($user->total_spend_amount > $deliverySettings->amount_spend) {
                        User::where('id', $user->id)
                            ->update([
                                'free_delivery_token'  => $deliverySettings->delivery_count,
                                'total_spend_amount'   => null,
                                'free_delivery_status' => false
                            ]);
                    }

                    $user->refresh();

                    if ($user->free_delivery_token == 0 && $user->free_delivery_status == 0) {
                        User::where('id', $user->id)
                            ->update([
                                'total_spend_amount'   => null,
                                'free_delivery_status' => 1,
                            ]);
                    }
                }




                //wallet payment
                if ($validated['payment_method'] == GlobalConst::WALLET_PAYMENT) {
                    $user->wallets->update([
                        'balance' => $user->wallets->balance - $total_price,
                    ]);
                }

                $basic_setting = BasicSettings::first();
                $booking       = TempCart::where('id', $booking_data['user_cart']['id'])->first();

                $products = $booking_data['user_cart'];
                $product  = $products['data'];



                try {
                    $trx_id = generateTrxString('product_order', 'trx_id', 'PB', 8);

                    if ($basic_setting->email_notification == true) {

                        Notification::route("mail", $user->email)->notify(new EmailNotification($user, $booking, $trx_id));
                    }
                } catch (Exception $e) {
                }

                TempCart::where('id', $booking_data['user_cart']['id'])->delete();
                session()->forget('cart');
            } catch (Exception $e) {

                return back()->with(['error' => ['Something went wrong! Please try again.']]);
            }
            return redirect()->route('user.order.details.index')->with(['success' => [__('Congratulations! Order Confirmed Successfully.')]]);
        } else {

            $validated = Validator::make($request->all(), [
                'amount'            => 'required|numeric|gt:0',
                'gateway_currency'  => 'required|string|exists:' . $gateway_currency->getTable() . ',alias',
            ])->validate();

            $request->merge([
                'currency'     => $validated['gateway_currency'],
                'booking_data' => $booking_temp_data,
            ]);

            try {
                $instance = PaymentGatewayHelper::init($request->all())->type(PaymentGatewayConst::PAYMENTMETHOD)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->gateway()->render();
            } catch (Exception $e) {
                return back()->with(['error' => [$e->getMessage()]]);
            }

            return $instance;
        }
    }




    public function success(Request $request, $gateway)
    {
        try {

            $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
            $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();


            if (Transaction::where('callback_ref', $token)->exists()) {
                if (!$temp_data) {
                    return redirect()->route('user.my.booking.index')->with(['success' => ['Transaction request sended successfully!']]);
                };
            } else {
                if (!$temp_data) {
                    return redirect()->route('frontend.index')->with(['error' => ['Transaction failed. Record didn\'t saved properly. Please try again.']]);
                }
            }

            $update_temp_data                  = json_decode(json_encode($temp_data->data), true);
            $update_temp_data['callback_data'] = $request->all();

            $temp_data->update([
                'data'  => $update_temp_data,
            ]);

            $temp_data = $temp_data->toArray();
            $instance  = PaymentGatewayHelper::init($temp_data)->type(PaymentGatewayConst::PAYMENTMETHOD)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->responseReceive();
            if ($instance instanceof RedirectResponse) {
                return $instance;
            }

            session()->forget('cart');
            $cartItems = $temp_data['data']->booking_data->data->user_cart->data;
            $sub_total = $temp_data['data']->booking_data->data->user_cart->sub_total;

            // quantity logic
            foreach ($cartItems as $item) {
                $product = Product::find($item->id);

                if ($product) {
                    $newQuantity = $product->available_quantity - $item->quantity;

                    $newQuantity = max(0, $newQuantity);

                    $product->update([
                        'available_quantity' => $newQuantity
                    ]);
                }
            }

            //free delivery logic

            $user             = auth()->user();
            $deliverySettings = DeliverySettings::first();
            if ($deliverySettings->free_delivery_status == 1) {

                if ($user->free_delivery_status == 1) {
                    $total = $user->total_spend_amount + $sub_total;

                    User::where('id', $user->id)
                        ->update([
                            'total_spend_amount' => $total
                        ]);
                } else {
                    User::where('id', $user->id)
                        ->update([
                            'free_delivery_token' => max($user->free_delivery_token - 1, 0)
                        ]);
                }

                $user->refresh();
                if ($user->total_spend_amount > $deliverySettings->amount_spend) {
                    User::where('id', $user->id)
                        ->update([
                            'free_delivery_token'  => $deliverySettings->delivery_count,
                            'total_spend_amount'   => null,
                            'free_delivery_status' => false
                        ]);
                }

                $user->refresh();

                if ($user->free_delivery_token == 0 && $user->free_delivery_status == 0) {
                    User::where('id', $user->id)
                        ->update([
                            'total_spend_amount'   => null,
                            'free_delivery_status' => 1,
                        ]);
                }
            }


            $basic_setting = BasicSettings::first();
            $booking       = TempCart::where('id', $temp_data['data']->booking_data->data->user_cart->id)->first();
            $products      = $temp_data['data']->booking_data->data->user_cart;
            $product       = $products->data;

            try {
                $trx_id = generateTrxString('product_order', 'trx_id', 'PB', 8);

                if ($basic_setting->email_notification == true) {

                    Notification::route("mail", $user->email)->notify(new EmailNotification($user, $booking, $trx_id));
                }
            } catch (Exception $e) {
            }

            TempCart::where('id', $temp_data['data']->booking_data->data->user_cart->id)->delete();
        } catch (Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }

        return redirect()->route("user.order.details.index")->with(['success' => [__('Congratulations! Order Confirmed Successfully.')]]);
    }

    public function cancel(Request $request, $gateway)
    {
        $token = PaymentGatewayHelper::getToken($request->all(), $gateway);
        if ($temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first()) {
            $temp_data->delete();
        }

        return redirect()->route('frontend.index');
    }

    public function postSuccess(Request $request, $gateway)
    {
        try {
            $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
            $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();
            Auth::guard($temp_data->data->creator_guard)->loginUsingId($temp_data->data->creator_id);
        } catch (Exception $e) {
            return redirect()->route('frontend.index');
        }

        return $this->success($request, $gateway);
    }

    public function postCancel(Request $request, $gateway)
    {
        try {
            $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
            $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();
            Auth::guard($temp_data->data->creator_guard)->loginUsingId($temp_data->data->creator_id);
        } catch (Exception $e) {
            return redirect()->route('frontend.index');
        }

        return $this->cancel($request, $gateway);
    }

    public function callback(Request $request, $gateway)
    {

        $callback_token = $request->get('token');
        $callback_data  = $request->all();

        try {
            PaymentGatewayHelper::init([])->type(PaymentGatewayConst::PAYMENTMETHOD)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->handleCallback($callback_token, $callback_data, $gateway);
        } catch (Exception $e) {
            // handle Error
            logger($e);
        }
    }



    public function cryptoPaymentAddress(Request $request, $trx_id)
    {

        $page_title  = "Crypto Payment Address";
        $transaction = Transaction::where('trx_id', $trx_id)->firstOrFail();

        if ($transaction->gateway_currency->gateway->isCrypto() && $transaction->details?->payment_info?->receiver_address ?? false) {
            return view('user.sections.add-money.payment.crypto.address', compact(
                'transaction',
                'page_title',
            ));
        }

        return abort(404);
    }

    public function cryptoPaymentConfirm(Request $request, $trx_id)
    {
        $transaction = Transaction::where('trx_id', $trx_id)->where('status', PaymentGatewayConst::STATUS_WAITING)->firstOrFail();

        $dy_input_fields  = $transaction->details->payment_info->requirements ?? [];
        $validation_rules = $this->generateValidationRules($dy_input_fields);

        $validated = [];
        if (count($validation_rules) > 0) {
            $validated = Validator::make($request->all(), $validation_rules)->validate();
        }

        if (!isset($validated['txn_hash'])) {
            return back()->with(['error' => ['Transaction hash is required for verify']]);
        }

        $receiver_address = $transaction->details->payment_info->receiver_address ?? "";

        // check hash is valid or not
        $crypto_transaction = CryptoTransaction::where('txn_hash', $validated['txn_hash'])
            ->where('receiver_address', $receiver_address)
            ->where('asset', $transaction->gateway_currency->currency_code)
            ->where(function ($query) {
                return $query->where('transaction_type', "Native")
                    ->orWhere('transaction_type', "native");
            })
            ->where('status', PaymentGatewayConst::NOT_USED)
            ->first();

        if (!$crypto_transaction) {
            return back()->with(['error' => ['Transaction hash is not valid! Please input a valid hash']]);
        }

        if ($crypto_transaction->amount >= $transaction->total_payable == false) {
            if (!$crypto_transaction) {
                return back()->with(['error' => ['Insufficient amount added. Please contact with system administrator']]);
            }
        }

        DB::beginTransaction();
        try {

            // Update user wallet balance
            DB::table($transaction->creator_wallet->getTable())
                ->where('id', $transaction->creator_wallet->id)
                ->increment('balance', $transaction->receive_amount);

            // update crypto transaction as used
            DB::table($crypto_transaction->getTable())->where('id', $crypto_transaction->id)->update([
                'status'        => PaymentGatewayConst::USED,
            ]);

            // update transaction status
            $transaction_details                             = json_decode(json_encode($transaction->details), true);
            $transaction_details['payment_info']['txn_hash'] = $validated['txn_hash'];

            DB::table($transaction->getTable())->where('id', $transaction->id)->update([
                'details'       => json_encode($transaction_details),
                'status'        => PaymentGatewayConst::STATUS_SUCCESS,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Payment Confirmation Success!']]);
    }

    public function redirectUsingHTMLForm(Request $request, $gateway)
    {
        $temp_data = TemporaryData::where('identifier', $request->token)->first();
        if (!$temp_data || $temp_data->data->action_type != PaymentGatewayConst::REDIRECT_USING_HTML_FORM) {
            return back()->with(['error' => ['Request token is invalid!']]);
        }
        $redirect_form_data = $temp_data->data->redirect_form_data;
        $action_url         = $temp_data->data->action_url;
        $form_method        = $temp_data->data->form_method;

        return view('payment-gateway.redirect-form', compact('redirect_form_data', 'action_url', 'form_method'));
    }

    /**
     * Redirect Users for collecting payment via Button Pay (JS Checkout)
     */
    public function redirectBtnPay(Request $request, $gateway)
    {
        try {
            return PaymentGatewayHelper::init([])->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->handleBtnPay($gateway, $request->all());
        } catch (Exception $e) {
            return redirect()->route('user.dashboard')->with(['error' => [$e->getMessage()]]);
        }
    }

    /**
     * Method for paystack pay callback
     */
    public function paystackPayCallBack(Request $request)
    {
        $instance = $this->paystackSuccess($request->all());
        return redirect()->route("user.order.details.index")->with(['success' => [__('Congratulations! Order Confirmed Successfully.')]]);
    }
}
