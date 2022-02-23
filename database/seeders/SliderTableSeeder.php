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
            'image'             =>  "https://res.cloudinary.com/jusoonline-ghana-limited/image/upload/v1644595885/juasoonline/resources/api/campaings/sliders/slider_1_bb2vya.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  2,

            "type"              =>  "Sales",
            'image'             =>  "https://res.cloudinary.com/jusoonline-ghana-limited/image/upload/v1644595869/juasoonline/resources/api/campaings/sliders/slider_2_fcv8hu.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  3,

            "type"              =>  "Sales",
            'image'             =>  "https://res.cloudinary.com/jusoonline-ghana-limited/image/upload/v1644595879/juasoonline/resources/api/campaings/sliders/slider_3_dffwkz.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  4,

            "type"              =>  "Product",
            'image'             =>  "https://res.cloudinary.com/jusoonline-ghana-limited/image/upload/v1644611197/juasoonline/resources/api/campaings/sliders/slider_4_hecr7o.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "product_id"        =>  5,

            "type"              =>  "Product",
            'image'             =>  "https://res.cloudinary.com/jusoonline-ghana-limited/image/upload/v1644611197/juasoonline/resources/api/campaings/sliders/slider_5_l9zzel.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
