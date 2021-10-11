<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "TCL",
            "slug"              =>  Str::slug( 'TCL', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Samsung",
            "slug"              =>  Str::slug( 'Samsung', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "LG",
            "slug"              =>  Str::slug( 'LG', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Apple",
            "slug"              =>  Str::slug( 'Apple', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
