<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryAutorelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Crea los indices que relacionan las categorías como subcategorias
            $table->unsignedInteger('supercategory_id');
            $table->foreign('supercategory_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Elimina la relación de subcategoria
            $table->dropForeign('categories_supercategory_id_foreign');
            $table->dropColumn('supercategory_id');
        });
    }
}
