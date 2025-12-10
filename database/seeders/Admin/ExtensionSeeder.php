<?php

namespace Database\Seeders\Admin;

use App\Constants\ExtensionConst;
use App\Models\Admin\Extension;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            array('id' => '1','name' => 'Tawk','slug' => 'tawk-to','description' => 'Go to your tawk to dashbaord. Click [setting icon] on top bar. Then click [Chat Widget] link from sidebar and follow the screenshot bellow. Copy property ID and paste it in Property ID field. Then copy widget ID and paste it in Widget ID field. Finally click on [Update] button and you are ready to go.','image' => 'logo-tawk-to.png','script' => null,'shortcode' => '{"property_id":{"title":"Property ID","value":"6263cb787b967b11798c1faf"},"widget_id":{"title":"Widget ID","value":"1g1at5k98"}}','support_image' => 'instruction-tawk-to.png','status' => '1','created_at' => '2024-10-21 19:00:53','updated_at' => '2024-10-22 06:22:35'),


    ];
        Extension::insert($data);
    }
}
