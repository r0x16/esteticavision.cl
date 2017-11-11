<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_identities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Determina el tipo de autenticación usada por el usuario
            $table->unsignedTinyInteger('provider')->default(0);
            $table->string('provider_user_id')->nullable();

            // Tokens asociados al login del usuario
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->timestamp('expires_in')->nullable();

            $table->timestamps();

            $table->unique(['provider', 'provider_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_identities');
    }
}
