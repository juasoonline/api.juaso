<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> unsignedBigInteger( 'sale_id' ) -> nullable( true );

            $table -> string( 'type' ) -> nullable( false );
            $table -> string( 'image' ) -> nullable( false );

            $table -> string( 'status' ) ->default( '100' );

            $table -> timestamps();

            $table -> foreign('sale_id' ) -> references('id' ) -> on ('sales' ) -> onDelete('cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
