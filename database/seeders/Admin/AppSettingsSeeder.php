<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\AppSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

           'id' => '1','version' => '1.0.1','splash_screen_image' => 'Splash Screen.png','url_title' => null,'android_url' => null,'iso_url' => null,'created_at' => '2025-02-10 15:09:11','updated_at' => '2025-04-28 10:57:17'

        ];

        AppSettings::firstOrCreate($data);
    }
}
