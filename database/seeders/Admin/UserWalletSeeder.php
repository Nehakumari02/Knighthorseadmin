<?php

namespace Database\Seeders\Admin;

use App\Models\User\UserWallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
              array('id' => '1','user_id' => '1','currency_id' => '1','balance' => '0.00000000','status' => '1','created_at' => '2025-05-28 12:58:58','updated_at' => null),
            array('id' => '2','user_id' => '2','currency_id' => '1','balance' => '0.00000000','status' => '1','created_at' => '2025-05-28 12:58:58','updated_at' => null),
        ];
        UserWallet::insert($data);
    }
}
