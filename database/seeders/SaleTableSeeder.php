<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'sales' ) -> insert(
        [
            "resource_id"       =>  9582985,

            "name"              =>  "Black Friday Sales",
            "slug"              =>  Str::slug( 'Black Friday Sales', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            'promo_start'       => '2021-09-01 15:15:38',
            'promo_end'         => '2021-12-10 15:15:38',

            'status'            => "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales' ) -> insert(
        [
            "resource_id"       =>  4875823,

            "name"              =>  "Christmas Sales",
            "slug"              =>  Str::slug( 'Christmas Sales', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            'promo_start'       => '2021-09-01 15:15:38',
            'promo_end'         => '2021-12-10 15:15:38',

            'status'            => "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales' ) -> insert(
        [
            "resource_id"       =>  9248524,

            "name"              =>  "Easter Sales",
            "slug"              =>  Str::slug( 'Easter Sales', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            'promo_start'       => '2021-09-01 15:15:38',
            'promo_end'         => '2021-12-10 15:15:38',

            'status'            => "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales' ) -> insert(
        [
            "resource_id"       =>  9845423,

            "name"              =>  "Anniversary Sales",
            "slug"              =>  Str::slug( 'Anniversary Sales', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            'promo_start'       => '2021-09-01 15:15:38',
            'promo_end'         => '2021-12-10 15:15:38',

            'status'            => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales' ) -> insert(
        [
            "resource_id"       =>  4245279,

            "name"              =>  "Monday Cyber Sales",
            "slug"              =>  Str::slug( 'Monday Cyber Sales', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            'promo_start'       => '2021-09-01 15:15:38',
            'promo_end'         => '2021-12-10 15:15:38',

            'status'        => "100",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
