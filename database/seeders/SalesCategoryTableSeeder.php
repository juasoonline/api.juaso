<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SalesCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Phones & Telecommunications",
            "slug"              =>  Str::slug( 'Phones and Telecommunications', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales_categories' ) -> insert(
            [
                "resource_id"       =>  hexdec( uniqid() ),

                "name"              =>  "Consumer Electronics",
                "slug"              =>  Str::slug( 'Consumer Electronics', '-' ),

                "created_at"        => date("Y-m-d H:i:s"),
                "updated_at"        => date("Y-m-d H:i:s"),
            ]);
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Women's Clothing",
            "slug"              =>  Str::slug( 'Womens Clothing', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Men's Clothing",
            "slug"              =>  Str::slug( 'Mens Clothing', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Shoes & Bags",
            "slug"              =>  Str::slug( 'Shoes and Bags', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Beauty & Health",
            "slug"              =>  Str::slug( 'Beauty and Health', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Jewelry & Watches",
            "slug"              =>  Str::slug( 'Jewelry and Watches', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'sales_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),

            "name"              =>  "Mother & Kids",
            "slug"              =>  Str::slug( 'Mother and Kids', '-' ),

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
