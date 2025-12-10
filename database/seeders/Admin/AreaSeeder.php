<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('id' => '1', 'slug' => 'califonia', 'name' => 'Califonia', 'status' => '1', 'created_at' => '2025-05-12 09:51:47', 'updated_at' => '2025-05-12 09:51:47'),
            array('id' => '2', 'slug' => 'los-angeles', 'name' => 'Los Angeles', 'status' => '1', 'created_at' => '2025-05-12 09:52:02', 'updated_at' => '2025-05-12 09:52:02'),
            array('id' => '3', 'slug' => 'new-york', 'name' => 'New York', 'status' => '1', 'created_at' => '2025-05-12 09:52:07', 'updated_at' => '2025-05-12 09:52:07')

        ];
        Area::insert($data);
    }
}
