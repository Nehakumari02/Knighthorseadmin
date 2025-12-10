<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        // If record exists, update it
        Currency::updateOrCreate(
            ['id' => 1], // <-- match existing record
            [
                'admin_id'  => 1,
                'country'   => 'India',
                'name'      => 'Indian Rupee',
                'code'      => 'INR',
                'symbol'    => '₹',
                'type'      => 'FIAT',
                'flag'      => 'india.webp', // put correct file name if uploaded
                'rate'      => '1.00000000',
                'sender'    => 1,
                'receiver'  => 1,
                'default'   => 1,
                'status'    => 1,
            ]
        );
    }
}
