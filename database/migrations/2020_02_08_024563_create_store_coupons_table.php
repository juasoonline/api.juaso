<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_coupons', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );
            $table -> unsignedBigInteger( 'store_id' );

            $table -> float( 'value' ) -> nullable( false ) ->default(0.00);
            $table -> dateTime( 'expiration_date' );
            $table -> string( 'status' ) ->default('000');

            $table -> timestamps();

            $table -> foreign('store_id' ) -> references('id' ) -> on( 'stores' ) -> onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_coupons');
    }
}
