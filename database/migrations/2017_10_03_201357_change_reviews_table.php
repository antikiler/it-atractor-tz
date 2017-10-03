<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('id_user')->after('id')->unsigned()->default(1);
            $table->integer('id_behavior')->after('id_user')->unsigned()->default(1);

            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::table('reviews', function (Blueprint $table) {
            //
        });
    }
}
