<?php

namespace App\Traits\PaymentGateway;

use App\Constants\GlobalConst;
use Exception;
use App\Models\TemporaryData;
use App\Http\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\BasicSettings;
use Illuminate\Support\Facades\Auth;
use App\Constants\PaymentGatewayConst;
use App\Models\Admin\DeliverySettings;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\Product;
use App\Models\Admin\Shipment;
use App\Models\Admin\TempCart;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PaystackNotification;
use Illuminate\Support\Str;

trait PaystackGateway
{
    public function paystackInit($output = null)
    {
        $gateway = new \stdClass();

        foreach ($output['gateway']->credentials as $credential) {
            if ($credential->name === 'secret-key') {
                $gateway->secret_key = $credential->value;
            } elseif ($credential->name === 'email') {
                $gateway->email = $credential->value;
            }
        }


        $amount            = get_amount($output['amount']->total_payable_amount, null, 2) * 100;
        $temp_record_token = generate_unique_string('temporary_datas', 'identifier', 60);
        $junkData          = $this->paystackJunkInsert($output, $temp_record_token);
        $url               = "https://api.paystack.co/transaction/initialize";
        if (get_auth_guard() == 'api') {
            $fields = [
                'email'         => auth()->user()->email,
                'amount'        => $amount,
                'currency'      => $output['currency']->currency_code,
                'callback_url'  => route('api.paystack.pay.callback') . '?output=' . $junkData->identifier
            ];
        } else {
            $fields = [
                'email'         => auth()->user()->email,
                'amount'        => $amount,
                'currency'      => $output['currency']->currency_code,
                'callback_url'  => route('frontend.product.order.paystack.pay.callback') . '?output=' . $junkData->identifier
            ];
        }

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $gateway->secret_key",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result   = curl_exec($ch);
        $response = json_decode($result);
        if ($response->status == true) {
            if (get_auth_guard() == 'api') {

                $response->data = [
                    'redirect_url'   => $response->data->authorization_url,
                    'redirect_links' => '',
                    'gateway_type'   => PaymentGatewayConst::AUTOMATIC,
                    'access_code'    => $response->data->access_code,
                    'reference'      => $response->data->reference,
                ];
                return $response->data;
            } else {
                return redirect($response->data->authorization_url)->with('output', $output);
            }
        } else {
            $output['status']  = 'error';
            $output['message'] = $response->message;
            return back()->with(['error' => [$output['message']]]);
        }
    }
    public function paystackInitApi($output = null)
    {
        $gateway = new \stdClass();

        foreach ($output['gateway']->credentials as $credential) {
            if ($credential->name === 'secret-key') {
                $gateway->secret_key = $credential->value;
            } elseif ($credential->name === 'email') {
                $gateway->email = $credential->value;
            }
        }


        $amount            = get_amount($output['amount']->total_payable_amount, null, 2) * 100;
        $temp_record_token = generate_unique_string('temporary_datas', 'identifier', 60);
        $junkData          = $this->paystackJunkInsert($output, $temp_record_token);

        $url = "https://api.paystack.co/transaction/initialize";
        if (get_auth_guard() == 'api') {
            $fields = [
                'email'         => auth()->user()->email,
                'amount'        => $amount,
                'currency'      => $output['currency']->currency_code,
                'callback_url'  => route('api.paystack.pay.callback') . '?output=' . $junkData->identifier
            ];
        } else {
            $fields = [
                'email'         => auth()->user()->email,
                'amount'        => $amount,
                'currency'      => $output['currency']->currency_code,
                'callback_url'  => route('paystack.pay.callback') . '?output=' . $junkData->identifier
            ];
        }

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $gateway->secret_key",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result   = curl_exec($ch);
        $response = json_decode($result);

        if ($response->status == true) {


            $response->data = [
                'links'     => [
                    'redirect_url'   => $response->data->authorization_url,
                    'redirect_links' => '',
                    'gateway_type'   => PaymentGatewayConst::AUTOMATIC,
                    'access_code'    => $response->data->access_code,
                    'reference'      => $response->data->reference,
                ],
                'id'        => $temp_record_token
            ];
            return $response->data;
        } else {
            $output['status']  = 'error';
            $output['message'] = $response->message;
            return Response::error([$output['message']], [], 400);
        }
    }
    /**
     * function for junk insert
     */
    public function paystackJunkInsert($output, $temp_identifier)
    {

        $output = $this->output;


        $data = [
            'gateway'           => $output['gateway']->id,
            'currency'          => $output['currency']->id,
            'amount'            => json_decode(json_encode($output['amount']), true),
            'response'          => $output,

            'creator_table'     => auth()->guard(get_auth_guard())->user()->getTable(),
            'creator_id'        => auth()->guard(get_auth_guard())->user()->id,
            'creator_guard'     => get_auth_guard(),
            'user_record'       => $output['form_data'],
            'payment_method'    => $output['form_data']['payment_method'],
        ];

        return TemporaryData::create([
            'user_id'       => Auth::id(),
            'type'          => PaymentGatewayConst::PAYSTACK,
            'identifier'    => $temp_identifier,
            'data'          => $data,
        ]);
    }
    // function paystack success
    public function paystackSuccess($request)
    {
        $reference  = $request['reference'];
        $identifier = $request['output'];
        $temp_data  = TemporaryData::where('identifier', $identifier)->first();

        $curl       = curl_init();
        $secret_key = '';
        foreach ($temp_data->data->response->gateway->credentials as $credential) {
            if ($credential->name === 'secret-key') {
                $secret_key = $credential->value;
                break;
            }
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_HTTPHEADER     => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));

        $result        = curl_exec($curl);
        $response      = json_decode($result);
        $responseArray = [
            'gateway'   => $temp_data->data->response->gateway, // Converts the object to an array
            'currency'  => $temp_data->data->response->currency, // Converts the object to an array
            'amount'    => $temp_data->data->response->amount, // Converts the object to an array
            'form_data' => [
                'identifier' => $temp_data->data->user_record->booking_data->uuid,
            ], // Assuming this is already an array
            'distribute'      => $temp_data->data->response->distribute,
            'capture'         => $response->data->reference,
            'junk_identifier' => $identifier
        ];
        if ($response->status == true) {
            $status = global_const()::STATUS_SUCCESS;
            try {
                $transaction_response = $this->createPaystackTransaction($responseArray, $status);
            } catch (Exception $e) {
                dd($e);
                throw new Exception($e->getMessage());
            }
            return $transaction_response;
        }
    }
    // Update Code (Need to check)
    public function createPaystackTransaction($output, $status)
    {
        $basic_setting = BasicSettings::first();
        $trx_id        = generateTrxString('product_orders', 'trx_id', 'PB', 8);

        $inserted_id = $this->insertPaystackRecord($output, $trx_id, $status);
        $user        = auth()->user();

        if ($basic_setting->email_notification == true) {
            try {
                Notification::route("mail", $user->email)->notify(new PaystackNotification($user, $inserted_id, $trx_id));
            } catch (Exception $e) {
            }
        }


        if ($this->requestIsApiUser()) {
            // logout user
            $api_user_login_guard = $this->output['api_login_guard'] ?? null;
            if ($api_user_login_guard != null) {
                auth()->guard($api_user_login_guard)->logout();
            }
        }
        return $this->output['trx_id'] ?? "";
    }
    public function requestIsApiUser()
    {
        $request_source = request()->get('r-source');
        if ($request_source != null && $request_source == PaymentGatewayConst::APP) {
            return true;
        }
        return false;
    }

    public function insertPaystackRecord($output, $trx_id, $status)
    {
        $temp_data = TemporaryData::where('identifier', $output['junk_identifier'])->first();


        $cartItems = $temp_data['data']->response->form_data->booking_data->data->user_cart->data;
        $order     = Order::create([
            'user_id'        => auth()->user()->id,
            'order_status'   => PaymentGatewayConst::STATUS_PENDING,
            'payment_status' => GlobalConst::UNPAID,
            'total_amount'   => 0,
        ]);

        $total = 0;

        foreach ($cartItems as $item) {

            $product  = Product::findOrFail($item->id);
            $price    = $item->price;
            $quantity = $item->quantity;

            if ($product->available_quantity < $quantity) {
                return back()->with(['error' => ['Insufficient stock ']]);
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

        $user   = auth()->guard('web')->user();
        $trx_id = generateTrxString('product_orders', 'trx_id', 'PB', 8);
        DB::beginTransaction();
        try {
            $id = DB::table("product_orders")->insertGetId([
                'type'                          => $temp_data['data']->response->type,
                'order_id'                      => $order->id,
                'booking_data'                  => json_encode($temp_data['data']->response->form_data->booking_data),
                'trx_id'                        => $trx_id,
                'user_id'                       => $user->id,
                'payment_method'                => $temp_data['data']->response->gateway->name,
                'payment_gateway_currency_id'   => $temp_data['data']->response->currency->id,
                'booking_exp_seconds'           => global_const()::BOOKING_EXP_SEC,
                'uuid'                          => $temp_data['data']->response->form_data->booking_data->data->user_cart->uuid,
                'type'                          => global_const()::ONLINE_PAYMENT,
                'price'                         => $temp_data['data']->amount->price,
                'total_charge'                  => $temp_data['data']->amount->total_charge,
                'payable_price'                 => $temp_data['data']->amount->payable_amount,
                'gateway_payable_price'         => $temp_data['data']->amount->total_payable_amount,
                'payment_currency'              => $temp_data['data']->response->currency->currency_code,
                'remark'                        => ucwords(remove_special_char($temp_data['data']->response->type, " ")) . " With " . $output['gateway']->name,
                'details'                       => json_encode(['gateway_response' => $output['capture']]),
                'status'                        => GlobalConst::STATUS_PENDING,
                'callback_ref'                  => $output['callback_ref'] ?? null,
                'created_at'                    => now(),
            ]);

            $delivery_date = $temp_data['data']->response->form_data->delivery_date;

            if ($temp_data['data']->response->form_data->booking_data->data->delivery_info->delivery_type == 'separate') {

                foreach ($delivery_date as $shipment_id => $date) {
                    $shipment = Shipment::where('id', $shipment_id)->first();

                    OrderShipment::create([
                        'product_order_id' => $id,
                        'start_time'       => $temp_data['data']->response->form_data->time_slots->{$item->shipment_type}->start,
                        'end_time'         => $temp_data['data']->response->form_data->time_slots->{$item->shipment_type}->end,
                        'delivery_date'    => $temp_data['data']->response->form_data->delivery_date->{$item->shipment_type},
                        'delivery_charge'  => $shipment->delivery_charge,
                        'shipment_id'      => $shipment_id,
                        'user_id'          => $user->id,
                        'shipment_status'  => GlobalConst::BOOKED,
                        'tracking_number'  => Str::uuid(),
                    ]);
                }
            }
            if ($temp_data['data']->response->form_data->booking_data->data->delivery_info->delivery_type == 'together') {


                $shipment = Shipment::where('default', true)->first();
                OrderShipment::create([
                    'product_order_id' => $id,
                    'start_time'       => $temp_data['data']->response->form_data->together_time_slot_start,
                    'end_time'         => $temp_data['data']->response->form_data->together_time_slot_end,
                    'delivery_date'    => $temp_data['data']->response->form_data->together_delivery_date,
                    'delivery_charge'  => $shipment->delivery_charge,
                    'shipment_id'      => $shipment->id,
                    'user_id'          => $user->id,
                    'shipment_status'  => GlobalConst::BOOKED,
                    'tracking_number'  => Str::uuid(),
                ]);
            }

            session()->forget('cart');
            $sub_total = $temp_data['data']->response->form_data->booking_data->data->user_cart->sub_total;

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

            DB::commit();
            $temp_data->delete();
            TempCart::where('id', $temp_data['data']->booking_data->data->user_cart->id)->delete();
            session()->forget('cart');
        } catch (Exception $e) {
            
            DB::rollBack();
            throw new Exception($e);
        }
        return $id;
    }
}
