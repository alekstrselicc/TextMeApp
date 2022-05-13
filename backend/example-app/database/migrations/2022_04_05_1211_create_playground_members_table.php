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
        Schema::create('playground_members', function (Blueprint $table) {
            $table->id();
            $table->dateTime('joined')->nullable();
            $table->dateTime('left')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('playground_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->foreign('playground_id')->references('id')->on('playgrounds')->onDelete('restrict');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playground_members');
    }
};
