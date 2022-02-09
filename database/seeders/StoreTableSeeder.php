<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'stores' ) -> insert(
        [
            "resource_id"               =>  "8574525262076",

            "name"                      =>  "Mobile Island Company Limited",
            "doing_business_as"         =>  "Mobile Island",
            "slug"                      =>  Str::slug( 'Mobile Island', '-' ),

            "region"                    =>  "Greater Accra",
            "city"                      =>  "Accra",
            "address"                   =>  "Lakeside Estate, Ashaley Botwe. Adenta",
            "postal_code"               =>  "GPS-9776984",

            "mobile_phone"              =>  "2143658709",
            "other_phone"               =>  "9078563412",

            "website"                   =>  "https://mobileislandgh.com",
            "email"                     =>  "info@mobileislandgh.com",

            "banner_image"              =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/stores/banner1.jpg",

            "country_id"                =>  1,
            "subscription_id"           =>  2,

            "created_at"                => date("Y-m-d H:i:s"),
            "updated_at"                => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'stores' ) -> insert(
        [
            "resource_id"               =>  "8574525262644",

            "name"                      =>  "Clover Clothing Limited",
            "doing_business_as"         =>  "Clover Clothing",
            "slug"                      =>  Str::slug( 'Clover Clothing', '-' ),

            "region"                    =>  "Greater Accra",
            "city"                      =>  "Accra",
            "address"                   =>  "957257 Adade Road, East Legon",
            "postal_code"               =>  "GPS-9776984",

            "mobile_phone"              =>  "01234567890",
            "other_phone"               =>  "09876543210",

            "website"                   =>  "https://cloverclothing.com",
            "email"                     =>  "info@cloverclothing.com",

            "banner_image"              =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/stores/banner2.jpg",

            "country_id"                =>  1,
            "subscription_id"           =>  2,

            "created_at"                => date("Y-m-d H:i:s"),
            "updated_at"                => date("Y-m-d H:i:s"),
        ]);
    }
}
