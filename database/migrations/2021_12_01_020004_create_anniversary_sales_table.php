<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnniversarySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anniversary_sales', function ( Blueprint $table )
        {
            $table -> id();

            $table -> unsignedBigInteger( 'product_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'sale_id' ) -> nullable( true );
            $table -> unsignedBigInteger( 'category_id' ) -> nullable( true );

            $table -> dateTime( 'promo_start' ) -> nullable( true );
            $table -> dateTime( 'promo_end' ) -> nullable( true );

            $table -> string( 'status' ) ->default( '000' );

            $table -> timestamps();

            $table -> foreign('product_id' ) -> references('id' ) -> on( 'products' ) -> onDelete( 'cascade' );
            $table -> foreign('sale_id' ) -> references('id' ) -> on( 'sales' ) -> onDelete( 'cascade' );
            $table -> foreign('category_id' ) -> references('id' ) -> on( 'sales_categories' ) -> onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anniversary_sales');
    }
}
