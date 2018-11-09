<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_data', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('tax_identification_id')->nullable();
            $table->string('address')->nullable();
            $table->string('bussiness_activity')->nullable();
            $table->string('phone')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('invoice_data');
    }
}
