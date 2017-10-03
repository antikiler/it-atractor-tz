<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBehaviorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behaviors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('alias',255);
            $table->text('description');
            $table->tinyInteger('active');
            $table->string('thumb',200);
            $table->float('quality_kitchen');
            $table->float('quality_service');
            $table->float('situation');
            $table->float('total_top');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('behaviors');
    }
}
