<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGalleryBehaviorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_behaviors', function (Blueprint $table) {
            $table->integer('id_behavior')->after('id')->unsigned()->default(1);
            $table->foreign('id_behavior')->references('id')->on('behaviors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_behaviors', function (Blueprint $table) {
            //
        });
    }
}
