<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> integer( 'quantity' ) -> nullable( true );

            $table -> unsignedBigInteger( 'customer_id' ) -> nullable( false );

            $table -> unsignedBigInteger( 'product_id' ) -> nullable( false );
            $table -> unsignedBigInteger( 'color_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'size_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'bundle_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'store_id' ) -> nullable( true );

            $table -> string( 'extra_data' ) -> nullable( true );

            $table -> timestamps();

            $table -> foreign('customer_id' ) -> references('id' ) -> on( 'customers' ) -> onDelete( 'cascade' );

            $table -> foreign('product_id' ) -> references('id' ) -> on( 'products' ) -> onDelete( 'cascade' );
            $table -> foreign('color_id' ) -> references('id' ) -> on( 'colors' ) -> onDelete( 'cascade' );
            $table -> foreign('size_id' ) -> references('id' ) -> on( 'sizes' ) -> onDelete( 'cascade' );
            $table -> foreign('bundle_id' ) -> references('id' ) -> on( 'bundles' ) -> onDelete( 'cascade' );
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
        Schema::dropIfExists('carts');
    }
}
