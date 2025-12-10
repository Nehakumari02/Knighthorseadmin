<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
       
        $productIds = range(1, 300);
        
        foreach ($productIds as $productId) {
    
            $areaCount = rand(1, 3);
            
            $areaIds = collect(range(1, 3))
                ->shuffle()
                ->take($areaCount)
                ->toArray();
            
            // Prepare data for insertion
            $data = array_map(function($areaId) use ($productId) {
                return [
                    'area_id' => $areaId,
                    'product_id' => $productId,
                  
                ];
            }, $areaIds);
            
            // Insert into pivot table
            DB::table('area_product')->insert($data);
           
        }
        
    }
}
