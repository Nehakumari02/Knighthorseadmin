<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_title',
        'base_color',
        'secondary_color',
        'otp_exp_seconds',
        'timezone',
        'user_registration',
        'secure_password',
        'agree_policy',
        'force_ssl',
        'email_verification',
        'sms_verification',
        'email_notification',
        'push_notification',
        'kyc_verification',
        'site_logo_dark',
        'site_logo',
        'site_fav_dark',
        'site_fav',
        'preloader_image',
        'mail_config',
        'mail_activity',
        'push_notification_config',
        'push_notification_activity',
        'broadcast_config',
        'broadcast_activity',
        'sms_config',
        'sms_activity',
        'web_version',
        'admin_version',
    ];

    protected $casts = [
        'mail_config'              => 'object',
        'sms_config'               => 'object',
        'push_notification_config' => 'object',
        'broadcast_config'         => 'object',
        'site_logo_dark'           => 'string',
        'site_logo'                => 'string',
        'site_fav_dark'            => 'string',
        'site_fav'                 => 'string',
        'site_fav'                 => 'string',
        'email_verification'       => 'integer',
        'email_notification'       => 'integer',
        'site_name'                => 'string',
        'site_title'               => 'string',
        'base_color'               => 'string',
        'secondary_color'          => 'string',
        'secure_password'          => 'integer',
        'agree_policy'             => 'integer',
        'web_version'              => 'string',

        

    ];


    public function mailConfig() {}
}
