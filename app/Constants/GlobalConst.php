<?php

namespace App\Constants;

class GlobalConst
{
    public const USER_PASS_RESEND_TIME_MINUTE = "1";
    public const USEFUL_LINK_PRIVACY_POLICY   = "PRIVACY_POLICY";

    public const ACTIVE                = true;
    public const BANNED                = false;
    public const SUCCESS               = true;
    public const DEFAULT_TOKEN_EXP_SEC = 3600;
    public const BOOKING_EXP_SEC       = 20000;

    public const VERIFIED   = 1;
    public const APPROVED   = 1;
    public const PENDING    = 2;
    public const REJECTED   = 3;
    public const DEFAULT    = 0;
    public const UNVERIFIED = 0;

    public const USER  = "USER";
    public const ADMIN = "ADMIN";



    public const PAYMENT = "payment";

    public const RUNNING  = 2;
    public const COMPLETE = 1;
    public const CANCEL   = 3;

    public const PROFIT = "PROFIT";

    public const UNKNOWN = "UNKNOWN";

    public const MALE   = "Male";
    public const FEMALE = "Female";
    public const OTHERS = "Others";

    public const CASH_PAYMENT   = "cash";
    public const WALLET_PAYMENT = "wallet";
    public const ONLINE_PAYMENT = "online";

    public const STATUS_SUCCESS  = 1;
    public const STATUS_PENDING  = 2;
    public const STATUS_REJECTED = 3;
    public const STATUS_DISABLE  = 4;

    public const PAID   = 1;
    public const UNPAID = 0;

    public const BOOKED             = 0;
    public const READY_FOR_SHIPPING = 1;
    public const ON_THE_WAY         = 2;
    public const DELIVERED          = 3;

    public const SYSTEM_MAINTENANCE = "system-maintenance";

    public const EMAIL  = "email";
    public const MOBILE = "mobile";
    public const GMAIL  = "gmail";
}
