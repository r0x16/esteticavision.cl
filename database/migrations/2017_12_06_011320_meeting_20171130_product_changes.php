<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meeting20171130ProductChanges extends Migration
{
    /**
     * Se realizan los siguientes cambios en la tabla de productos
     * 1. Se agrega un campo que suma la cantidad de visitas hechas al producto.
     * 2. Se agrega un campo que permite identificar el producto con un código.
     * 3. La marca (brand) en un producto es un campo opcional (nullable)
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('view_counter');
            $table->string('code',10)->unique();
            $table->unsignedInteger('brand_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('view_counter');
            $table->dropcolumn('code');
            $table->unsignedInteger('brand_id')->nullable(false)->change();
        });
    }
}
