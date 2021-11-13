<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Store 1 product sliders
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/slider1.webp",
            "description"       =>  "Image 1 description",

            "store_id"          =>  1,
            "product_id"        =>  1,

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/slider2.webp",
            "description"       =>  "Image 1 description",

            "store_id"          =>  1,
            "product_id"        =>  3,

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/slider3.webp",
            "description"       =>  "Image 1 description",

            "store_id"          =>  1,
            "product_id"        =>  5,

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        // Store 2 product sliders
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/banner-7.webp",
            "description"       =>  "Image 1 description",

            "store_id"          =>  2,
            "product_id"        =>  2,

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/banner-8.webp",
            "description"       =>  "Image 1 description",

            "store_id"          =>  2,
            "product_id"        =>  4,

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "image"             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/banner-9.webp",
            "description"       =>  "Image 1 description",

            "store_id"          =>  2,
            "product_id"        =>  6,

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
