<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BundleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product 1 colors
        DB::table( 'bundles' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  3,

            "bundle"            =>  "Black Wool with leather belt",
            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/items/bundles/bundle3_1.jpg",

            "quantity"          =>  "144",
            "price"             =>  "400",
            "sales_price"       =>  "210",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'bundles' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  3,

            "bundle"            =>  "Black Wool with clark suede shoe",
            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/items/bundles/bundle3_2.jpg",

            "quantity"          =>  "644",
            "price"             =>  "400",
            "sales_price"       =>  "299",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'bundles' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  3,

            "bundle"            =>  "Black Wool with white long sleeves shirt",
            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/items/bundles/bundle3_3.jpg",

            "quantity"          =>  "200",
            "price"             =>  "300",
            "sales_price"       =>  "245",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}