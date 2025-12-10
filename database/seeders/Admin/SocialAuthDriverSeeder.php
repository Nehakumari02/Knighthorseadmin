<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\SocialAuthDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Uid\Ulid;

class SocialAuthDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'ulid'              => Ulid::generate(),
                'panel'             => SocialAuthDriver::PANEL_USER,
                'driver_name'       => "Google",
                'driver_slug'       => "google",
                'credentials'       => [
                    "client_id"         => ['title' => 'Client ID', 'value' => '99895611260-2bg8php3l6bacj6b9pulolct7p6dv96u.apps.googleusercontent.com'],
                    "client_secret"     => ['title' => 'Client Secret', 'value' => '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'],
                ],
                'image'             => "google-image.png",
                'status'            => true,
                'created_at'        => now(),
            ]
        ];

        foreach ($data as $item) {
            if (SocialAuthDriver::where('panel', $item['panel'])->where('driver_slug', $item['driver_slug'])->exists() == false) {
                SocialAuthDriver::create($item);
            }
        }
    }
}
