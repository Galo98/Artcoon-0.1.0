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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('order_totPrice', 8, 2)->nullable();
            $table->dateTime('order_date')->default(now());
            $table->dateTime('order_delivery')->nullable();
            $table->int('order_pay', 1)->default(2);
            $table->string('order_link');
            $table->boolean('order_public');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('bkg_id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('bkg_id')->references('id')->on('backgrounds');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
