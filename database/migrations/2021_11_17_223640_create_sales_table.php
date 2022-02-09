<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function ( Blueprint $table )
        {
            $table -> id();
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );



            $table -> string( 'name' ) -> nullable( false );
            $table -> string( 'slug' ) -> nullable( true );
            $table -> mediumText( 'description' ) -> nullable( true );


            $table -> dateTime( 'promo_start' ) -> nullable( true );
            $table -> dateTime( 'promo_end' ) -> nullable( true );

            $table -> string( 'extra_data' ) -> nullable( true );
            $table -> string( 'status' ) ->default( '000' );

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
