<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'campaign_sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            'start'             => '2021-09-01 15:15:38',
            'end'               => '2021-12-10 15:15:38',

            'name'              => '',
            'slug'              => '',

            'slider_image'      => 'https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/slider1.webp',

            'status'            => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'campaign_sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            'start'             => '2021-09-01 15:15:38',
            'end'               => '2021-12-10 15:15:38',

            'name'              => '',
            'slug'              => '',

            'slider_image'      => 'https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/slider1.webp',

            'status'            => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'campaign_sliders' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            'start'             => '2021-09-01 15:15:38',
            'end'               => '2021-12-10 15:15:38',

            'name'              => '',
            'slug'              => '',

            'slider_image'      => 'https://juasoonline.nyc3.digitaloceanspaces.com/test/images/sliders/store/slider1.webp',

            'status'            => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
