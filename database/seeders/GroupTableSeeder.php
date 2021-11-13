<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Women's Fashion",
            "slug"              =>  Str::slug( 'Womens Fashion', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M16.306 22.704l-1.793-4.704.535 4.85c-.939.092-1.967.15-3.077.15-1.065 0-2.055-.053-2.96-.136l.536-4.864-1.8 4.721c-2.095-.282-3.605-.707-4.346-.948l5.526-10.773h6.272l5.41 10.746c-.736.241-2.23.669-4.303.958m-8.716-17.178l-2.443.802-1.026-1.63 4.093-3.461c.314.863 1.401 3.263 3.802 3.263 2.542 0 3.509-2.606 3.725-3.311l4.169 3.51-1.025 1.629-2.453-.805-1.167 4.477h-6.415l-1.26-4.474zm6.907-3.908c-.383.8-1.149 1.882-2.481 1.882-1.3 0-2.111-1.071-2.545-1.899 1.93.606 3.308.55 5.026.017m1.636 9.015l.998-3.828 2.184.716 1.906-3.026-5.356-4.508c-.879.438-3.632 2.018-7.722.001l-5.332 4.508 1.906 3.025 2.193-.719 1.08 3.833-5.99 11.677.507.206c.15.061 3.725 1.482 9.464 1.482 5.739 0 9.375-1.447 9.526-1.51l.503-.203-5.867-11.654z"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Men's Fashion",
            "slug"              =>  Str::slug( 'Mens Fashion', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",
            "web_icon"          =>  '<svg class="h-5 w-5"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g id="Layer_23" data-name="Layer 23"><path d="M52.18,18.7A10,10,0,0,0,49,12.24a.61.61,0,0,0-.19-.17,11.18,11.18,0,0,0-2.53-1.62,28,28,0,0,1-7.14-2.93,5.73,5.73,0,0,0-1.73-3.11c-3.27-1.31-7.1-1.06-10.73-.3-.59.19-.44,1.24-.8,1.72v0A5.22,5.22,0,0,1,24.83,7.4c-.32.24-.64.45-1,.66l-.08,0A14.3,14.3,0,0,1,21.3,9.23C18,10.2,16,11.05,15.06,12c-.18.2-.36.41-.53.62h0a.53.53,0,0,0-.21.26c-2.43,3.24-3.1,7.81-3.43,14.78a.5.5,0,0,0,.28.47,12.76,12.76,0,0,0,7.48,1.18c.39,0,.45-.44.47-.76.44,5.8.28,15.71-.48,29.57a.5.5,0,0,0,.36.51,48.59,48.59,0,0,0,26.07.24.52.52,0,0,0,.38-.53c-.4-7.55-.56-12.82-.5-16.12A91.49,91.49,0,0,1,45,29a.52.52,0,0,0,.41.32,16.86,16.86,0,0,0,7.21-1.07.5.5,0,0,0,.33-.35C53.29,26.6,53,23.57,52.18,18.7ZM37.66,6.32a10,10,0,0,1,.6,1.7h0a.75.75,0,0,0,.07.12h0a1.47,1.47,0,0,0,.4.29,11.22,11.22,0,0,1-1.29,4.81c-.6-.4-1.48-1.05-2.67-1.94C36.34,10,37.65,8.41,37.66,6.32Zm-5.87,7.57a14.63,14.63,0,0,1-1.42-3,.49.49,0,0,0-.51-.34l-.8,0a11.77,11.77,0,0,1-2-3.14C31.82,7,35,7,36.5,7.41a7.83,7.83,0,0,1-2.87,3.53h0a.61.61,0,0,0-.12.16A21,21,0,0,1,31.79,13.89Zm.49,1v6.35h-1v-6.3a.58.58,0,0,0,.46.31C32,15.26,32.14,15.06,32.28,14.88ZM26.84,6.2A6.83,6.83,0,0,0,27.24,5a19.92,19.92,0,0,1,9.25.05,4.65,4.65,0,0,1,.18,1.35c-1.74-.46-5-.44-9.84.06A2.53,2.53,0,0,1,26.84,6.2Zm-1.36,2A6.53,6.53,0,0,0,26,7.53a11.46,11.46,0,0,0,2.19,3.63,8.91,8.91,0,0,1-2,1.93c-.23-.23-.78-1.1-1.56-4.35A9.26,9.26,0,0,0,25.48,8.15ZM18.14,28.33a11.75,11.75,0,0,1-6.23-1c.3-6.23.9-10.43,2.87-13.4a37,37,0,0,1,3.89,10.92C18.46,26.16,18.29,27.32,18.14,28.33Zm26.51-3.22c-.87,3.52-1.11,9.28-.7,17.09-.06,3.23.1,8.39.48,15.76a47.51,47.51,0,0,1-24.77-.22c.93-17.18.93-28.28,0-33h0a37.57,37.57,0,0,0-4.24-11.67c.11-.14.23-.27.35-.41.8-.74,2.79-1.58,5.84-2.46a17.54,17.54,0,0,0,2.11-.92c1.05,4.24,1.82,4.87,2.5,4.9a8,8,0,0,0,2.91-2.57l.41,0a15.23,15.23,0,0,0,.72,1.65v8.5a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5V13.49c.28-.43.56-.9.84-1.42,1.59,1.19,2.65,1.95,3.25,2.32a.48.48,0,0,0,.39,0,.49.49,0,0,0,.31-.24A12.9,12.9,0,0,0,39.7,9a34.25,34.25,0,0,0,6.24,2.38,10.11,10.11,0,0,1,2,1.23C46.7,14.54,45.63,18.64,44.65,25.11ZM52,27.44a16.13,16.13,0,0,1-6.11,1c-.17-1.25-.26-2.29-.29-3.16.92-6.1,2-10.11,3-11.95a9.11,9.11,0,0,1,2.49,5.53h0a1.52,1.52,0,0,0,.09.49C52,23.42,52.24,26.15,52,27.44Z"/></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Phones & Telecommunications",
            "slug"              =>  Str::slug( 'Phones and Telecommunications', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,20.75a.75.75,0,1,0,.75.75.749.749,0,0,0-.75-.75Z"/><rect class="a" x="5.5" y="0.5" width="13" height="23" rx="2" ry="2"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Computer, Office & Security",
            "slug"              =>  Str::slug( 'Computer, Office and Security', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Consumer Electronics",
            "slug"              =>  Str::slug( 'Consumer Electronics', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g id="Layer_10" data-name="Layer 10"><path d="M56,18H17V8a2,2,0,0,1,2-2H44a2,2,0,0,1,2,2v6a2,2,0,0,0,4,0V8a6,6,0,0,0-6-6H19a6,6,0,0,0-6,6V18H8a6,6,0,0,0-6,6V42a6,6,0,0,0,6,6h5v7a6,6,0,0,0,6,6H45a6,6,0,0,0,6-6V48h5a6,6,0,0,0,6-6V24A6,6,0,0,0,56,18ZM52,32a4,4,0,1,1,4-4A4,4,0,0,1,52,32ZM47,55a2,2,0,0,1-2,2H19a2,2,0,0,1-2-2V44a2,2,0,0,1,2-2H45a2,2,0,0,1,2,2V55Z"/></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Jewelry & Watches",
            "slug"              =>  Str::slug( 'Jewelry and Watches', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Home, Pet & Appliances",
            "slug"              =>  Str::slug( 'Home Pet and Appliances', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Bags & Shoes",
            "slug"              =>  Str::slug( 'Bags and Shoes', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Toys, Kids & Babies",
            "slug"              =>  Str::slug( 'Toys Kids and Babies', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Outdoor Fun & Sports",
            "slug"              =>  Str::slug( 'Outdoor Fun and Sports', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Beauty, Health & Hair",
            "slug"              =>  Str::slug( 'Beauty, Health and Hair', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Automobiles & Motorcycles",
            "slug"              =>  Str::slug( 'Automobiles and Motorcycles', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert([
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Home Improvement & Tools",
            "slug"              =>  Str::slug( 'Home Improvement and Tools', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "web_icon"          =>  '<svg class="h-5 w-5" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
    }
}
