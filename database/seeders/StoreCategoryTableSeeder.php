<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Store 1 categories
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  1,

            "name"              =>  "Men Loose Jeans",
            "slug"              =>  Str::slug( 'Men Loose Jeans', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  1,

            "name"              =>  "Hoodies and Sweatshirts",
            "slug"              =>  Str::slug( 'Hoodies and Sweatshirts', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  1,

            "name"              =>  "Shirts",
            "slug"              =>  Str::slug( 'Shirts', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  1,

            "name"              =>  "Short Pants",
            "slug"              =>  Str::slug( 'Short Pants', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  1,

            "name"              =>  "Coats and Jackets",
            "slug"              =>  Str::slug( 'Coats and Jackets', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        // Store 2 categories
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  2,

            "name"              =>  "Men Loose Jeans",
            "slug"              =>  Str::slug( 'Men Loose Jeans', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  2,

            "name"              =>  "Hoodies and Sweatshirts",
            "slug"              =>  Str::slug( 'Hoodies and Sweatshirts', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  2,

            "name"              =>  "Shirts",
            "slug"              =>  Str::slug( 'Shirts', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  2,

            "name"              =>  "Short Pants",
            "slug"              =>  Str::slug( 'Short Pants', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'store_categories' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "store_id"          =>  2,

            "name"              =>  "Coats and Jackets",
            "slug"              =>  Str::slug( 'Coats and Jackets', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
