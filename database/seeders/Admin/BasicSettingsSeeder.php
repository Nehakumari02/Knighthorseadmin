<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Exception;

class BasicSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id'              => '1',
            'site_name'       => 'Knighthorse',
            'site_title'      => 'Knighthorse',
            'base_color'      => '#FDD670',
            'secondary_color' => '#FF686E',


            'otp_exp_seconds' => '3600',
            'timezone'        => 'Asia/Dhaka',

            'user_registration'  => '1',
            'secure_password'    => '0',
            'agree_policy'       => '0',
            'force_ssl'          => '0',
            'email_verification' => '0',
            'sms_verification'   => '0',
            'email_notification' => '0',
            'push_notification'  => '1',
            'kyc_verification'   => '0',

            'site_logo_dark' => 'bf0a14a4-f37b-4a3b-8155-1a4e8865f800.webp',
            'site_logo'      => '8ef57975-8d60-47d0-a8c5-689540038e9e.webp',
            'site_fav_dark'  => 'bf79310c-7a4e-4824-b705-6842ebf34f10.webp',
            'site_fav'       => 'e5ee96cf-af1c-489e-bb4b-0ea7e10f96fe.webp',



            'preloader_image' => null,

            'mail_config' => [
                'method'     => 'smtp',
                'host'       => '',
                'port'       => '465',
                'encryption' => '',
                'username'   => '',
                'password'   => '',
                'from'       => '',
                'app_name'   => ''
            ],

            'mail_activity' => null,

            'push_notification_config' => [
                'method'      => 'pusher',
                'instance_id' => '3488cd8e-e72f-4bb3-9de1-9e8e0511d5b6',
                'primary_key' => '2AC53D6674DCB87FC56834DA05C7F900F54DE998E234B94C4B158B5F2E2B427F'
            ],

            'push_notification_activity' => null,

            'broadcast_config' => [
                'method'      => 'pusher',
                'app_id'      => '',
                'primary_key' => '',
                'secret_key'  => '',
                'cluster'     => 'ap2'
            ],

            'broadcast_activity' => null,

            'sms_config'   => null,
            'sms_activity' => null,

            'web_version'   => '1.0.0',
            'admin_version' => '2.5.0',

            'created_at' => '2025-02-07 17:38:48',
            'updated_at' => '2025-02-07 17:58:59'
        ];

        BasicSettings::truncate();
        BasicSettings::firstOrCreate($data);
    }
}
