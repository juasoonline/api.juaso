<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_sliders', function ( Blueprint $table )
        {
            $table -> bigIncrements('id' );
            $table -> uuid( 'resource_id' ) -> unique() -> nullable( false );

            $table -> unsignedBigInteger( 'store_id' ) -> nullable( true );

            $table -> dateTime( 'start' ) -> nullable( true );
            $table -> dateTime( 'end' ) -> nullable( true );

            $table -> string( 'name' ) -> nullable( true );
            $table -> string( 'slug' ) -> nullable( true );

            $table -> string( 'slider_image' ) -> nullable( false );

            $table -> string( 'status' ) ->default( '000' );

            $table -> timestamps();

            $table -> softDeletes();

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
        Schema::dropIfExists('campaign_sliders');
    }
}
