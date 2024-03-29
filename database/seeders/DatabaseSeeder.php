<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([ CountriesTableSeeder::class ]);
        $this -> call([ BrandsTableSeeder::class ]);
        $this -> call([ GroupTableSeeder::class ]);
        $this -> call([ CategoryTableSeeder::class ]);
        $this -> call([ SubcategoryTableSeeder::class ]);
        $this -> call([ SubscriptionTableSeeder::class ]);
        $this -> call([ ShipperTableSeeder::class ]);
        $this -> call([ TransportTableSeeder::class ]);
        $this -> call([ PaymentMethodTableSeeder::class ]);
        $this -> call([ DeliveryFeeTableSeeder::class ]);

        $this -> call([ StoreTableSeeder::class ]);
        $this -> call([ StoreAdministratorTableSeeder::class ]);
        $this -> call([ ChargeTableSeeder::class ]);
        $this -> call([ StoreCategoryTableSeeder::class ]);
        $this -> call([ StoreSubcategoryTableSeeder::class ]);
        $this -> call([ ProductTableSeeder::class ]);
        $this -> call([ ProductCategoryTableSeeder::class ]);
        $this -> call([ SpecificationTableSeeder::class ]);
        $this -> call([ ImageTableSeeder::class ]);
        $this -> call([ OverviewTableSeeder::class ]);
        $this -> call([ ColorTableSeeder::class ]);
        $this -> call([ SizeTableSeeder::class ]);
        $this -> call([ BundleTableSeeder::class ]);

        $this -> call([ CustomerTableSeeder::class ]);
        $this -> call([ AddressTableSeeder::class ]);

        $this -> call([ SaleTableSeeder::class ]);
        $this -> call([ SalesCategoryTableSeeder::class ]);
        $this -> call([ BlackFridayTableSeeder::class ]);
        $this -> call([ ChristmasSalesTableSeeder::class ]);
        $this -> call([ EasterSalesTableSeeder::class ]);
        $this -> call([ AnniversarySalesTableSeeder::class ]);
        $this -> call([ CyberMondaySalesTableSeeder::class ]);

        $this -> call([ FlashDealTableSeeder::class ]);
        $this -> call([ WeeklyDealTableSeeder::class ]);

        $this -> call([ SliderTableSeeder::class ]);
        $this -> call([ BannerTableSeeder::class ]);

        $this -> call([ StoreSliderTableSeeder::class ]);
    }
}
