<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'products', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );
            $table -> unsignedBigInteger( 'store_id' );
            $table -> unsignedBigInteger( 'brand_id' );
            $table -> unsignedBigInteger( 'charge_id' );

            $table -> string( 'name' ) -> nullable( false );
            $table -> string( 'sku' ) -> nullable( true );
            $table -> string( 'slug' ) -> nullable( true );
            $table -> mediumText( 'description' ) -> nullable( true );

            $table -> integer( 'quantity' ) -> nullable( true ) ->default( 0 );
            $table -> integer( 'total_sold' ) -> nullable( true ) ->default( 0 );

            $table -> float( 'price' )-> nullable( true ) ->default( 0.00 );
            $table -> float( 'sales_price' )-> nullable( true ) ->default( 0.00 );


            $table -> string( 'free_delivery' ) -> nullable( true );
            $table -> integer( 'buyer_protection' ) -> nullable( false ) ->default( 7 );

            $table -> string( 'status' ) ->default( 100 );

            $table -> string( 'pricing' ) -> nullable( false ) ->default( "Product" );
            $table -> mediumText( 'extra_data' ) -> nullable( true );

            $table -> timestamps();
            $table -> softDeletes();

            $table -> foreign('brand_id' ) -> references('id' ) -> on( 'brands' ) -> onDelete( 'cascade' );
            $table -> foreign('store_id' ) -> references('id' ) -> on( 'stores' ) -> onDelete( 'cascade' );
            $table -> foreign('charge_id' ) -> references('id' ) -> on( 'charges' ) -> onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'products' );
    }
}
