<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            array('id' => '1','slug' => 'service-list','name' => '{"language":{"en":{"name":"Doctor Details"},"fr":{"name":"D\\u00e9tails du m\\u00e9decin"},"es":{"name":"Detalles del m\\u00e9dico"},"ar":{"name":"\\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0627\\u0644\\u0637\\u0628\\u064a\\u0628"}}}','status' => '1','created_at' => '2024-12-09 15:14:33','updated_at' => '2025-04-21 09:46:19'),
            array('id' => '2','slug' => 'salon-details','name' => '{"language":{"en":{"name":"Service List"},"fr":{"name":"Liste des services"},"es":{"name":"Lista de servicios"},"ar":{"name":"\\u0642\\u0627\\u0626\\u0645\\u0629 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0629"}}}','status' => '1','created_at' => '2024-12-09 15:24:00','updated_at' => '2025-04-21 09:45:06')

        ];

        BlogCategory::insert($data);
    }
}
