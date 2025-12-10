<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('id' => '1','name' => 'Kilogram','unit' => 'kg','slug' => 'kilogram','status' => '1','created_at' => '2025-05-09 17:51:12','updated_at' => '2025-05-09 17:51:12'),
            array('id' => '2','name' => 'Gram','unit' => 'g','slug' => 'gram','status' => '1','created_at' => '2025-05-09 17:51:22','updated_at' => '2025-05-09 17:51:22'),
            array('id' => '3','name' => 'Liter','unit' => 'L','slug' => 'liter','status' => '1','created_at' => '2025-05-09 17:51:43','updated_at' => '2025-05-09 17:51:43'),
            array('id' => '4','name' => 'piece','unit' => 'piece','slug' => 'piece','status' => '1','created_at' => '2025-05-09 17:51:59','updated_at' => '2025-05-09 17:51:59'),
            array('id' => '5','name' => 'bundle','unit' => 'bundle','slug' => 'bundle','status' => '1','created_at' => '2025-05-09 17:52:26','updated_at' => '2025-05-09 17:52:26'),
            array('id' => '6','name' => 'pair','unit' => 'pair','slug' => 'pair','status' => '1','created_at' => '2025-05-09 17:53:05','updated_at' => '2025-05-09 17:53:05'),
            array('id' => '7','name' => 'set','unit' => 'set','slug' => 'set','status' => '1','created_at' => '2025-05-09 17:53:27','updated_at' => '2025-05-09 17:53:27')

        ];
        Unit::insert($data);
    }
}
