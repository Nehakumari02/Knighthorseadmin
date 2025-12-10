<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\DeliverySettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('id' => '1','bag_price' => '2','amount_spend' => '2','delivery_count' => '2','created_at' => '2025-05-16 14:42:18','updated_at' => '2025-05-15 14:38:49')
        ];
        DeliverySettings::insert($data);
    }
}
