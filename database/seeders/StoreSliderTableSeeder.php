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
    }
}
