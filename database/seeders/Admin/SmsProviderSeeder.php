<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\SmsProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmsProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sms_providers = array(
            array('id' => '2','uuid' => '9fce64f3-2af2-4172-8f72-6134d73bd6cc','name' => 'Twilio','slug' => 'twilio','title' => 'Twilio SMS Provider','image' => 'cb0477b3-4c52-4dac-b0ec-5082ab317d44.webp','credentials' => '[{"label":"Account SID","placeholder":"Enter Account SID","name":"account_sid","value":"ACe46ba3ab4cb5060f8127d0ff50d1f9ec"},{"label":"Auth Token","placeholder":"Enter Auth Token","name":"auth_token","value":"78d9b7008d96bd40c74e41228328a527"},{"label":"From Phone Number","placeholder":"Enter From Phone Number","name":"from_phone_number","value":"+17248036837"}]','env' => 'SANDBOX','status' => '1','created_at' => '2025-05-26 11:21:41','updated_at' => '2025-05-26 11:21:43')
        );

        SmsProvider::upsert($sms_providers, ['slug'], []);
    }
}
