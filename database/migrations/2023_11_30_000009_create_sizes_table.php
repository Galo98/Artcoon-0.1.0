<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size_name');
            $table->float('size_price', 4, 2)->nullable();
            $table->timestamps();
        });
        DB::table('sizes')->insert([
            [
                'size_name' => 'Face',
                'size_price' => '8'
            ],
            [
                'size_name' => 'Half-body',
                'size_price' => '12'
            ],
            [
                'size_name' => 'Full-body',
                'size_price' => '20'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
