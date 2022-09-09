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

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/women_fashion.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="5"  stroke-linecap="round"  stroke-linejoin="round" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M60,10c0,5.521-4.479,10-10,10c-5.524,0-10-4.479-10-10H23.333l8.998,30h35.332l9.004-30H60z"/><polygon points="67.858,46.667 32.142,46.667 16.667,90 35,90 38.333,60 45,60 41.667,90 58.333,90 55,60 61.667,60 65,90   83.333,90 "/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Men's Fashion",
            "slug"              =>  Str::slug( 'Mens Fashion', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/men_fashion.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="5"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve"><rect x="-437.4" y="-2336.5" class="st0" width="677.6" height="5020.2"/><g><g><path d="M83.8,41.9c-0.4,0-0.7-0.1-1-0.4L73,33.1c-0.3-0.3-0.5-0.7-0.5-1.2c0-0.5,0.3-0.9,0.6-1.2l17.4-12.5    c0.7-0.5,1.6-0.3,2.1,0.3l4.9,6.4c0.4,0.6,0.4,1.4,0,1.9L84.9,41.4c-0.3,0.3-0.6,0.5-1,0.5C83.9,41.9,83.8,41.9,83.8,41.9z     M76.4,32l7.2,6.2l10.8-12.5l-3.3-4.2L76.4,32z"/><path d="M64.2,41.9c0,0-0.1,0-0.1,0c-0.4,0-0.8-0.2-1-0.5L50.5,26.8c-0.5-0.5-0.5-1.3,0-1.9l4.9-6.4c0.5-0.6,1.4-0.8,2.1-0.3    l17.4,12.5c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.9-0.5,1.2l-9.8,8.5C64.9,41.8,64.6,41.9,64.2,41.9z M53.6,25.8l10.8,12.5l7.2-6.2    L56.9,21.5L53.6,25.8z"/><path d="M91.4,21H56.6c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5h34.8c0.8,0,1.5,0.7,1.5,1.5S92.2,21,91.4,21z"/><path d="M110.5,122.8c-0.6,0-1.2-0.4-1.4-1c-0.3-0.8,0.1-1.6,0.9-1.9l16.7-6.5l-0.7-66.8c-0.1-6.4-4.2-11.8-10.3-13.6l-19.7-5.7    c-0.8-0.2-1.3-1.1-1-1.9c0.2-0.8,1.1-1.3,1.9-1l19.7,5.7c7.4,2.1,12.4,8.8,12.5,16.5l0.8,67.8c0,0.6-0.4,1.2-1,1.4l-17.6,6.9    C110.9,122.8,110.7,122.8,110.5,122.8z"/><path d="M110.2,133.2c-0.6,0-1.2-0.4-1.4-1c-0.3-0.8,0.1-1.6,0.8-1.9l13.9-5.4v-9.2c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v10.2    c0,0.6-0.4,1.2-1,1.4l-14.8,5.8C110.6,133.2,110.4,133.2,110.2,133.2z"/><path d="M79,144.5c-0.3,0-0.5-0.1-0.8-0.2c-0.4-0.2-0.6-0.6-0.7-1L72.5,117c0-0.1,0-0.2,0-0.3V32.9c0-0.8,0.7-1.5,1.5-1.5    s1.5,0.7,1.5,1.5v83.7l4.6,24.5l28.6-8.2V54c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5V134c0,0.7-0.4,1.3-1.1,1.4l-31.2,9    C79.2,144.5,79.1,144.5,79,144.5z"/><path d="M37.6,122.8c-0.2,0-0.4,0-0.5-0.1l-17.6-6.9c-0.6-0.2-1-0.8-1-1.4l0.8-67.8c0.1-7.7,5.1-14.3,12.5-16.5l19.7-5.7    c0.8-0.2,1.6,0.2,1.9,1c0.2,0.8-0.2,1.6-1,1.9L32.5,33c-6.1,1.8-10.3,7.3-10.3,13.6l-0.7,66.8l16.7,6.5c0.8,0.3,1.2,1.2,0.9,1.9    C38.8,122.4,38.2,122.8,37.6,122.8z"/><path d="M37.9,133.2c-0.2,0-0.4,0-0.5-0.1l-14.8-5.8c-0.6-0.2-1-0.8-1-1.4v-10.2c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v9.2    l13.9,5.4c0.8,0.3,1.2,1.2,0.8,1.9C39.1,132.8,38.5,133.2,37.9,133.2z"/><path d="M69.2,144.5c-0.1,0-0.3,0-0.4-0.1l-31.2-9c-0.6-0.2-1.1-0.8-1.1-1.4V54c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v78.8    l28.6,8.2l4.6-24.5V32.9c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v83.8c0,0.1,0,0.2,0,0.3l-4.9,26.3c-0.1,0.4-0.3,0.8-0.7,1    C69.7,144.4,69.5,144.5,69.2,144.5z"/><path d="M59.2,76.2h-9c-3.4,0-6.1-2.7-6.1-6.1V59.5c0-3.4,2.7-6.1,6.1-6.1h9c3.4,0,6.1,2.7,6.1,6.1v10.6    C65.3,73.5,62.5,76.2,59.2,76.2z M50.2,56.4c-1.7,0-3.1,1.4-3.1,3.1v10.6c0,1.7,1.4,3.1,3.1,3.1h9c1.7,0,3.1-1.4,3.1-3.1V59.5    c0-1.7-1.4-3.1-3.1-3.1H50.2z"/><path d="M53,66.4c-3,0-8.2-0.5-8.9-4.2c-0.2-0.8,0.4-1.6,1.2-1.8c0.8-0.2,1.6,0.4,1.8,1.2c0.3,1.5,4.6,1.9,7.5,1.7    c0.1,0,0.1,0,0.2,0c2.4,0.1,6.4-0.2,7.4-1.2c0.1-0.1,0.1-0.1,0.1-0.1c0-0.8,0.6-1.5,1.5-1.5c0,0,0,0,0,0c0.8,0,1.5,0.6,1.5,1.5    c0,0.9-0.3,1.7-1,2.4c-2.2,2.2-8.2,2.2-9.6,2.1C54.4,66.3,53.7,66.4,53,66.4z"/><path d="M82.8,54.7c-0.2,0-0.4,0-0.6-0.1c-0.2-0.1-0.3-0.2-0.5-0.3c-0.3-0.3-0.4-0.7-0.4-1.1c0-0.4,0.2-0.8,0.4-1.1    c0.1-0.1,0.2-0.1,0.2-0.2c0.1-0.1,0.2-0.1,0.3-0.1c0.1,0,0.2-0.1,0.3-0.1c0.2,0,0.4,0,0.6,0c0.1,0,0.2,0,0.3,0.1    c0.1,0,0.2,0.1,0.3,0.1c0.1,0.1,0.2,0.1,0.2,0.2c0.3,0.3,0.4,0.7,0.4,1.1c0,0.4-0.2,0.8-0.4,1.1c-0.1,0.1-0.3,0.3-0.5,0.3    C83.2,54.6,83,54.7,82.8,54.7z"/><path d="M82.8,69.7c-0.2,0-0.4,0-0.6-0.1c-0.2-0.1-0.3-0.2-0.5-0.3c-0.3-0.3-0.4-0.7-0.4-1.1c0-0.1,0-0.2,0-0.3    c0-0.1,0-0.2,0.1-0.3s0.1-0.2,0.1-0.3c0-0.1,0.1-0.2,0.2-0.2c0.1-0.1,0.2-0.1,0.2-0.2c0.1-0.1,0.2-0.1,0.3-0.1    c0.1,0,0.2-0.1,0.3-0.1c0.2,0,0.4,0,0.6,0c0.1,0,0.2,0,0.3,0.1c0.1,0,0.2,0.1,0.3,0.1c0.1,0.1,0.2,0.1,0.2,0.2    c0.3,0.3,0.4,0.7,0.4,1.1c0,0.4-0.2,0.8-0.4,1.1c-0.1,0.1-0.3,0.3-0.5,0.3C83.2,69.6,83,69.7,82.8,69.7z"/><path d="M82.8,84.8c-0.2,0-0.4,0-0.6-0.1c-0.2-0.1-0.3-0.2-0.5-0.3c-0.3-0.3-0.4-0.7-0.4-1.1c0-0.1,0-0.2,0-0.3    c0-0.1,0-0.2,0.1-0.3s0.1-0.2,0.1-0.3c0-0.1,0.1-0.2,0.2-0.2c0.1-0.1,0.2-0.1,0.2-0.2c0.1,0,0.2-0.1,0.3-0.1    c0.1,0,0.2-0.1,0.3-0.1c0.2,0,0.4,0,0.6,0c0.1,0,0.2,0,0.3,0.1c0.1,0,0.2,0.1,0.3,0.1c0.1,0.1,0.2,0.1,0.2,0.2    c0.3,0.3,0.4,0.7,0.4,1.1c0,0.4-0.2,0.8-0.4,1.1c-0.1,0.1-0.3,0.3-0.5,0.3C83.2,84.8,83,84.8,82.8,84.8z"/><path d="M82.8,99.6c-0.2,0-0.4,0-0.6-0.1c-0.2-0.1-0.3-0.2-0.5-0.3c-0.1-0.1-0.3-0.3-0.3-0.5c-0.1-0.2-0.1-0.4-0.1-0.6    c0-0.4,0.2-0.8,0.4-1.1c0.4-0.4,0.9-0.5,1.4-0.4c0.1,0,0.2,0,0.3,0.1c0.1,0,0.2,0.1,0.3,0.1c0.1,0.1,0.2,0.1,0.2,0.2    c0.3,0.3,0.4,0.7,0.4,1.1c0,0.2,0,0.4-0.1,0.6c-0.1,0.2-0.2,0.3-0.3,0.5c-0.1,0.1-0.3,0.3-0.5,0.3C83.2,99.6,83,99.6,82.8,99.6z"/><path d="M82.8,114.8c-0.2,0-0.4,0-0.6-0.1c-0.2-0.1-0.3-0.2-0.5-0.3c-0.3-0.3-0.4-0.7-0.4-1.1c0-0.1,0-0.2,0-0.3    c0-0.1,0-0.2,0.1-0.3c0-0.1,0.1-0.2,0.1-0.3c0-0.1,0.1-0.1,0.2-0.2c0.1-0.1,0.2-0.1,0.2-0.2c0.1,0,0.2-0.1,0.3-0.1    s0.2-0.1,0.3-0.1c0.2,0,0.4,0,0.6,0c0.1,0,0.2,0,0.3,0.1s0.2,0.1,0.3,0.1c0.1,0.1,0.2,0.1,0.2,0.2c0.1,0.1,0.1,0.1,0.2,0.2    c0.1,0.1,0.1,0.2,0.1,0.3c0,0.1,0.1,0.2,0.1,0.3c0,0.1,0,0.2,0,0.3c0,0.4-0.2,0.8-0.4,1.1c-0.1,0.1-0.3,0.3-0.5,0.3    C83.2,114.7,83,114.8,82.8,114.8z"/></g></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Phones & Telecommunications",
            "slug"              =>  Str::slug( 'Phones and Telecommunications', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/phones_more.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="20"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="365.449px" height="365.449px" viewBox="0 0 365.449 365.449" style="enable-background:new 0 0 365.449 365.449;" xml:space="preserve"><g><path d="M281.507,10.85C274.279,3.614,265.71,0,255.813,0H109.637c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.229-10.85,15.796-10.85,25.693v292.361c0,9.896,3.617,18.462,10.85,25.693c7.233,7.234,15.797,10.852,25.697,10.852   h146.176c9.896,0,18.466-3.621,25.693-10.852c7.234-7.231,10.852-15.797,10.852-25.693V36.543   C292.358,26.646,288.745,18.083,281.507,10.85z M159.885,36.543h45.685c3.046,0,4.565,1.523,4.565,4.569   c0,3.045-1.52,4.57-4.565,4.57h-45.685c-3.045,0-4.568-1.525-4.568-4.57C155.316,38.066,156.839,36.543,159.885,36.543z    M198.861,345.036c-4.476,4.469-9.852,6.707-16.135,6.707c-6.28,0-11.656-2.238-16.13-6.707c-4.474-4.477-6.711-9.856-6.711-16.132   c0-6.283,2.24-11.66,6.711-16.133c4.471-4.469,9.851-6.714,16.13-6.714c6.284,0,11.66,2.245,16.135,6.714   c4.473,4.473,6.708,9.85,6.708,16.133S203.331,340.56,198.861,345.036z M264.954,283.225c0,2.471-0.903,4.62-2.714,6.424   c-1.813,1.807-3.949,2.707-6.42,2.707H109.637c-2.474,0-4.615-0.903-6.423-2.707s-2.712-3.953-2.712-6.424V82.229   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.805,3.949-2.714,6.423-2.714h146.176c2.478,0,4.616,0.905,6.427,2.714   c1.811,1.807,2.71,3.949,2.71,6.423v200.995H264.954z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Computer, Office & Security",
            "slug"              =>  Str::slug( 'Computer, Office and Security', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/computer_office_security.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><path class="st2" d="M3,6v15c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V6c0-1.1-0.9-2-2-2H5C3.9,4,3,4.9,3,6z"/><line class="st2" x1="3" y1="19" x2="29" y2="19"/><line class="st2" x1="9" y1="29" x2="23" y2="29"/><path class="st2" d="M13,23c0,2.1-0.7,4.6-1.8,6"/><path class="st2" d="M20.8,29c-1.1-1.4-1.8-3.9-1.8-6"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Consumer Electronics",
            "slug"              =>  Str::slug( 'Consumer Electronics', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/consumer_electronics.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="4"  stroke-linecap="round"  stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path d="M56,18H17V8a2,2,0,0,1,2-2H44a2,2,0,0,1,2,2v6a2,2,0,0,0,4,0V8a6,6,0,0,0-6-6H19a6,6,0,0,0-6,6V18H8a6,6,0,0,0-6,6V42a6,6,0,0,0,6,6h5v7a6,6,0,0,0,6,6H45a6,6,0,0,0,6-6V48h5a6,6,0,0,0,6-6V24A6,6,0,0,0,56,18ZM52,32a4,4,0,1,1,4-4A4,4,0,0,1,52,32ZM47,55a2,2,0,0,1-2,2H19a2,2,0,0,1-2-2V44a2,2,0,0,1,2-2H45a2,2,0,0,1,2,2V55Z"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Jewelry & Watches",
            "slug"              =>  Str::slug( 'Jewelry and Watches', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/jewelry_watches.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="16"  stroke-linecap="round"  stroke-linejoin="round" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M464,224h-16c-8.812,0-16,7.156-16,16h-17.375c-3.312-39.094-17.625-75.031-40.812-103.938    C368.625,101.063,362,66.219,352,32L320,0v89.906C291.75,73.531,259,64,224,64s-67.719,9.531-96,25.906V0L96,32    c-9.938,34.219-16.563,69.031-21.75,104.031C47.875,168.906,32,210.563,32,256c0,45.438,15.875,87.094,42.25,119.969    c5.188,35,11.813,69.813,21.75,104.031l32,32v-89.906C156.281,438.469,189,448,224,448s67.75-9.531,96-25.906V512l32-32    c10-34.219,16.625-69.062,21.812-104.031C397,347.031,411.312,311.094,414.625,272H432c0,8.844,7.188,16,16,16h16    c8.875,0,16-7.156,16-16v-32C480,231.156,472.875,224,464,224z M224,416c-88.188,0-160-71.781-160-160S135.813,96,224,96    c88.25,0,160,71.781,160,160S312.25,416,224,416z"/><path d="M224,112c-79.5,0-144,64.469-144,144s64.5,144,144,144c79.562,0,144-64.469,144-144S303.562,112,224,112z M294.75,362.531    L286.938,349l-13.875,8l7.625,13.188c-14.875,7.406-31.25,11.906-48.688,13V368h-16v15.188c-17.438-1.094-33.813-5.594-48.688-13    L174.938,357l-13.875-8l-7.813,13.531c-14.156-9.438-26.313-21.594-35.75-35.781l13.5-7.812l-8-13.875l-13.188,7.625    c-7.375-14.875-11.875-31.25-13-48.688H112v-16H96.813c1.125-17.438,5.625-33.813,13.031-48.688l13.188,7.625L131,193.063    l-13.5-7.813c9.438-14.156,21.625-26.344,35.781-35.781L161.094,163l13.844-8l-7.625-13.188c14.875-7.406,31.25-11.906,48.688-13    V144h16v-15.188c17.438,1.094,33.813,5.594,48.688,13L273.062,155l13.875,8l7.813-13.531    c14.188,9.469,26.375,21.625,35.813,35.781L317,193.063l8,13.875l13.188-7.625c7.438,14.875,11.938,31.25,13,48.688H336v16h15.188    c-1.062,17.438-5.562,33.813-13,48.688L325,305.062l-8,13.875l13.562,7.813C321.125,340.938,308.938,353.094,294.75,362.531z"/><path d="M320,248h-82.438c-2.125-3.563-5.438-6.125-9.563-7.188V160h-8v80.813c-4.063,1.063-7.438,3.625-9.531,7.188H192v16    h18.469c2.094,3.563,5.469,6.125,9.531,7.188V288h8v-16.812c4.125-1.063,7.438-3.625,9.563-7.188H320V248z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Home, Pet & Appliances",
            "slug"              =>  Str::slug( 'Home Pet and Appliances', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/home_pets.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g id="Layer_54" data-name="Layer 54"><path d="M45.92,36.89l-.32-1.71.7-.2.42-.18.41-.28.08-.08,0-.06.16-.37V33.9a.08.08,0,0,0,0-.07l-.16-1.25.14-1.29v-.07l0-.11s0-.05,0-.07l-2.71-3.85L44.37,27l-.62-.2-1.18-.15-.11-.42a0,0,0,0,1,0,0l-.13-.47h0l-.41-1.14.21-.09.58-.41.5-.54.38-.62.32-.82.15-.78,0-.8L44,19.73,43.73,19l-2.11-8.83-.14-.89-.23-.85-.31-.82-.4-.77-.48-.71-.55-.64-.64-.59-.67-.48-.72-.4-.73-.29-.09,0-10.23.16-.1,0-.74.33-.71.43-.65.5-.59.59-.54.69-.46.72L22.27,8,22,8.8l-.2.86-.11.84-1.85,8.9-.21.75-.09.8,0,.8.18.77.31.72.42.63.59.59.6.38.25.09-.34,1v.08h0l-.11.49v0l-.07.38-.84.09-.76.14-.55.17-.23.13-.06,0-3.36,3.69-.15.22,0,.1a.19.19,0,0,0,0,.07l0,.11v.08l.2,1.24-.13,1.29a.09.09,0,0,0,0,.07l.07.31a.14.14,0,0,0,0,.07l.05.09,0,.07.31.26.06,0,.38.17.68.2.56.1L14.78,60a.3.3,0,0,0,.06.2.27.27,0,0,0,.19.08h0l1.81,0h.06a.22.22,0,0,0,.11-.05h0a.35.35,0,0,0,0-.08.19.19,0,0,0,0-.07l2.26-16.73.45-3.71.12-1,.2-.89.23-.67.58-1h.49l1.52,0,1.81,5.24.24.39.32.36.38.33.44.28.5.24.53.2.57.15.58.11.61,0,.56,0,5.73-.09.56,0,.6-.08.59-.13.55-.17.53-.22.48-.26.43-.3.37-.34.3-.38.2-.41,1.52-5.24,1,0h.3l.37.75.2.49h0l.23.75.83,5.34,2.67,16.65a.19.19,0,0,0,0,.07.16.16,0,0,0,.06.08l.1,0h.07l1.8,0a.26.26,0,0,0,.19-.08.25.25,0,0,0,.06-.2Zm-24-12.5-.51-.32-.48-.48-.4-.59-.28-.63-.16-.69L20,21l.08-.71.21-.73,1.85-8.93.11-.84.19-.81.26-.78.35-.73.44-.7L24,6.11l.55-.54.6-.47.66-.39.67-.3,10.13-.16.65.26.67.37.64.47.57.53.51.59.45.67.37.72.3.76.21.81.14.88,2.12,8.87.22.66.1.71v.72l-.14.69-.25.67-.37.61-.43.47-.49.34-.38.15h0l-.17.07h0l-.57.08h-.93l-15.9.25h0l-.89,0-.55-.06h0l-.1,0h0Zm2.21.73,15.55-.24.6,1.72-16.71.26ZM23,26.87l-1,0,.58-1.82.43.05h.58Zm17.16-2h.61l.4-.06.64,1.81-.8,0h-.24ZM16.61,59.73l-1.3,0L17.84,37.4l.26-1.63,1.27.12ZM20,36.46l-.39,1,.24-1.54h.46Zm19.32,4.21-.16.32-.25.32-.31.29-.38.27-.43.23-.48.2-.52.16-.54.12-.56.07-6.25.12h-.53l-.57-.06-.54-.1-.53-.14-.49-.18-.44-.22L26,41.82l-.33-.28-.27-.3-.18-.31-1.75-5h1l1.71,5,.16.27.22.25.26.22.3.19.35.17.37.14.41.11.42.07.43.05h.43l5.67-.09.44,0,.43-.06.42-.09.4-.12.37-.15.34-.19.29-.21.25-.23.2-.27.14-.28,1.43-5h1Zm-1.43-1-.1.2-.14.2-.2.19-.24.18L37,40.6l-.32.14-.35.11-.37.09-.39.05-6,.11-.79-.05L28.35,41l-.35-.1-.33-.13-.29-.14-.25-.17-.21-.18-.16-.18-.11-.2-1.3-4L39,35.65Zm0,.84-.22.34-.2.19-.25.17-.28.16-.33.13-.35.11-.78.14-6.05.11-.8,0-.38-.07-.36-.1-.33-.12-.3-.14-.25-.16L26.85,41l-.16-.18-.12-.19,0-.08.28.24.3.21.34.17.38.14.4.12.41.08.44,0h.43l5.61-.09.43,0,.44-.06.41-.1.4-.12.36-.16.34-.19.29-.22Zm5.21-5,.19,0,.14.68Zm.36-.54-.76.06h0l-1.6.06h0l-1.48,0h-.34L25,35.37h-.43l-1.48,0h0l-1.7,0h-.62l-1.09,0h0l-1.1-.07-.64-.08h0l-.77-.14-.5-.13-.45-.2-.23-.2-.06-.24.13-1.29a.06.06,0,0,0,0-.06l-.2-1.25,3.39-3.8.39-.2.6-.14,1.34-.16h.09l1.55-.07h0l17.28-.27H41l1.14,0h.15l1,.1.56.11.32.14L46.77,31l.12.24v0l-.14,1.31.17,1.3-.07.18-.27.24-.46.21-.53.16-1.47.26-.61.06Zm3.87,24.27L44.1,36.92l-.26-1.46L45,35.3l.1,0,3.57,24Z"/></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Bags & Shoes",
            "slug"              =>  Str::slug( 'Bags and Shoes', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/bags_shoes.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="6"  stroke-linecap="round"  stroke-linejoin="round" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path class="cls-1" d="M125.98719,109.786q-3.17782-21.12253-4.23376-42.245-.20857-4.17586-.331-8.3517-.32276-10.57118-.10593-21.14237a7.39725,7.39725,0,0,0-7.40165-7.544H96.99847a6.12261,6.12261,0,0,0-2.416-3.09307A26.24,26.24,0,0,0,68.6786,5.142H59.3214A26.24,26.24,0,0,0,33.41752,27.40982a6.12261,6.12261,0,0,0-2.416,3.09307H14.0852a7.39723,7.39723,0,0,0-7.40165,7.544q.21351,10.57121-.10593,21.14237-.11916,4.17586-.331,8.3517Q5.194,88.66345,2.01281,109.786A11.35473,11.35473,0,0,0,13.22453,122.858H114.77547A11.35472,11.35472,0,0,0,125.98719,109.786ZM40.72792,27.87672A18.94467,18.94467,0,0,1,59.3214,12.42445H68.6786A18.94467,18.94467,0,0,1,87.27208,27.87672a6.12215,6.12215,0,0,0-1.7983,2.62617H42.52622A6.12215,6.12215,0,0,0,40.72792,27.87672ZM14.80682,38.61293H36.746l.01719.00087.01719-.00087H91.21959l.01719.00087.01719-.00087h21.9392q-.07446,3.92756-.07282,7.86838,0,8.33681.32771,16.70338L74.744,82.57813V76.66837a1.59368,1.59368,0,0,0-1.59368-1.59368H54.84973A1.59368,1.59368,0,0,0,53.256,76.66837v5.91141l-.001-.00051L14.55193,63.18469Q15.03358,50.87068,14.80682,38.61293ZM117.2151,113.62914a3.18682,3.18682,0,0,1-2.43963,1.11886H13.22453a3.18685,3.18685,0,0,1-2.43963-1.11886,3.23984,3.23984,0,0,1-.75141-2.63494c1.97288-13.09854,3.34663-26.2997,4.1146-39.49424L53.255,91.09647l.001.00051V93.0408A10.74394,10.74394,0,0,0,64,103.78473h0A10.74393,10.74393,0,0,0,74.744,93.0408V91.09532L113.85193,71.5c.768,13.19453,2.1417,26.39569,4.1146,39.49424A3.23991,3.23991,0,0,1,117.2151,113.62914Z"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Toys, Kids & Babies",
            "slug"              =>  Str::slug( 'Toys Kids and Babies', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/toys_kids_babies.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><circle class="st0" cx="9" cy="25" r="4"/><circle class="st0" cx="22" cy="25" r="4"/><line class="st0" x1="7" y1="3" x2="7" y2="10"/><path class="st0" d="M13,11v0.3c0,2.6,2.1,4.7,4.7,4.7H21"/><line class="st0" x1="6" y1="14" x2="10" y2="14"/><line class="st0" x1="6" y1="17" x2="7" y2="17"/><path class="st0" d="M26,25h3v-1c0-4.4-3.6-8-8-8h0l0,0c-2.5-3.7-6.7-6-11.2-6H6c-1.7,0-3,1.3-3,3v9c0,1.3,0.8,2.4,2,2.8"/><polyline class="st0" points="13,25 16,25 18,25 "/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Outdoor Fun & Sports",
            "slug"              =>  Str::slug( 'Outdoor Fun and Sports', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/outdoor_fun_sports.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><circle class="st0" cx="16" cy="16" r="13"/><polygon class="st0" points="16,11 10,15.2 12.3,22 19.7,22 22,15.2 "/><polyline class="st0" points="22,15 26,13 27,9.1 "/><polyline class="st0" points="12,4 16,6 16,11 "/><line class="st0" x1="20" y1="4" x2="16" y2="6"/><line class="st0" x1="26" y1="13" x2="28.9" y2="14.8"/><polyline class="st0" points="9.9,15 5.9,13 4.9,9.2 "/><line class="st0" x1="5.9" y1="13" x2="3.1" y2="14.7"/><polyline class="st0" points="5.3,23.4 10,24 12,22 "/><line class="st0" x1="12" y1="28" x2="10" y2="24"/><polyline class="st0" points="26.6,23.5 22,24 20,22 "/><line class="st0" x1="20" y1="28" x2="22" y2="24"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Beauty, Health & Hair",
            "slug"              =>  Str::slug( 'Beauty, Health and Hair', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/beauty_health_hair.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><circle class="st0" cx="17" cy="8" r="7"/><path class="st0" d="M22.5,12.4c0.6,1.5,1.3,2.9,2.2,4.3l1.2,1.9c1.4,2.2,2.1,4.8,2.1,7.4v0l-7.7,3.6C17,31.1,13.1,30.9,10,29l0,0  l-1,2"/><path class="st0" d="M11,19L11,19l2.4,0c2.3,0,4.4,1.1,5.6,3l0,0h1l0,0c-0.7-2-1-2-1-6"/><circle class="st0" cx="17" cy="8" r="2"/><line class="st0" x1="14.2" y1="5.2" x2="15.6" y2="6.6"/><line class="st0" x1="14.2" y1="10.8" x2="15.6" y2="9.4"/><line class="st0" x1="19.8" y1="10.8" x2="18.4" y2="9.4"/><line class="st0" x1="19.8" y1="5.2" x2="18.4" y2="6.6"/><path class="st0" d="M4,14c1.9,0,3.6,0.8,4.9,2c1.3,1.3,2.1,3,2.1,5"/></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Automobiles & Motorcycles",
            "slug"              =>  Str::slug( 'Automobiles and Motorcycles', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/automobiles_motorcycles.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="8"  stroke-linecap="round"  stroke-linejoin="round" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 129.879 129.863" style="enable-background:new 0 0 129.879 129.863;" xml:space="preserve"><g><g><path d="M128.218,79.676c0.989-4.259,1.558-8.677,1.661-13.212l-2.721,0v-3.678h2.707c-0.148-4.524-0.754-8.932-1.782-13.177    l-2.569,0.688l-0.95-3.551l2.563-0.687c-1.301-4.287-3.025-8.388-5.137-12.249l-2.246,1.297l-1.84-3.184l2.224-1.284    c-2.348-3.77-5.074-7.278-8.12-10.481l-1.772,1.771l-2.601-2.599l1.765-1.764c-3.218-3.023-6.738-5.727-10.519-8.049l-1.238,2.143    l-3.185-1.837l1.235-2.141c-3.861-2.079-7.962-3.768-12.241-5.039L82.82,5.001l-3.555-0.951l0.631-2.349    C75.668,0.707,71.282,0.124,66.778,0v2.406h-3.678V0c-4.503,0.124-8.889,0.707-13.118,1.703l0.631,2.347l-3.555,0.953L46.43,2.644    c-4.282,1.271-8.381,2.96-12.24,5.039l1.232,2.139l-3.185,1.839l-1.236-2.143c-3.783,2.321-7.301,5.026-10.519,8.049l1.762,1.761    l-2.6,2.601l-1.769-1.771c-3.049,3.202-5.774,6.711-8.123,10.48l2.224,1.283l-1.84,3.185l-2.247-1.297    c-2.108,3.861-3.835,7.962-5.133,12.248l2.559,0.686l-0.95,3.553l-2.569-0.688c-1.028,4.246-1.634,8.653-1.78,13.177h2.703v3.678    H0c0.104,4.535,0.675,8.953,1.663,13.213l2.702-0.724l0.95,3.552l-2.723,0.729c1.267,4.319,2.959,8.454,5.048,12.349l2.495-1.441    l1.84,3.186l-2.511,1.449c2.335,3.819,5.061,7.368,8.108,10.614l2.069-2.069l2.602,2.601l-2.078,2.076    c3.23,3.073,6.769,5.82,10.574,8.181l1.497-2.589l3.185,1.839l-1.506,2.609c3.893,2.12,8.033,3.842,12.358,5.137l0.784-2.926    l3.555,0.951l-0.786,2.924c4.278,1.019,8.716,1.612,13.273,1.739v-3.018h3.678v3.018c4.56-0.127,8.996-0.72,13.273-1.739    l-0.783-2.924l3.552-0.952l0.785,2.927c4.324-1.295,8.464-3.017,12.357-5.137l-1.506-2.61l3.185-1.838l1.497,2.59    c3.807-2.361,7.343-5.108,10.573-8.182l-2.075-2.077l2.6-2.6l2.07,2.069c3.048-3.246,5.772-6.795,8.108-10.614l-2.511-1.449    l1.84-3.185l2.497,1.441c2.089-3.895,3.782-8.03,5.045-12.349l-2.722-0.73l0.95-3.552L128.218,79.676z M64.939,100.486    c-19.636,0-35.555-15.918-35.555-35.554c0-19.636,15.919-35.554,35.555-35.554c19.638,0,35.555,15.918,35.555,35.554    C100.494,84.568,84.577,100.486,64.939,100.486z"/></g><g><path d="M64.939,35.507c-16.251,0-29.425,13.174-29.425,29.424c0,16.25,13.174,29.424,29.425,29.424    c16.251,0,29.424-13.174,29.424-29.424C94.363,48.681,81.19,35.507,64.939,35.507z M50.32,77.619    c-1.758,1.015-4.006,0.413-5.022-1.346c-1.017-1.76-0.412-4.01,1.345-5.024c1.759-1.016,4.01-0.414,5.024,1.345    C52.683,74.354,52.08,76.604,50.32,77.619z M51.667,57.27c-1.015,1.759-3.266,2.361-5.024,1.346    c-1.757-1.016-2.361-3.265-1.345-5.024c1.017-1.759,3.265-2.362,5.022-1.347C52.08,53.26,52.683,55.51,51.667,57.27z     M64.939,87.612c-2.032,0-3.678-1.647-3.678-3.678c0-2.03,1.646-3.678,3.678-3.678c2.032,0,3.678,1.647,3.678,3.678    C68.617,85.965,66.972,87.612,64.939,87.612z M64.939,49.606c-2.032,0-3.678-1.647-3.678-3.678c0-2.031,1.646-3.678,3.678-3.678    c2.032,0,3.678,1.647,3.678,3.678C68.617,47.959,66.972,49.606,64.939,49.606z M84.581,76.272    c-1.015,1.759-3.266,2.362-5.024,1.346c-1.758-1.015-2.361-3.265-1.347-5.024c1.017-1.759,3.267-2.361,5.024-1.346    C84.994,72.264,85.598,74.513,84.581,76.272z M83.235,58.615c-1.758,1.015-4.008,0.413-5.024-1.345    c-1.015-1.76-0.411-4.009,1.347-5.025c1.758-1.015,4.009-0.413,5.024,1.347C85.598,55.35,84.994,57.6,83.235,58.615z"/></g></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
        DB::table( 'groups' ) -> insert(
        [
            "resource_id"       =>  hexdec( uniqid() ),
            "name"              =>  "Home Improvement & Tools",
            "slug"              =>  Str::slug( 'Home Improvement and Tools', '-' ),
            "description"       =>  "This is youtube channel which helps new web developer learn and upgrade their skills",

            "image_icon"        =>  'https://juasoonline.nyc3.digitaloceanspaces.com/assets/images/icons/categories/home_improvement_tools.png',
            "web_icon"          =>  '<svg class="h-5 w-5 mx-auto" fill="none"  stroke="currentColor"  stroke-width="4"  stroke-linecap="round"  stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.42 39.7"><g id="Layer_2" data-name="Layer 2"><g id="Layer_2-2" data-name="Layer 2"><rect class="cls-1" x="1" y="18.03" width="44.42" height="10.27"/><rect class="cls-1" x="1" y="28.3" width="44.42" height="10.4"/><line class="cls-1" x1="1.42" y1="23.07" x2="4.42" y2="23.07"/><line class="cls-1" x1="1.42" y1="33.07" x2="4.42" y2="33.07"/><line class="cls-1" x1="45.42" y1="23.07" x2="42.42" y2="23.07"/><line class="cls-1" x1="45.42" y1="33.07" x2="42.42" y2="33.07"/><path class="cls-1" d="M6.1,14.45C5.74,8.49,7,1.55,9.89,1S16.29,6.37,18,12.08"/><path class="cls-1" d="M4,18c-.18-1.14-.32-2.38-.42-3.75,0,0,4.88.08,7.55,3.64"/><path class="cls-1" d="M11.12,17.93s4.45-4.87,8.53-6.82a30.7,30.7,0,0,1,1.47,5.72"/><path class="cls-1" d="M40.07,18a10.74,10.74,0,0,0,1.36-1.32c3.75-4.35-.16-6.91-.16-6.91s-2.56-3.91-6.92-.16c-1.94,1.66-4,5.09-5.67,8.38"/><line class="cls-1" x1="32.31" y1="13.15" x2="33.72" y2="14.56"/><path class="cls-1" d="M44.94,10l-2.78-.13a.83.83,0,0,1-.78-.93l.47-3.86"/><path class="cls-1" d="M35.94,8.55a4.82,4.82,0,0,0-4-2.2,4.88,4.88,0,0,0-1.27.19,1.37,1.37,0,0,0,0-.19,4.81,4.81,0,1,0-9.61,0c0,.06,0,.12,0,.19a4.67,4.67,0,0,0-4.41,1"/><line class="cls-1" x1="25.42" y1="18.07" x2="25.42" y2="10.07"/><polyline class="cls-1" points="22.09 12.07 25.42 15.07 28.78 12.07"/></g></g></svg>',

            "created_at"        =>  date("Y-m-d H:i:s"),
            "updated_at"        =>  date("Y-m-d H:i:s"),
        ]);
    }
}