<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\AppOnboardScreens;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnBoardScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            array('id' => '1','title' => 'The Easy way to get Organic Grocery item from adMart','sub_title' => 'Use adMart app to get easily, fastly & low rate grocery item, anywhere anytime.','image' => 'Onboard 1.png','status' => '1','last_edit_by' => '1','created_at' => '2025-04-28 11:06:43','updated_at' => '2025-04-28 11:06:43','type' => 'USER'),
            array('id' => '2','title' => 'You can buy any grocery item from us at low cost','sub_title' => 'Use adMart app to get easily, fastly & low rate grocery item, anywhere anytime','image' => 'Onboard 2.png','status' => '1','last_edit_by' => '1','created_at' => '2025-04-28 11:07:35','updated_at' => '2025-04-28 11:07:35','type' => 'USER'),
            array('id' => '3','title' => 'We always provide very fast product delivery','sub_title' => 'Use adMart app to get easily, fastly & low rate grocery item, anywhere anytime.','image' => 'Onboard 3.png','status' => '1','last_edit_by' => '1','created_at' => '2025-04-28 11:08:17','updated_at' => '2025-04-28 11:08:17','type' => 'USER'),

        ];

        AppOnboardScreens::insert($data);
    }
}
