<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlackFridayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 1,
            'sale_id' => 1,
            'category_id' => 1,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 2,
            'sale_id' => 1,
            'category_id' => 2,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 3,
            'sale_id' => 1,
            'category_id' => 3,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 4,
            'sale_id' => 1,
            'category_id' => 4,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 5,
            'sale_id' => 1,
            'category_id' => 5,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 6,
            'sale_id' => 1,
            'category_id' => 6,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 7,
            'sale_id' => 1,
            'category_id' => 7,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 8,
            'sale_id' => 1,
            'category_id' => 8,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 9,
            'sale_id' => 1,
            'category_id' => 1,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 10,
            'sale_id' => 1,
            'category_id' => 2,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 11,
            'sale_id' => 1,
            'category_id' => 3,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 12,
            'sale_id' => 1,
            'category_id' => 4,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 13,
            'sale_id' => 1,
            'category_id' => 5,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 14,
            'sale_id' => 1,
            'category_id' => 6,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 15,
            'sale_id' => 1,
            'category_id' => 7,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 16,
            'sale_id' => 1,
            'category_id' => 8,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 17,
            'sale_id' => 1,
            'category_id' => 1,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 18,
            'sale_id' => 1,
            'category_id' => 2,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 19,
            'sale_id' => 1,
            'category_id' => 3,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'black_fridays' ) -> insert(
        [
            'product_id' => 20,
            'sale_id' => 1,
            'category_id' => 4,

            'promo_start' => '2021-09-01 15:15:38',
            'promo_end' => '2021-12-10 15:15:38',

            'status' => "000",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}