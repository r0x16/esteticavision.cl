<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetProductDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('edition_id')->nullable()->change();
            $table->decimal('rate',5,2)->default(0)->change();
            $table->integer('view_counter')->default(0)->change();
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
            // $table->unsignedInteger('edition_id')->nullable(false)->change();
            $table->decimal('rate',5,2)->change();
        });
    }
}
