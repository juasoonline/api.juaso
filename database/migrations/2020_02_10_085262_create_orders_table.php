<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );

            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );
            $table -> uuid( 'order_id' ) -> unique() -> nullable( false );

            $table -> unsignedBigInteger( 'customer_id' ) -> nullable( false );
            $table -> unsignedBigInteger( 'address_id' ) -> nullable( true );

            $table -> unsignedBigInteger( 'product_id' ) -> nullable( false );
            $table -> unsignedBigInteger( 'color_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'size_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'bundle_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'store_id' ) -> nullable( false );

            $table -> integer( 'quantity' ) -> nullable( true );

//            $table -> float( 'unit_price' ) -> nullable( true );
            $table -> float( 'coupon_amount' ) -> nullable( true )->default( 0.00 );
            $table -> float( 'promo_amount' ) -> nullable( true )->default( 0.00 );

            $table -> unsignedBigInteger( 'delivery_method_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'payment_method_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'transport_id' ) -> nullable( true );

            $table -> string( 'extra_data' ) -> nullable( true );

            $table -> smallInteger( 'status' ) ->default( 100 );

            $table -> timestamps();

            $table -> foreign('customer_id' ) -> references('id' ) -> on( 'customers' ) -> onDelete( 'cascade' );
            $table -> foreign('address_id' ) -> references('id' ) -> on( 'addresses' ) -> onDelete( 'cascade' );

            $table -> foreign('store_id' ) -> references('id' ) -> on( 'stores' ) -> onDelete( 'cascade' );
            $table -> foreign('product_id' ) -> references('id' ) -> on( 'products' ) -> onDelete( 'cascade' );
            $table -> foreign('color_id' ) -> references('id' ) -> on( 'colors' ) -> onDelete( 'cascade' );
            $table -> foreign('size_id' ) -> references('id' ) -> on( 'sizes' ) -> onDelete( 'cascade' );
            $table -> foreign('bundle_id' ) -> references('id' ) -> on( 'bundles' ) -> onDelete( 'cascade' );

            $table -> foreign('delivery_method_id' ) -> references('id' ) -> on( 'delivery_methods' ) -> onDelete( 'cascade' );
            $table -> foreign('payment_method_id' ) -> references('id' ) -> on( 'payment_methods' ) -> onDelete( 'cascade' );
            $table -> foreign('transport_id' ) -> references('id' ) -> on( 'transports' ) -> onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
