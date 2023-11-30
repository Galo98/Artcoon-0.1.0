<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('chat_msg');
            $table->timestamps();
            $table->unsignedBigInteger('chat_sender_id');
            $table->unsignedBigInteger('chat_receiver_id');
            $table->foreign('chat_sender_id')->references('id')->on('users');
            $table->foreign('chat_receiver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
