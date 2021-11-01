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
            "logo"              =>  "https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/brands/tcl-logo.png",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Samsung",
            "slug"              =>  Str::slug( 'Samsung', '-' ),
            "logo"              =>  "https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/brands/samsung-logo.png",
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "LG",
            "slug"              =>  Str::slug( 'LG', '-' ),
            "logo"              =>  "https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/brands/lg-logo.png",
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'brands' ) -> insert
        ([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Apple",
            "slug"              =>  Str::slug( 'Apple', '-' ),
            "logo"              =>  "https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/brands/apple-logo.png",
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);
    }
}
