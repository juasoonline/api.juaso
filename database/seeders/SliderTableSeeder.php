<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder
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

            "sale_id"           =>  1,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/sliders/slider_1.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  2,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/sliders/slider_2.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  3,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/sliders/slider_3.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  4,

            "type"              =>  "Product",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/sliders/slider_4.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  5,

            "type"              =>  "Product",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/sliders/slider_5.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
