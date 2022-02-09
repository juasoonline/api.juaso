<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'groups', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> string( 'name' ) -> nullable( false ) -> unique();
            $table -> string( 'slug' ) -> nullable( false ) -> unique();
            $table -> mediumText( 'description' ) -> nullable( false );

            $table -> string( 'image_icon' ) -> nullable( true );
            $table -> mediumText( 'web_icon' ) -> nullable( true );

            $table -> timestamps();

            $table -> softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
