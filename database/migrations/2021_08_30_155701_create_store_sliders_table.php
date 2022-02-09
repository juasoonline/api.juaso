<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_sliders', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> unsignedBigInteger( 'product_id' );
            $table -> unsignedBigInteger( 'store_id' );

            $table -> string( 'image' ) -> nullable( false );
            $table -> string( 'description' ) -> nullable( true );

            $table -> string( 'status' ) ->default( '000' );

            $table -> timestamps();

            $table -> softDeletes();

            $table -> foreign('product_id' ) -> references('id' ) -> on ('products' ) -> onDelete('cascade' );
            $table -> foreign('store_id' ) -> references('id' ) -> on ('stores' ) -> onDelete('cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_sliders');
    }
}
