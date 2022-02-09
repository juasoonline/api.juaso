<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> unsignedBigInteger( 'store_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'product_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'sale_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'sale_category_id' ) -> nullable( true );

            $table -> string( 'type' ) -> nullable( false );
            $table -> string( 'image' ) -> nullable( false );
            $table -> string( 'status' ) ->default( '000' );

            $table -> timestamps();

            $table -> foreign('store_id' ) -> references('id' ) -> on ('stores' ) -> onDelete('cascade' );
            $table -> foreign('product_id' ) -> references('id' ) -> on ('products' ) -> onDelete('cascade' );
            $table -> foreign('sale_id' ) -> references('id' ) -> on ('sales' ) -> onDelete('cascade' );
            $table -> foreign('sale_category_id' ) -> references('id' ) -> on ('sales_categories' ) -> onDelete('cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
