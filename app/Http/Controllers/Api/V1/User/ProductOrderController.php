<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\TemporaryData;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use App\Models\UserNotification;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\BasicSettings;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\BookingTempData;
use App\Constants\PaymentGatewayConst;
use App\Models\Admin\CryptoTransaction;
use App\Models\Admin\TransactionSetting;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\PaymentGatewayCurrency;
use App\Http\Helpers\PaymentGateway as PaymentGatewayHelper;
use App\Models\Admin\DeliverySettings;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\PaymentGateway;
use App\Models\Admin\Product;
use App\Models\Admin\ProductOrder;
use App\Models\Admin\Shipment;
use App\Models\Admin\TempCart;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailNotification;
use Srmklive\PayPal\Facades\PayPal;
use App\Traits\PaymentGateway\PaystackGateway;

class ProductOrderController extends Controller
{
    use PaystackGateway;
    public function getPaymentGateways()
    {

        try {
            $image_paths = [
                'base_url'          => url("/"),
                'path_location'     => files_asset_path_basename("payment-gateways"),
                'default_image'     => files_asset_path_basename("default"),
            ];

            $payment_gateways = PaymentGateway::where('status', true)->where('type', 'AUTOMATIC')->get();
            $payment_gateways->makeHidden(['credentials', 'created_at', 'input_fields', 'last_edit_by', 'updated_at', 'supported_currencies', 'image', 'env', 'slug', 'title', 'alias', 'code']);
        } catch (Exception $e) {
            return Response::error([__('Failed to fetch data. Please try again')], [], 500);
        }

        return Response::success([__('Payment gateway fetch successfully!')], [
            'image_path'       => $image_paths,
            'payment_gateways' => $payment_gateways,
        ], 200);
    }
    public function userCartInsert(Request $request)
    {

        $user_id = auth()->user()->id;
        $temp    = TempCart::where("user_id", $user_id)->first();


        $cart = $request->input('cart', []);



        if ($temp != null) {

            $tempCart = $temp->update(
                [
                    'data'      => (object)$cart,
                    'status'    => true,
                    'checkout'  => false,
                    'sub_total' => $request->sub_total
                ]
            );
        } else {

            $tempCart = TempCart::updateOrCreate(
                [
                    'user_id'    => $user_id ?? null,
                    'session_id' => null
                ],
                [
                    'data'       => (object)$cart,
                    'status'     => true,
                    'checkout'   => false,
                    'uuid'       => Str::uuid(),
                    'session_id' => null,
                    'sub_total'  => $request->sub_total
                ]
            );
        }

        return Response::success([__("Cart Data Store successfully")], [
            'user_cart' => $tempCart,
        ], 200);
    }
    public function userCartInsertSingle(Request $request)
    {
        $user_id     = auth()->user()->id;
        $tempCart    = TempCart::where("user_id", $user_id)->first();
        $newCartData = $request->input('cart', []);


        if ($tempCart != null) {
            $existingCartData = (array)$tempCart->data;
            $mergedCart       = [];

            foreach ($existingCartData as $item) {
                $item         = (array)$item;
                $mergedCart[] = $item;
            }
            $mergedCart[] = $newCartData;

            // dd($mergedCart);

            $tempCart = $tempCart->update(
                [
                    'data'      => (object)$mergedCart,
                    'status'    => true,
                    'checkout'  => false,
                    'sub_total' => $request->sub_total
                ]
            );
        } else {
            $mergedCart = [];

            $mergedCart[] = $newCartData;

            $tempCart = TempCart::updateOrCreate(
                [
                    'user_id'    => $user_id ?? null,
                    'session_id' => null
                ],
                [
                    'data'       => (object)$mergedCart,
                    'status'     => true,
                    'checkout'   => false,
                    'uuid'       => Str::uuid(),
                    'session_id' => null,
                    'sub_total'  => $request->sub_total
                ]
            );
        }
        return Response::success([__("Cart Data Store successfully")], [
            'user_cart' => $tempCart,
        ], 200);
    }
    public function userCartDelete(Request $request)
    {
        $user_id  = auth()->user()->id;
        $tempCart = TempCart::where("user_id", $user_id)->first();

        $cartData = (array)$tempCart->data;

        if (!$tempCart) {
            return Response::error(__('Cart not found'), 404);
        }

        $product_id = $request->product_id;


        if ($cartData) {
            $updatedCart = array_filter($cartData, function ($item) {
                $item = (array)$item;
                if ($item['id'] === []) {

                    return Response::success([__('Product not found in cart')], 200);
                }
            });
        }


        // Filter out the item to be deleted
        $updatedCart = array_filter($cartData, function ($item) use ($product_id) {
            $item = (array)$item;

            return $item['id'] != $product_id;
        });

        // Update the cart
        $tempCart->update([
            'data' => $updatedCart,
        ]);

        return Response::success([__('Item removed from cart successfully')], 200);
    }


    public function userCart()
    {
         cleanDuplicateTempCarts();
        $temp_cart = TempCart::where('user_id', auth()->user()->id)->latest()->first();
        $cart_data = [];

        if ($temp_cart) {
            foreach ((array)$temp_cart->data as $data) {
                $cart_data[] = [
                    'id'            => $data->id            ?? null,
                    'name'          => $data->name          ?? null,
                    'price'         => $data->price         ?? null,
                    
                    'main_price'    => $data->main_price    ?? null,
                    'shipment_type' => $data->shipment_type ?? null,
                    'offer_price'   => $data->offer_price   ?? null,
                    'image'         => $data->image         ?? null,
                    'quantity'      => $data->quantity      ?? null,
                    'available_quantity'      => $data->available_quantity      ?? null,
                ];
            }
        }

        return Response::success([__("Cart Data fetched successfully")], [
            'user_cart' => $temp_cart ? $temp_cart->toArray() : null,
            'cart_data' => $cart_data,
        ], 200);
    }

    public function cashPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_id'                  => 'required|string',
            'delivery_date'            => 'nullable',
            'delivery_charge'          => 'required',
            'address'                  => 'nullable',
            'phone'                    => 'nullable',
            'email'                    => "nullable",
            'notes'                    => "nullable",
            'total_cost'               => "required",
            'payment_method'           => 'required',
            'reusable_bag'             => 'nullable',

            'delivery_date.*'    => 'nullable',
            'time_slots'         => 'nullable|array',
            'time_slots.*.start' => 'nullable',
            'time_slots.*.end'   => 'nullable',
            'delivery_type'      => 'required',

            "together_time_slot_start" => "nullable",
            "together_time_slot_end"   => "nullable",
            "together_delivery_date"   => "nullable",

        ]);

        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), []);
        }
        $validated = $validator->validate();

        $cart_data = TempCart::where('id', $request->cart_id)->first();
        $userCart  = json_decode($cart_data, true);
        // dd($cart_data);
        $temp_cart = TempCart::where('id', $userCart['id'])->first();
        $userCart  = json_decode($cart_data, true);

        // $booking_data = [
        //     'user_cart' => $userCart,
        //     'delivery_info' => [
        //         'delivery_date' => $validated['delivery_date'],
        //         'address' => $validated['address'],
        //         'phone' => $validated['phone'],
        //         'email' => $validated['email'],
        //         'delivery_charge' => $validated['delivery_charge'],
        //         'notes' => $validated['notes'],
        //         'reusable_bag' => $validated['reusable_bag'] ?? '0',
        //         'delivery_type' => $validated['delivery_type'],
        //     ],
        //     'shipment_info' => [
        //         'delivery_date' => $validated['delivery_date'],
        //         'time_slots' => $validated['time_slots'],
        //         'together_time_slot_start' => $validated['together_time_slot_start'],
        //         'together_time_slot_end' => $validated['together_time_slot_end'],
        //         'together_delivery_date' => $validated['together_delivery_date'],
        //     ],
        //     'payment_method' => $validated['payment_method'],
        //     'total_cost' => $validated['total_cost'],
        // ];
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
            'payment_method' => $validated['payment_method'],
            'total_cost'     => $validated['total_cost'],
        ];

        // Add shipment_info based on delivery type
        if ($request->delivery_type == 'separate') {
            $booking_data['shipment_info'] = [
                'delivery_date' => $validated['delivery_date'],
                'time_slots'    => $validated['time_slots'],
            ];
        } elseif ($request->delivery_type == 'together') {
            $booking_data['shipment_info'] = [
                'together_time_slot_start' => $validated['together_time_slot_start'],
                'together_time_slot_end'   => $validated['together_time_slot_end'],
                'together_delivery_date'   => $validated['together_delivery_date'],
            ];
        }

        $booking_temp_data = [
            'uuid'    => Str::uuid(),
            'user_id' => auth()->user()->id,
            'data'    => $booking_data,
        ];

        $booking_temp_data = BookingTempData::create($booking_temp_data);

        $charge_data = TransactionSetting::where('slug', 'doctor')->where('status', 1)->first();

        $price       = floatval($booking_data['total_cost']);
        $total_price = $price;

        try {
            if ($validated['payment_method'] == GlobalConst::CASH_PAYMENT || $validated['payment_method'] == GlobalConst::WALLET_PAYMENT) {
                $user = auth()->user();

                if ($validated['payment_method'] == GlobalConst::WALLET_PAYMENT && $total_price > $user->wallets->balance) {
                    return Response::error([__('Your wallet balance is insufficient.')], [], 400);
                }

                $order = Order::create([
                    'user_id'        => $user->id,
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
                        return Response::error([__('Insufficient stock'.' '.$product->data->language->$system_default_lang->name)], [], 400);
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

                $trx_id        = generateTrxString('product_orders', 'trx_id', 'PB', 8);
                $product_order = ProductOrder::create([
                    'trx_id'         => $trx_id,
                    'booking_data'   => ['data' => $booking_data],
                    'order_id'       => $order->id,
                    'payment_method' => $validated['payment_method'] == GlobalConst::WALLET_PAYMENT ? GlobalConst::WALLET_PAYMENT : GlobalConst::CASH_PAYMENT,
                    'uuid'           => $temp_cart->uuid,
                    'type'           => $validated['payment_method'] == GlobalConst::WALLET_PAYMENT ? GlobalConst::WALLET_PAYMENT : GlobalConst::CASH_PAYMENT,
                    'user_id'        => $user->id,
                    'total_charge'   => 0,
                    'price'          => $price,
                    'payable_price'  => $total_price,
                    'remark'         => $validated['payment_method'] == GlobalConst::WALLET_PAYMENT ? 'PAY VIA WALLET' : GlobalConst::CASH_PAYMENT,
                    'status'         => PaymentGatewayConst::STATUS_PENDING,
                ]);

                if ($request->delivery_type == 'separate') {
                    foreach ($request->delivery_date as $shipment_id => $date) {

                        $shipment = Shipment::where('id', $shipment_id)->first();
                        OrderShipment::create([
                            'product_order_id' => $product_order->id,
                            'start_time'       => $validated['time_slots'][$item['shipment_type']]['start'],
                            'end_time'         => $validated['time_slots'][$item['shipment_type']]['end'],
                            'delivery_date'    => $validated['delivery_date'][$item['shipment_type']],
                            'shipment_id'      => $shipment_id,
                            'delivery_charge'  => $shipment->delivery_charge,
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
                        'user_id'          => $user->id,
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
                        $product->update(['available_quantity' => $newQuantity]);
                    }
                }

                // Free delivery logic
                $deliverySettings = DeliverySettings::first();
                if ($deliverySettings->free_delivery_status == 1) {

                    if ($user->free_delivery_status == 1) {
                        $total = $user->total_spend_amount + $userCart['sub_total'];
                        $user->update(['total_spend_amount' => $total]);
                    } else {
                        $user->update(['free_delivery_token' => max($user->free_delivery_token - 1, 0)]);
                    }

                    $user->refresh();
                    if ($user->total_spend_amount > $deliverySettings->amount_spend) {
                        $user->update([
                            'free_delivery_token'  => $deliverySettings->delivery_count,
                            'total_spend_amount'   => null,
                            'free_delivery_status' => false
                        ]);
                    }

                    $user->refresh();
                    if ($user->free_delivery_token == 0 && $user->free_delivery_status == 0) {
                        $user->update([
                            'total_spend_amount'   => null,
                            'free_delivery_status' => 1,
                        ]);
                    }
                }

                if ($validated['payment_method'] == GlobalConst::WALLET_PAYMENT) {
                    $user->wallets->update(['balance' => $user->wallets->balance - $total_price]);
                }

                $basic_setting = BasicSettings::first();
                $booking       = TempCart::where('id', $booking_data['user_cart']['id'])->first();
                $products      = $booking_data['user_cart'];
                $product       = $products['data'];
                $productNames  = implode(', ', array_column($product, 'name'));

                TempCart::where('id', $booking_data['user_cart']['id'])->delete();
                session()->forget('cart');

                return Response::success([__('Order confirmed successfully!')], [
                    'order_id'     => $order->id,
                    'trx_id'       => $trx_id,
                    'total_amount' => $total,
                    'products'     => $product
                ], 200);
            }
        } catch (Exception $e) {
            return Response::error([__('Something went wrong! Please try again')], [], 500);
        }

        return Response::error(['Invalid payment method.']);
    }


    public function automaticSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_id'                  => 'required|string',
            'delivery_date'            => 'nullable',
            'delivery_charge'          => 'required',
            'address'                  => 'nullable',
            'phone'                    => 'nullable',
            'email'                    => "nullable",
            'notes'                    => "nullable",
            'total_cost'               => "required",
            'payment_method'           => 'required',
            'reusable_bag'             => 'nullable',

            'delivery_date.*'    => 'nullable',
            'time_slots'         => 'nullable|array',
            'time_slots.*.start' => 'nullable',
            'time_slots.*.end'   => 'nullable',
            'delivery_type'      => 'nullable',

            "together_time_slot_start" => "nullable",
            "together_time_slot_end"   => "nullable",
            "together_delivery_date"   => "nullable",

        ]);

        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), []);
        }
        $validated = $validator->validate();

        $cart_data = TempCart::where('id', $request->cart_id)->first();
        $userCart  = json_decode($cart_data, true);

        // $booking_data = [
        //     'user_cart' => $userCart,
        //     'delivery_info' => [
        //         'delivery_date' => $validated['delivery_date'],
        //         'address' => $validated['address'],
        //         'phone' => $validated['phone'],
        //         'email' => $validated['email'],
        //         'delivery_charge' => $validated['delivery_charge'],
        //         'notes' => $validated['notes'],
        //         'reusable_bag' => $validated['reusable_bag'] ?? '0',
        //         'delivery_type' => $validated['delivery_type'],
        //     ],
        //     'shipment_info' => [
        //         'time_slots' => $validated['time_slots'],
        //         'together_time_slot_start' => $validated['together_time_slot_start'],
        //         'together_time_slot_end' => $validated['together_time_slot_end'],
        //         'together_delivery_date' => $validated['together_delivery_date'],
        //     ],
        //     'payment_method' => $validated['payment_method'],
        //     'total_cost' => $validated['total_cost'],
        // ];

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
            'payment_method' => $validated['payment_method'],
            'total_cost'     => $validated['total_cost'],
        ];

        // Add shipment_info based on delivery type
        if ($request->delivery_type == 'separate') {
            $booking_data['shipment_info'] = [
                'delivery_date' => $validated['delivery_date'],
                'time_slots'    => $validated['time_slots'],
            ];
        } elseif ($request->delivery_type == 'together') {
            $booking_data['shipment_info'] = [
                'together_time_slot_start' => $validated['together_time_slot_start'],
                'together_time_slot_end'   => $validated['together_time_slot_end'],
                'together_delivery_date'   => $validated['together_delivery_date'],
            ];
        }

        $booking_temp_data = [
            'uuid'    => Str::uuid(),
            'user_id' => auth()->user()->id,
            'data'    => $booking_data,
        ];

        $booking_temp_data = BookingTempData::create($booking_temp_data);

        $request->merge([
            'booking_data' => $booking_temp_data,
        ]);

        try {
            $instance = PaymentGatewayHelper::init($request->all())->type(PaymentGatewayConst::PAYMENTMETHOD)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->gateway()->api()->render();
        } catch (Exception $e) {

            return Response::error([$e->getMessage()], [], 500);
        }


        return Response::success([__('Payment gateway response successful')], [
            'redirect_url'          => $instance['redirect_url'],
            'redirect_links'        => $instance['redirect_links'],
            'action_type'           => $instance['type']         ?? false,
            'address_info'          => $instance['address_info'] ?? [],
        ], 200);
    }

    public function success(Request $request, $gateway)
    {
        try {
            $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
            $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();

            if (!$temp_data) {
                if (Transaction::where('callback_ref', $token)->exists()) {
                    return Response::success([__('Transaction request sended successfully!')], [], 400);
                } else {
                    return Response::error([__("Transaction failed. Record didn't saved properly. Please try again")], [], 400);
                }
            }

            $update_temp_data = json_decode(json_encode($temp_data->data), true);

            $update_temp_data['callback_data'] = $request->all();
            $temp_data->update([
                'data'  => $update_temp_data,
            ]);
            $temp_data = $temp_data->toArray();

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

            $user = User::where('id', $temp_data['data']->booking_data->user_id)->first();

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

            $instance = PaymentGatewayHelper::init($temp_data)->type(PaymentGatewayConst::PAYMENTMETHOD)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->responseReceive();
            TempCart::where('id', $temp_data['data']->booking_data->data->user_cart->id)->delete();
        } catch (Exception $e) {
            return Response::error([$e->getMessage()], [], 500);
        }
        return Response::success([__('Product Order Successful')], [], 200);
    }

    public function cancel(Request $request, $gateway)
    {
        $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
        $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();
        try {
            if ($temp_data != null) {
                $temp_data->delete();
            }
        } catch (Exception $e) {
            // Handel error
        }
        return Response::success([__('Payment process cancel successfully!')], [], 200);
    }

    public function postSuccess(Request $request, $gateway)
    {
        try {
            $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
            $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();
            if ($temp_data && $temp_data->data->creator_guard != 'api') {
                Auth::guard($temp_data->data->creator_guard)->loginUsingId($temp_data->data->creator_id);
            }
        } catch (Exception $e) {
            return Response::error([$e->getMessage()]);
        }

        return $this->success($request, $gateway);
    }

    public function postCancel(Request $request, $gateway)
    {
        try {
            $token     = PaymentGatewayHelper::getToken($request->all(), $gateway);
            $temp_data = TemporaryData::where("type", PaymentGatewayConst::PAYMENTMETHOD)->where("identifier", $token)->first();
            if ($temp_data && $temp_data->data->creator_guard != 'api') {
                Auth::guard($temp_data->data->creator_guard)->loginUsingId($temp_data->data->creator_id);
            }
        } catch (Exception $e) {
            return Response::error([$e->getMessage()]);
        }

        return $this->cancel($request, $gateway);
    }




    public function gatewayAdditionalFields(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currency'          => "required|string|exists:payment_gateway_currencies,alias",
        ]);
        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), [], 400);
        }
        $validated = $validator->validate();

        $gateway_currency = PaymentGatewayCurrency::where("alias", $validated['currency'])->first();

        $gateway = $gateway_currency->gateway;

        $data['available']         = false;
        $data['additional_fields'] = [];
        if (Gpay::isGpay($gateway)) {
            $gpay_bank_list = Gpay::getBankList();
            if ($gpay_bank_list == false) {
                return Response::error([__('Gpay bank list server response failed! Please try again')], [], 500);
            }
            $data['available'] = true;

            $gpay_bank_list_array = json_decode(json_encode($gpay_bank_list), true);

            $gpay_bank_list_array = array_map(function ($array) {

                $data['name']  = $array['short_name_by_gpay'];
                $data['value'] = $array['gpay_bank_code'];

                return $data;
            }, $gpay_bank_list_array);

            $data['additional_fields'][] = [
                'type'      => "select",
                'label'     => "Select Bank",
                'title'     => "Select Bank",
                'name'      => "bank",
                'values'    => $gpay_bank_list_array,
            ];
        }

        return Response::success([__('Request response fetch successfully!')], $data, 200);
    }

    public function cryptoPaymentConfirm(Request $request, $trx_id)
    {
        $transaction = Transaction::where('trx_id', $trx_id)->where('status', PaymentGatewayConst::STATUSWAITING)->firstOrFail();

        $dy_input_fields  = $transaction->details->payment_info->requirements ?? [];
        $validation_rules = $this->generateValidationRules($dy_input_fields);

        $validated = [];
        if (count($validation_rules) > 0) {
            $validated = Validator::make($request->all(), $validation_rules)->validate();
        }

        if (!isset($validated['txn_hash'])) {
            return Response::error([__('Transaction hash is required for verify')]);
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
            return Response::error([__('Transaction hash is not valid! Please input a valid hash')], [], 404);
        }

        if ($crypto_transaction->amount >= $transaction->total_payable == false) {
            if (!$crypto_transaction) {
                Response::error([__('Insufficient amount added. Please contact with system administrator')], [], 400);
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
            return Response::error([__('Something went wrong! Please try again')], [], 500);
        }

        return Response::success([__('Payment Confirmation Success!')], [], 200);
    }

    /**
     * Redirect Users for collecting payment via Button Pay (JS Checkout)
     */
    public function redirectBtnPay(Request $request, $gateway)
    {
        try {
            return PaymentGatewayHelper::init([])->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->handleBtnPay($gateway, $request->all());
        } catch (Exception $e) {
            return Response::error([$e->getMessage()], [], 500);
        }
    }

    public function manualInputFields(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alias'         => "required|string|exists:payment_gateway_currencies",
        ]);

        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), [], 400);
        }

        $validated        = $validator->validate();
        $gateway_currency = PaymentGatewayCurrency::where("alias", $validated['alias'])->first();

        $gateway = $gateway_currency->gateway;

        if (!$gateway->isManual()) {
            return Response::error([__("Can't get fields. Requested gateway is automatic")], [], 400);
        }

        if (!$gateway->input_fields || !is_array($gateway->input_fields)) {
            return Response::error([__("This payment gateway is under constructions. Please try with another payment gateway")], [], 503);
        }

        try {
            $input_fields = json_decode(json_encode($gateway->input_fields), true);
            $input_fields = array_reverse($input_fields);
        } catch (Exception $e) {
            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }

        return Response::success([__('Payment gateway input fields fetch successfully!')], [
            'gateway'           => [
                'desc'          => $gateway->desc
            ],
            'input_fields'      => $input_fields,
            'currency'          => $gateway_currency->only(['alias']),
        ], 200);
    }

    /**
     * Method for paystack pay callback
     */
    public function paystackPayCallBack(Request $request)
    {
        $instance = $this->paystackSuccess($request->all());
        return Response::success(["Payment successful, please go back your app"], [], 200);
    }
}
