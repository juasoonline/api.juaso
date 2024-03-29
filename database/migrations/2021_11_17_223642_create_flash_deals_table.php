<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_deals', function ( Blueprint $table )
        {
            $table -> id();
            $table -> unsignedBigInteger( 'product_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'sale_id' ) -> nullable( true );

            $table -> dateTime( 'promo_start' ) -> nullable( true );
            $table -> dateTime( 'promo_end' ) -> nullable( true );

            $table -> string( 'status' ) ->default( '000' );

            $table -> timestamps();

            $table -> foreign('product_id' ) -> references('id' ) -> on( 'products' ) -> onDelete( 'cascade' );
            $table -> foreign('sale_id' ) -> references('id' ) -> on( 'sales' ) -> onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flash_deals');
    }
}
