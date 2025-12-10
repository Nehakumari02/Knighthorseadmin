<?php

namespace App\Models;

use App\Constants\GlobalConst;
use App\Models\User\UserWallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    protected $appends = ['fullname', 'userImage', 'stringStatus', 'lastLogin'];
    protected $dates   = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'user_type',  
        'gstNo',
        'verificationStatus',
        'email',
        'mobile_code',
        'mobile',
        'full_mobile',
        'password',
        'assign_to',
        'driver',
        'referral_id',
        'image',
        'status',
        'free_delivery_status',
        'total_spend_amount',
        'free_delivery_token',
        'address',
        'email_verified',
        'sms_verified',
        'kyc_verified',
        'ver_code',
        'ver_code_send_at',
        'two_factor_verified',
        'two_factor_status',
        'two_factor_secret',
        'email_verified_at',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'firstname'                       => 'string',
        'lastname'                        => 'string',
        'username'                        => 'string',
        'gstNo'                        => 'string',
        'verificationStatus' => 'string',
        'email'                           => 'string',
        'mobile_code'                     => 'string',
        'driver'                          => 'string',
        'mobile'                          => 'string',
        'full_mobile'                     => 'string',
        'password'                        => 'string',
        'assign_to'                       => 'string',
        'refferal_user_id'                => 'integer',
        'image'                           => 'string',
        'status'                          => 'integer',
        'email_verified_at'               => 'datetime',
        'address'                         => 'string',
        'email_verified'                  => 'integer',
        'sms_verified'                    => 'integer',
        'kyc_verified'                    => 'integer',
        'ver_code'                        => 'integer',
        'ver_code_send_at'                => 'datetime',
        'two_factor_verified'             => 'integer',
        'two_factor_status'               => 'integer',
        'device_id'                       => 'string',
        'social_type'                     => 'string',
        'remember_token'                  => 'string',
        'deleted_at'                      => 'datetime',
        'created_at'                      => 'datetime',
        'updated_at'                      => 'datetime',
        'free_delivery_status'            => 'integer',
        'total_spend_amount'              => 'integer',
        'free_delivery_token'             => 'integer',
    ];

    public function scopeEmailUnverified($query)
    {
        return $query->where('email_verified', false);
    }

    public function scopeEmailVerified($query)
    {
        return $query->where("email_verified", true);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeBanned($query)
    {
        return $query->where('status', false);
    }


    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }


    public function getUserImageAttribute()
    {
        $image = $this->image;

        if ($image == null) {
            return files_asset_path('profile-default');
        } elseif (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        } else {
            return files_asset_path("user-profile") . "/" . $image;
        }
    }

    public function passwordResets()
    {
        return $this->hasMany(UserPasswordReset::class, "user_id");
    }

    public function scopeGetSocial($query, $credentials)
    {
        return $query->where("email", $credentials);
    }

    public function getStringStatusAttribute()
    {
        $status = $this->status;
        $data   = [
            'class' => "",
            'value' => "",
        ];
        if ($status == GlobalConst::ACTIVE) {
            $data = [
                'class'     => "badge badge--success",
                'value'     => "Active",
            ];
        } elseif ($status == GlobalConst::BANNED) {
            $data = [
                'class'     => "badge badge--danger",
                'value'     => "Banned",
            ];
        }
        return (object) $data;
    }



    public function loginLogs()
    {
        return $this->hasMany(UserLoginLog::class);
    }

    public function getLastLoginAttribute()
    {
        if ($this->loginLogs()->count() > 0) {
            return $this->loginLogs()->get()->last()->created_at->format("H:i A, d M Y");
        }

        return "N/A";
    }

    public function scopeSearch($query, $data)
    {
        return $query->where(function ($q) use ($data) {
            $q->where("username", "like", "%" . $data . "%");
        })->orWhere("email", "like", "%" . $data . "%")->orWhere("full_mobile", "like", "%" . $data . "%");
    }

    public function wallets()
    {
        return $this->hasOne(UserWallet::class);
    }
}
