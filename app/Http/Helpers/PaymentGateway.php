<?php

namespace App\Http\Helpers;

use App\Constants\GlobalConst;
use Exception;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Models\TemporaryData;
use Illuminate\Support\Facades\DB;
use App\Traits\PaymentGateway\Paypal;
use App\Traits\PaymentGateway\PaystackGateway;
use App\Constants\PaymentGatewayConst;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\PaymentGatewayCurrency;
use App\Models\Transaction;
use App\Traits\PaymentGateway\CoinGate;
use App\Traits\PaymentGateway\QRPay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\Admin\PaymentGateway as PaymentGatewayModel;
use App\Traits\PaymentGateway\Flutterwave;
use App\Traits\PaymentGateway\PerfectMoney;
use App\Traits\PaymentGateway\Razorpay;
use App\Traits\PaymentGateway\SslCommerz;
use App\Traits\PaymentGateway\Stripe;
use App\Models\Admin\BookingTempData;
use App\Models\Admin\Currency;
use App\Models\Admin\Order;
use App\Models\Admin\OrderItem;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\Product;
use App\Models\Admin\Shipment;
use App\Models\Admin\TempCart;
use App\Models\Admin\TransactionSetting;
use App\Traits\PaymentGateway\Tatum;
use App\Providers\Admin\CurrencyProvider;

class PaymentGateway
{
    use Paypal;
    use CoinGate;
    use Tatum;
    use QRPay;
    use Stripe;
    use Flutterwave;
    use SslCommerz;
    use Razorpay;
    use PerfectMoney;
    use PaystackGateway;

    protected $request_data;
    protected $output;
    protected $currency_input_name = "currency";
    protected $amount_input        = "amount";
    protected $project_currency    = PaymentGatewayConst::PROJECT_CURRENCY_SINGLE;
    protected $predefined_user_wallet;
    protected $predefined_guard;
    protected $predefined_user;
    protected $booking_data = 'booking_data';

    public function __construct(array $request_data)
    {

        $this->request_data = $request_data;
    }

    public static function init(array $data)
    {

        return new PaymentGateway($data);
    }

    public function setProjectCurrency(string $type)
    {

        $this->project_currency = $type;
        return $this;
    }

    public function gateway()
    {
        $request_data = $this->request_data;
        if (empty($request_data)) {
            throw new Exception("Gateway Information is not available. Please provide payment gateway currency alias");
        }

        $validated        = $this->validator($request_data)->validate();
        $gateway_currency = PaymentGatewayCurrency::where("alias", $validated[$this->currency_input_name])->first();

        if (!$gateway_currency || !$gateway_currency->gateway) {
            if (request()->acceptsJson()) {
                throw new Exception("Gateway not available");
            }
            throw ValidationException::withMessages([
                $this->currency_input_name = "Gateway not available",
            ]);
        }

        $request_data = json_decode(json_encode($request_data));

        // if($this->project_currency == PaymentGatewayConst::PROJECT_CURRENCY_SINGLE) {

        //     $default_currency = CurrencyProvider::default();
        //     if(!$default_currency) throw new Exception("Project currency does not have default value.");
        //     $this->output['wallet']             = $this->getUserWallet($request_data,$default_currency);
        //     $this->output['wallet']             = $this->getUserWallet($request_data,$default_currency);
        // }


        $this->output['gateway']  = $gateway_currency->gateway;
        $this->output['currency'] = $gateway_currency;
        $this->output['amount']   = $this->amount();

        $this->output['form_data'] = $this->request_data;

        if ($gateway_currency->gateway->isAutomatic()) {
            $this->output['distribute']     = $this->gatewayDistribute($gateway_currency->gateway);
            $this->output['record_handler'] = $this->generateRecordHandler();
        }

        return $this;
    }

    public function generateRecordHandler()
    {

        if ($this->predefined_guard) {
            $guard = $this->predefined_guard;
        } else {
            $guard = get_auth_guard();
        }

        $method = "insertRecord" . ucwords($guard);

        return $method;
    }



    public function validator($data)
    {
        
        $validator = Validator::make($data, [
            $this->currency_input_name     => "required|exists:payment_gateway_currencies,alias",
            $this->amount_input            => "sometimes|required|numeric|gt:0",
            $this->booking_data            => "required",
        ]);


        if (request()->acceptsJson()) {
            if ($validator->fails()) {
                $errors      = $validator->errors()->all();
                $first_error = $errors[0];
                throw new Exception($first_error);
            }
        }

        return $validator;
    }


    public function get()
    {
        return $this->output;
    }

    public function gatewayDistribute($gateway = null)
    {
        if (!$gateway) {
            $gateway = $this->output['gateway'];
        }
        $alias  = Str::lower($gateway->alias);
        $method = PaymentGatewayConst::register($alias);
        if (method_exists($this, $method)) {
            return $method;
        }

        throw new Exception("Gateway(" . $gateway->name . ") Trait or Method (" . $method . "()) does not exists");
    }

    public function amount()
    {
        $currency = $this->output['currency'] ?? null;
        if (!$currency) {
            throw new Exception("Gateway currency not found");
        }

        return $this->chargeCalculate($currency);
    }

    public function chargeCalculate($currency)
    {
        $amount = $this->request_data[$this->amount_input];

        $charge_data = TransactionSetting::where('slug', 'order')->where('status', 1)->first();

        $total_cost           = floatval($amount);
        $fixed_charge         = floatval($charge_data->fixed_charge);
        $percent_charge       = floatval($charge_data->percent_charge);
        $total_percent_charge = ($percent_charge / 100) * $total_cost;
        $total_charge         = $fixed_charge + $total_percent_charge;
        $total_price          = $total_cost   + $total_charge;


        $price                = floatval($total_cost);
        $fees                 = floatval($total_charge);
        $payable_amount       = floatval($total_price);
        $sender_currency_rate = floatval($currency->rate);
        $total_payable_amount = $sender_currency_rate * $payable_amount;
        ($price == "" || $price == null) ? $price : $price;


        $default_currency = Currency::default();
        $exchange_rate    = $default_currency->rate;


        $data = [
            'sender_cur_code'           => $currency->currency_code,
            'sender_cur_rate'           => $sender_currency_rate ?? 0,
            'price'                     => $price,
            'total_charge'              => $fees,
            'payable_amount'            => $payable_amount,
            'total_payable_amount'      => $total_payable_amount,
            'exchange_rate'             => $exchange_rate,
            'default_currency'          => get_default_currency_code(),
        ];

       


        return (object) $data;
    }

    public function render()
    {
        $output = $this->output;


        if (!is_array($output)) {
            throw new Exception("Render Failed! Please call with valid gateway/credentials");
        }

        $common_keys = ['gateway', 'currency', 'amount', 'distribute'];
        foreach ($output as $key => $item) {
            if (!array_key_exists($key, $common_keys)) {
                $this->gateway();
                break;
            }
        }

        $distributeMethod = $this->output['distribute'];
        if (!method_exists($this, $distributeMethod)) {
            throw new Exception("Something went wrong! Please try again.");
        }


        return $this->$distributeMethod($output);
    }

    /**
     * Collect user data from temporary data and clears next routes
     */
    public function authenticateTempData()
    {

        $tempData = $this->request_data;
       
        if (empty($tempData) || empty($tempData['type'])) {
            throw new Exception('Transaction failed. Record didn\'t saved properly. Please try again.');
        }

        if ($this->requestIsApiUser()) {
            $creator_table = $tempData['data']->creator_table ?? null;
            $creator_id    = $tempData['data']->creator_id    ?? null;
            $creator_guard = $tempData['data']->creator_guard ?? null;

            $api_authenticated_guards = PaymentGatewayConst::apiAuthenticateGuard();
            if (!array_key_exists($creator_guard, $api_authenticated_guards)) {
                throw new Exception('Request user doesn\'t save properly. Please try again');
            }

            if ($creator_table == null || $creator_id == null || $creator_guard == null) {
                throw new Exception('Request user doesn\'t save properly. Please try again');
            }
            $creator = DB::table($creator_table)->where("id", $creator_id)->first();
            if (!$creator) {
                throw new Exception("Request user doesn\'t save properly. Please try again");
            }

            $api_user_login_guard            = $api_authenticated_guards[$creator_guard];
            $this->output['api_login_guard'] = $api_user_login_guard;
            Auth::guard($api_user_login_guard)->loginUsingId($creator->id);
        }

        $currency_id = $tempData['data']->currency ?? "";
        
        $gateway_currency = PaymentGatewayCurrency::find($currency_id);
        if (!$gateway_currency) {
            throw new Exception('Transaction failed. Gateway currency not available.');
        }
        $requested_amount = $tempData['data']->amount->price ?? 0;
        
        $requested_booking_data = $tempData['data']->booking_data ?? 0;
      

        $validator_data = [
            $this->currency_input_name     => $gateway_currency->alias,
            $this->amount_input            => $requested_amount,
            $this->booking_data            => $requested_booking_data,
        ];

        $this->request_data = $validator_data;
        $this->gateway();
        
        $this->output['tempData'] = $tempData;
    }

    public function responseReceive()
    {

        $this->authenticateTempData();

        $method_name = $this->getResponseMethod($this->output['gateway']);
        if (method_exists($this, $method_name)) {
            return $this->$method_name($this->output);
        }
        throw new Exception("Response method " . $method_name . "() does not exists.");
    }

    public function type($type)
    {

        $this->output['type'] = $type;
        return $this;
    }

    public function getRedirection()
    {
        $redirection = PaymentGatewayConst::registerRedirection();
        $guard       = authGuardApi()['guard'];
        if (!array_key_exists($guard, $redirection)) {
            throw new Exception("Gateway Redirection URLs/Route Not Registered. Please Register in PaymentGatewayConst::class");
        }
        $gateway_redirect_route = $redirection[$guard];

        return $gateway_redirect_route;
    }

    public static function getToken(array $response, string $gateway)
    {

        switch ($gateway) {
            case PaymentGatewayConst::PAYPAL:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::COIN_GATE:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::QRPAY:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::STRIPE:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::FLUTTERWAVE:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::RAZORPAY:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::SSLCOMMERZ:
                return $response['token'] ?? "";
                break;
            case PaymentGatewayConst::PERFECT_MONEY:
                return $response['PAYMENT_ID'] ?? "";
                break;
            case PaymentGatewayConst::PAYSTACK:
                return $response['PAYMENT_ID'] ?? "";
                break;
            default:
                throw new Exception("Oops! Gateway not registered in getToken method");
        }
        throw new Exception("Gateway token not found!");
    }

    public function getResponseMethod($gateway)
    {

        $gateway_is = PaymentGatewayConst::registerGatewayRecognization();

        foreach ($gateway_is as $method => $gateway_name) {
            if (method_exists($this, $method)) {
                if ($this->$method($gateway)) {
                    return $this->generateSuccessMethodName($gateway_name);
                    break;
                }
            }
        }
        throw new Exception("Payment gateway response method not declared in generateResponseMethod");
    }

    public function getCallbackResponseMethod($gateway)
    {

        $gateway_is = PaymentGatewayConst::registerGatewayRecognization();
        foreach ($gateway_is as $method => $gateway_name) {
            if (method_exists($this, $method)) {
                if ($this->$method($gateway)) {
                    return $this->generateCallbackMethodName($gateway_name);
                    break;
                }
            }
        }
    }

    public function generateCallbackMethodName(string $name)
    {
        $name = $this->removeSpacialChar($name, "");
        return $name . "CallbackResponse";
    }

    public function generateSuccessMethodName(string $name)
    {

        $name = $this->removeSpacialChar($name, "");
        return $name . "Success";
    }

    public function generateBtnPayResponseMethod(string $gateway)
    {
        $name = $this->removeSpacialChar($gateway, "");
        return $name . "BtnPay";
    }

    public function removeSpacialChar($string, $replace_string = "")
    {
        return preg_replace("/[^A-Za-z0-9]/", $replace_string, $string);
    }

    // Update Code (Need to check)
    public function createTransaction($output, $status = PaymentGatewayConst::STATUS_SUCCESS, $temp_remove = true)
    {
        $record_handler = $output['record_handler'];
        $inserted_id    = $this->$record_handler($output, $status);
        $booking_data   = $output['form_data']['booking_data'];
        $this->insertDevice($output, $inserted_id);


        if ($temp_remove) {
            $this->removeTempData($output);
        }

        if ($this->requestIsApiUser()) {
            // logout user
            $api_user_login_guard = $this->output['api_login_guard'] ?? null;
            if ($api_user_login_guard != null) {
                auth()->guard($api_user_login_guard)->logout();
            }
        }
    }

    public function insertRecordWeb($output, $status)
    {
        // dd($output);
        if ($this->predefined_user) {
            $user = $this->predefined_user;
        } else {
            $user = auth()->guard('web')->user();
        }


        $cartItems = $output['tempData']['data']->booking_data->data->user_cart->data;
        $order     = Order::create([
            'user_id'        => auth('')->user()->id,
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
                return back()->with(['error' => ['Insufficient stock']]);
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

        $trx_id = generateTrxString('product_orders', 'trx_id', 'PB', 8);
        DB::beginTransaction();
        try {
            $id = DB::table("product_orders")->insertGetId([
                'type'                          => $output['type'],
                'order_id'                      => $order->id,
                'booking_data'                  => json_encode($output['tempData']['data']->booking_data),
                'trx_id'                        => $trx_id,
                'user_id'                       => $user->id,
                'payment_method'                => $output['gateway']->name,
                'payment_gateway_currency_id'   => $output['currency']->id,
                'booking_exp_seconds'           => global_const()::BOOKING_EXP_SEC,
                'uuid'                          => $output['tempData']['data']->booking_data->data->user_cart->uuid,
                'type'                          => global_const()::ONLINE_PAYMENT,
                'price'                         => $output['amount']->price,
                'total_charge'                  => $output['amount']->total_charge,
                'payable_price'                 => $output['amount']->payable_amount,
                'gateway_payable_price'         => $output['amount']->total_payable_amount,
                'payment_currency'              => $output['currency']->currency_code,
                'remark'                        => ucwords(remove_special_char($output['type'], " ")) . " With " . $output['gateway']->name,
                'details'                       => json_encode(['gateway_response' => $output['capture']]),
                'status'                        => GlobalConst::STATUS_PENDING,
                'callback_ref'                  => $output['callback_ref'] ?? null,
                'created_at'                    => now(),
            ]);

            
            if ($output['tempData']['data']->booking_data->data->delivery_info->delivery_type == 'separate') {
                $delivery_date = $output['tempData']['data']->booking_data->data->shipment_info->delivery_date;

                foreach ($delivery_date as $shipment_id => $date) {
                    $shipment = Shipment::where('id', $shipment_id)->first();

                    OrderShipment::create([
                        'product_order_id' => $id,
                        'start_time'       => $output['tempData']['data']->booking_data->data->shipment_info->time_slots->{$item->shipment_type}->start,
                        'end_time'         => $output['tempData']['data']->booking_data->data->shipment_info->time_slots->{$item->shipment_type}->end,
                        'delivery_date'    => $output['tempData']['data']->booking_data->data->shipment_info->delivery_date->{$item->shipment_type},
                        'delivery_charge'  => $shipment->delivery_charge,
                        'shipment_id'      => $shipment_id,
                        'user_id'          => $user->id,
                        'shipment_status'  => GlobalConst::BOOKED,
                        'tracking_number'  => Str::uuid(),
                    ]);
                }
            }
            if ($output['tempData']['data']->booking_data->data->delivery_info->delivery_type == 'together') {

                $shipment = Shipment::where('default', true)->first();
                OrderShipment::create([
                    'product_order_id' => $id,
                    'start_time'       => $output['tempData']['data']->booking_data->data->shipment_info->together_time_slot_start,
                    'end_time'         => $output['tempData']['data']->booking_data->data->shipment_info->together_time_slot_end,
                    'delivery_date'    => $output['tempData']['data']->booking_data->data->shipment_info->together_delivery_date,
                    'delivery_charge'  => $shipment->delivery_charge,
                    'shipment_id'      => $shipment->id,
                    'user_id'          => $user->id,
                    'shipment_status'  => GlobalConst::BOOKED,
                    'tracking_number'  => Str::uuid(),
                ]);
            }



            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $id;
    }





    public function insertDevice($output, $id)
    {
        $client_ip = request()->ip() ?? false;
        $location  = geoip()->getLocation($client_ip);
        $agent     = new Agent();

        $mac = "";

        DB::beginTransaction();
        try {
            DB::table("transaction_devices")->insert([

                'ip'            => $client_ip,
                'mac'           => $mac,
                'city'          => $location['city']     ?? "",
                'country'       => $location['country']  ?? "",
                'longitude'     => $location['lon']      ?? "",
                'latitude'      => $location['lat']      ?? "",
                'timezone'      => $location['timezone'] ?? "",
                'browser'       => $agent->browser()     ?? "",
                'os'            => $agent->platform()    ?? "",
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function removeTempData($output)
    {
        try {
            $id = $output['tempData']['id'];
            TemporaryData::find($id)->delete();
        } catch (Exception $e) {
            // handle error
        }
    }

    public function api()
    {
        $output = $this->output;
        if (!$output) {
            throw new Exception("Something went wrong! Gateway render failed. Please call gateway() method before calling api() method");
        }
        $sources    = $this->setSource(PaymentGatewayConst::APP);
        $url_params = $this->makeUrlParams($sources);
        $this->setUrlParams($url_params);
        return $this;
    }

    public function setSource(string $source)
    {
        $sources = [
            'r-source'  => $source,
        ];

        return $sources;
    }

    public function makeUrlParams(array $sources)
    {
        try {
            $params = http_build_query($sources);
        } catch (Exception $e) {
            throw new Exception("Something went wrong! Failed to make URL Params.");
        }
        return $params;
    }

    public function setUrlParams(string $url_params)
    {
        $output = $this->output;
        if (isset($output['url_params'])) {
            // if already param has
            $params                     = $this->output['url_params'];
            $update_params              = $params . "&" . $url_params;
            $this->output['url_params'] = $update_params; // Update/ reassign URL Parameters
        } else {
            $this->output['url_params'] = $url_params; // add new URL Parameters;
        }
    }

    public function getUrlParams()
    {
        $output = $this->output;
        if (!$output || !isset($output['url_params'])) {
            $params = "";
        }
        $params = $output['url_params'] ?? "";
        return $params;
    }

    public function setGatewayRoute($route_name, $gateway, $params = null)
    {
        if (!Route::has($route_name)) {
            throw new Exception('Route name (' . $route_name . ') is not defined');
        }
        if ($params) {
            return route($route_name, $gateway . "?" . $params);
        }
        return route($route_name, $gateway);
    }

    public function requestIsApiUser()
    {
        $request_source = request()->get('r-source');
        if ($request_source != null && $request_source == PaymentGatewayConst::APP) {
            return true;
        }
        if (request()->routeIs('api.*')) {
            return true;
        }
        return false;
    }

    public static function makePlainText($string)
    {
        $string = Str::lower($string);
        return preg_replace("/[^A-Za-z0-9]/", "", $string);
    }

    public function searchWithReferenceInTransaction($reference)
    {

        $transaction = DB::table('product_orders')->where('callback_ref', $reference)->first();

        if ($transaction) {
            return $transaction;
        }

        return false;
    }

    public function handleCallback($reference, $callback_data, $gateway_name)
    {
         
        if ($reference == PaymentGatewayConst::CALLBACK_HANDLE_INTERNAL) {
            $gateway                          = PaymentGatewayModel::gateway($gateway_name)->first();
            $callback_response_receive_method = $this->getCallbackResponseMethod($gateway);
            return $this->$callback_response_receive_method($callback_data, $gateway);
        }

        $transaction                  = Transaction::where('callback_ref', $reference)->first();
        $this->output['callback_ref'] = $reference;
        $this->output['capture']      = $callback_data;

        if ($transaction) {
            $gateway_currency = $transaction->gateway_currency;
            $gateway          = $gateway_currency->gateway;

            $requested_amount = $transaction->request_amount;
            $validator_data   = [
                $this->currency_input_name  => $gateway_currency->alias,
                $this->amount_input         => $requested_amount,

            ];

            $user_wallet                  = $transaction->creator_wallet;
            $this->predefined_user_wallet = $user_wallet;
            $this->predefined_guard       = $transaction->creator->modelGuardName();
            $this->predefined_user        = $transaction->creator;

            $this->output['transaction'] = $transaction;
        } else {
            // find reference on temp table
            $tempData = TemporaryData::where('identifier', $reference)->first();
            if ($tempData) {
               
                $gateway_currency_id = $tempData->data->currency ?? null;
                $gateway_currency    = PaymentGatewayCurrency::find($gateway_currency_id);
                if ($gateway_currency) {
                    $gateway = $gateway_currency->gateway;
 
                    $requested_amount = $tempData['data']->amount->price ?? 0;
                    $validator_data   = [
                        $this->currency_input_name  => $gateway_currency->alias,
                        $this->amount_input         => $requested_amount,
                        $this->booking_data         => $tempData['data']->booking_data,
                    ];

                    $get_wallet_model             = PaymentGatewayConst::registerWallet()[$tempData->data->creator_guard];
                    $user_wallet                  = $get_wallet_model::find($tempData->data->wallet_id);
                    $this->predefined_user_wallet = $user_wallet;
                    $this->predefined_guard       = $user_wallet->user->modelGuardName(); // need to update
                    $this->predefined_user        = $user_wallet->user;


                    $this->output['tempData'] = $tempData;
                }
            }
        }


        if (isset($gateway)) {

            $this->request_data = $validator_data;
            $this->gateway();

            $callback_response_receive_method = $this->getCallbackResponseMethod($gateway);
            return $this->$callback_response_receive_method($reference, $callback_data, $this->output);
        }

        logger("Gateway not found!!", [
            "reference"     => $reference,
        ]);
    }

    public static function getValueFromGatewayCredentials($gateway, $keywords)
    {
        $result      = "";
        $outer_break = false;
        foreach ($keywords as $item) {
            if ($outer_break == true) {
                break;
            }
            $modify_item = PaymentGateway::makePlainText($item);
            foreach ($gateway->credentials ?? [] as $gatewayInput) {
                $label = $gatewayInput->label ?? "";
                $label = PaymentGateway::makePlainText($label);

                if ($label == $modify_item) {
                    $result      = $gatewayInput->value ?? "";
                    $outer_break = true;
                    break;
                }
            }
        }
        return $result;
    }

    public function generateLinkForRedirectForm($token, $gateway)
    {

        $redirection         = $this->getRedirection();
        $form_redirect_route = $redirection['redirect_form'];
        return route($form_redirect_route, [$gateway, 'token' => $token]);
    }

    /**
     * Link generation for button pay (JS checkout)
     */
    public function generateLinkForBtnPay($token, $gateway)
    {

        $redirection         = $this->getRedirection();
        $form_redirect_route = $redirection['btn_pay'];
        return route($form_redirect_route, [$gateway, 'token' => $token]);
    }

    /**
     * Handle Button Pay (JS Checkout) Redirection
     */
    public function handleBtnPay($gateway, $request_data)
    {

        if (!array_key_exists('token', $request_data)) {
            throw new Exception("Requested with invalid token");
        }
        $temp_token = $request_data['token'];
        $temp_data  = TemporaryData::where('identifier', $temp_token)->first();
        if (!$temp_data) {
            throw new Exception("Requested with invalid token");
        }

        $this->request_data = $temp_data->toArray();
        $this->authenticateTempData();


        $method = $this->generateBtnPayResponseMethod($gateway);

        if (method_exists($this, $method)) {
            return $this->$method($temp_data);
        }

        throw new Exception("Button Pay response method [" . $method . "()] not available in this gateway");
    }
}
