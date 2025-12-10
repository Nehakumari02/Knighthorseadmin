<?php

namespace App\Constants;

use Illuminate\Support\Str;

class PaymentGatewayConst
{
    public const ACTIVE = true;

    public const AUTOMATIC     = "AUTOMATIC";
    public const MANUAL        = "MANUAL";
    public const PAYMENTMETHOD = "payment-method";
    public const MONEYOUT      = "Money Out";
    public const TYPEWITHDRAW  = "WITHDRAW";

    public const TYPEMONEYOUT           = "MONEY-OUT";
    public const TYPEADDSUBTRACTBALANCE = "ADD-SUBTRACT-BALANCE";

    public const ENV_SANDBOX    = "SANDBOX";
    public const ENV_PRODUCTION = "PRODUCTION";

    public const APP = "APP";

    public const STATUS_SUCCESS  = 1;
    public const STATUS_PENDING  = 2;
    public const STATUS_HOLD     = 3;
    public const STATUS_REJECTED = 4;
    public const STATUS_WAITING  = 5;


    public const PAYPAL        = 'paypal';
    public const G_PAY         = 'gpay';
    public const COIN_GATE     = 'coingate';
    public const QRPAY         = 'qrpay';
    public const STRIPE        = 'stripe';
    public const FLUTTERWAVE   = 'flutterwave';
    public const TATUM         = 'tatum';
    public const SSLCOMMERZ    = 'sslcommerz';
    public const RAZORPAY      = 'razorpay';
    public const PERFECT_MONEY = 'perfect-money';
    public const PAYSTACK      = "paystack";


    public const SEND     = "SEND";
    public const RECEIVED = "RECEIVED";
    public const PENDING  = "PENDING";
    public const REJECTED = "REJECTED";
    public const CREATED  = "CREATED";
    public const SUCCESS  = "SUCCESS";
    public const EXPIRED  = "EXPIRED";

    public const FIAT          = "FIAT";
    public const CRYPTO        = "CRYPTO";
    public const CRYPTO_NATIVE = "CRYPTO_NATIVE";

    public const PROJECT_CURRENCY_SINGLE = "PROJECT_CURRENCY_SINGLE";


    public const CALLBACK_HANDLE_INTERNAL = "CALLBACK_HANDLE_INTERNAL";

    public const NOT_USED = "NOT-USED";
    public const USED     = "USED";
    public const SENT     = "SENT";

    public const REDIRECT_USING_HTML_FORM = "REDIRECT_USING_HTML_FORM";

    public static function payment_gateway_slug()
    {
        return Str::slug(self::PAYMENTMETHOD);
    }

    public static function money_out_slug()
    {
        return Str::slug(self::MONEYOUT);
    }


    public static function register($alias = null)
    {
        $gateway_alias = [
            self::PAYPAL        => "paypalInit",
            self::COIN_GATE     => "coinGateInit",
            self::QRPAY         => "qrpayInit",
            self::STRIPE        => 'stripeInit',
            self::TATUM         => 'tatumInit',
            self::FLUTTERWAVE   => 'flutterwaveInit',
            self::SSLCOMMERZ    => 'sslCommerzInit',
            self::RAZORPAY      => 'razorpayInit',
            self::PERFECT_MONEY => 'perfectMoneyInit',
            self::PAYSTACK      => 'paystackInit'
        ];

        if ($alias == null) {
            return $gateway_alias;
        }

        if (array_key_exists($alias, $gateway_alias)) {
            return $gateway_alias[$alias];
        }
        return "init";
    }



    public static function apiAuthenticateGuard()
    {
        return [
            'api'   => 'web',
        ];
    }

    public static function registerRedirection()
    {
        return [
            'web'       => [
                'return_url'    => 'frontend.product.order.payment.success',
                'cancel_url'    => 'frontend.product.order.payment.cancel',
                'callback_url'  => 'frontend.product.order.payment.callback',
                'redirect_form' => 'frontend.product.order.payment.redirect.form',
                'btn_pay'       => 'frontend.product.order.payment.btn.pay',
            ],
            'api'       => [
                'return_url'    => 'api.user.payment.success',
                'cancel_url'    => 'api.user.payment.cancel',
                'callback_url'  => 'frontend.product.order.payment.callback',
                'redirect_form' => 'frontend.product.order.payment.redirect.form',
                'btn_pay'       => 'api.user.payment.btn.pay',
            ],
        ];
    }


    public static function registerGatewayRecognization()
    {
        return [
            'isPaypal'          => self::PAYPAL,
            'isCoinGate'        => self::COIN_GATE,
            'isQrpay'           => self::QRPAY,
            'isStripe'          => self::STRIPE,
            'isTatum'           => self::TATUM,
            'isFlutterwave'     => self::FLUTTERWAVE,
            'isSslCommerz'      => self::SSLCOMMERZ,
            'isRazorpay'        => self::RAZORPAY,
            'isPerfectMoney'    => self::PERFECT_MONEY,
        ];
    }

    public static function payment_method_slug()
    {
        return Str::slug(self::PAYMENTMETHOD);
    }


}
