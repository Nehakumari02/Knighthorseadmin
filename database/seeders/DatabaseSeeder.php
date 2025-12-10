<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\User\UserSeeder;
use Database\Seeders\Admin\RoleSeeder;
use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\CurrencySeeder;
use Database\Seeders\Admin\LanguageSeeder;
use Database\Seeders\Admin\SetupSeoSeeder;
use Database\Seeders\Admin\ExtensionSeeder;
use Database\Seeders\Admin\AppSettingsSeeder;
use Database\Seeders\Admin\AdminHasRoleSeeder;
use Database\Seeders\Admin\AreaProductSeeder;
use Database\Seeders\Admin\AreaSeeder;
use Database\Seeders\Admin\FreshBasicSettingsSeeder;
use Database\Seeders\Admin\SiteSectionsSeeder;
use Database\Seeders\Admin\BasicSettingsSeeder;
use Database\Seeders\Admin\PaymentGatewaySeeder;
use Database\Seeders\Admin\TransactionSettingSeeder;
use Database\Seeders\Admin\CategorySeeder;
use Database\Seeders\Admin\DeliverySettingsSeeder;
use Database\Seeders\Admin\SystemMaintenanceSeeder;
use Database\Seeders\Admin\OnBoardScreenSeeder;
use Database\Seeders\Admin\ProductSeeder;
use Database\Seeders\Admin\ShipmentSeeder;
use Database\Seeders\Admin\SmsProviderSeeder;
use Database\Seeders\Admin\SocialAuthDriverSeeder;
use Database\Seeders\Admin\SubCategorySeeder;
use Database\Seeders\Admin\UnitSeeder;
use Database\Seeders\Admin\UsefulLinkSeeder;
use Database\Seeders\Admin\UserWalletSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //fresh
        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            TransactionSettingSeeder::class,
            CurrencySeeder::class,
            BasicSettingsSeeder::class,
            SetupSeoSeeder::class,
            AppSettingsSeeder::class,
            SiteSectionsSeeder::class,
            ExtensionSeeder::class,
            AdminHasRoleSeeder::class,
            LanguageSeeder::class,
            UsefulLinkSeeder::class,
            PaymentGatewaySeeder::class,
            SystemMaintenanceSeeder::class,
            UnitSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            AreaSeeder::class,
            ShipmentSeeder::class,
            OnBoardScreenSeeder::class,
            DeliverySettingsSeeder::class,
            UsefulLinkSeeder::class,
        ]);

        //demo
        // $this->call([
        //     AdminSeeder::class,
        //     RoleSeeder::class,
        //     TransactionSettingSeeder::class,
        //     SystemMaintenanceSeeder::class,
        //     CurrencySeeder::class,
        //     BasicSettingsSeeder::class,
        //     SetupSeoSeeder::class,
        //     AppSettingsSeeder::class,
        //     SiteSectionsSeeder::class,
        //     ExtensionSeeder::class,
        //     AdminHasRoleSeeder::class,
        //     UserSeeder::class,
        //     LanguageSeeder::class,
        //     PaymentGatewaySeeder::class,
        //     OnBoardScreenSeeder::class,
        //     UnitSeeder::class,
        //     CategorySeeder::class,
        //     SubCategorySeeder::class,
        //     AreaSeeder::class,
        //     ShipmentSeeder::class,
        //     ProductSeeder::class,
        //     DeliverySettingsSeeder::class,
        //     UserWalletSeeder::class,
        //     SocialAuthDriverSeeder::class,
        //     SmsProviderSeeder::class,
        //      UsefulLinkSeeder::class,
        //      AreaProductSeeder::class
        // ]);
    }
}
