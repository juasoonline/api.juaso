<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_categories', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> string( 'name' ) -> nullable( false );
            $table -> string( 'slug' ) -> nullable( false );
            $table -> mediumText( 'description' ) -> nullable( true );

            $table -> string( 'extra_data' ) -> nullable( true );

            $table -> string( 'status' ) ->default( '100' );

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
        Schema::dropIfExists('sales_categories');
    }
}
