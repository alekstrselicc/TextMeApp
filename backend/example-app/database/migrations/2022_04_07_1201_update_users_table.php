<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile');
            $table->longText('user_description');
            $table->string('password');
            $table->dateTime('last_login');
            $table->dateTime('registered_at');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('relationship_id');
            $table->unsignedBigInteger('user_type_id');
            $table->unsignedBigInteger('town_id');
            $table->unsignedBigInteger('theme_id');

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('restrict');

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict');

            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('restrict');

            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('restrict');

            $table->foreign('town_id')->references('id')->on('towns')->onDelete('restrict');

            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
