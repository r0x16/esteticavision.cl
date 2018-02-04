<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meeting20171208CategoryWebpage extends Migration
{
    /**
     * Se crea la tabla categories_webpage que almacena la página que será desplegada
     * cuando se acceda a la url de la categoría.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_webpage', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->unique();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->boolean('active');
            $table->longText('body');
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
        Schema::dropIfExists('categories_webpage');
    }
}
