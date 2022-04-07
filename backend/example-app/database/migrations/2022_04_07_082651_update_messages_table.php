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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('messages');
            $table->dateTime('created_at');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('channel_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
