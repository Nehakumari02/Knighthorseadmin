<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('id' => '1', 'name' => 'Express Shipment', 'delivery_delay_days' => '2','delivery_charge' => '20', 'default' => '0','star_time' => '10:17', 'end_time' => '22:17', 'time_range' => '1', 'created_at' => '2025-05-28 17:18:03', 'updated_at' => '2025-05-28 17:18:03'),
            array('id' => '2', 'name' => 'Regular shipment', 'delivery_delay_days' => '5', 'delivery_charge' => '20','default' => '1','star_time' => '11:18', 'end_time' => '19:18', 'time_range' => '1', 'created_at' => '2025-05-28 17:19:00', 'updated_at' => '2025-05-28 17:19:00')
        ];

        Shipment::insert($data);
    }
}
