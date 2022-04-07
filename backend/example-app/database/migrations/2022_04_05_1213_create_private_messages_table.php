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
        Schema::create('private_messages', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at');
            $table->longText('message');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('private_chat_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->foreign('private_chat_id')->references('id')->on('private_chats')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_messages');
    }
};
