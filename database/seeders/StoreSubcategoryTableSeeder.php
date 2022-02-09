<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Store 1 subcategories
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  1,

            "name"              =>  "Sulee Long Jeans",
            "slug"              =>  Str::slug( 'Sulee Long Jeans', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  1,

            "name"              =>  "Sulee Short Jeans",
            "slug"              =>  Str::slug( 'Sulee Short Jeans', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  1,

            "name"              =>  "Skinny Jeans",
            "slug"              =>  Str::slug( 'Skinny Jeans', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  2,

            "name"              =>  "Hoodies",
            "slug"              =>  Str::slug( 'Hoodies', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  2,

            "name"              =>  "Sweatshirts",
            "slug"              =>  Str::slug( 'Sweatshirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  3,

            "name"              =>  "Print Flower Shirts",
            "slug"              =>  Str::slug( 'Print Flower Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  3,

            "name"              =>  "China Linen Shirts",
            "slug"              =>  Str::slug( 'China Linen Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  3,

            "name"              =>  "Denim Cargo Shirts",
            "slug"              =>  Str::slug( 'Denim Cargo Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  3,

            "name"              =>  "Plaid Shirts",
            "slug"              =>  Str::slug( 'Plaid Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  4,

            "name"              =>  "Casual Shorts",
            "slug"              =>  Str::slug( 'Casual Shorts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  4,

            "name"              =>  "Cargo Camouflage Shorts",
            "slug"              =>  Str::slug( 'Cargo Camouflage Shorts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  5,

            "name"              =>  "Coats And Jackets",
            "slug"              =>  Str::slug( 'Coats And Jackets', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  5,

            "name"              =>  "Faux Leather Jackets",
            "slug"              =>  Str::slug( 'Faux Leather Jackets', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  5,

            "name"              =>  "Wool and Blends",
            "slug"              =>  Str::slug( 'Wool and Blends', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);


        // Store 2 subcategories
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  6,

            "name"              =>  "Sulee Long Jeans",
            "slug"              =>  Str::slug( 'Sulee Long Jeans', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  6,

            "name"              =>  "Sulee Short Jeans",
            "slug"              =>  Str::slug( 'Sulee Short Jeans', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  6,

            "name"              =>  "Skinny Jeans",
            "slug"              =>  Str::slug( 'Skinny Jeans', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  7,

            "name"              =>  "Hoodies",
            "slug"              =>  Str::slug( 'Hoodies', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  7,

            "name"              =>  "Sweatshirts",
            "slug"              =>  Str::slug( 'Sweatshirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  8,

            "name"              =>  "Print Flower Shirts",
            "slug"              =>  Str::slug( 'Print Flower Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  8,

            "name"              =>  "China Linen Shirts",
            "slug"              =>  Str::slug( 'China Linen Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  8,

            "name"              =>  "Denim Cargo Shirts",
            "slug"              =>  Str::slug( 'Denim Cargo Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  8,

            "name"              =>  "Plaid Shirts",
            "slug"              =>  Str::slug( 'Plaid Shirts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  9,

            "name"              =>  "Casual Shorts",
            "slug"              =>  Str::slug( 'Casual Shorts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  9,

            "name"              =>  "Cargo Camouflage Shorts",
            "slug"              =>  Str::slug( 'Cargo Camouflage Shorts', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  10,

            "name"              =>  "Coats And Jackets",
            "slug"              =>  Str::slug( 'Coats And Jackets', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  10,

            "name"              =>  "Faux Leather Jackets",
            "slug"              =>  Str::slug( 'Faux Leather Jackets', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_subcategories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_category_id" =>  10,

            "name"              =>  "Wool and Blends",
            "slug"              =>  Str::slug( 'Wool and Blends', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
