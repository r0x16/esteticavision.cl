<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meeting20171130CreateCategoryMediasTable extends Migration
{
    /**
     * Las categorías también pueden tener asociados elementos multimedia.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_medias', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('multimedia_id');
            $table->foreign('multimedia_id')->references('id')->on('multimedia');

            $table->unsignedTinyInteger('order');

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
        Schema::dropIfExists('category_medias');
    }
}
