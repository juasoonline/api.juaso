<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'subcategories', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );
            $table -> unsignedBigInteger( 'category_id' );

            $table -> string( 'name' ) -> nullable( false );
            $table -> string( 'slug' ) -> nullable( false );
            $table -> mediumText( 'description' ) -> nullable( false );

            $table -> string( 'image_icon' ) -> nullable( true );
            $table -> mediumText( 'web_icon' ) -> nullable( true );

            $table -> timestamps();

            $table -> softDeletes();

            $table -> foreign('category_id' ) -> references('id' ) -> on ('categories' ) -> onDelete('cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
