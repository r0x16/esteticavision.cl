<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MultimediaTinifyRecord extends Migration
{
    /**
     * Crea un campo boolean que indica si la imagen ha sido optimizada con
     * algún producto externo como TinyPNG.
     * Solo aplica a los elementos multimedia de imagen.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('multimedia', function (Blueprint $table) {
            $table->boolean('tinified')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multimedia', function (Blueprint $table) {
            $table->dropColumn('tinified');
        });
    }
}
