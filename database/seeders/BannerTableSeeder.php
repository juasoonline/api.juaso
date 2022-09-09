<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'banners' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  1,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/top_banners/black-friday-banner.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'banners' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  2,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/top_banners/christmas-sales.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'banners' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  3,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/top_banners/christmas-sales.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'banners' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  4,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/top_banners/christmas-sales.jpg",

            "status"            =>  "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'banners' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "sale_id"           =>  5,

            "type"              =>  "Sales",
            'image'             =>  "https://juasoonline.nyc3.digitaloceanspaces.com/juaso/campaigns/top_banners/christmas-sales.jpg",

            "status"            =>  "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}