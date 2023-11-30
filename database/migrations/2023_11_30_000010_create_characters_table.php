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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('char_name');
            $table->float('char_price', 4, 2)->nullable();
            $table->timestamps();
        });
        DB::table('characters')->insert([
            [
                'char_name' => 'One',
                'char_price' => '0'
            ],
            [
                'char_name' => 'Two',
                'char_price' => '5'
            ],
            [
                'char_name' => 'Three',
                'char_price' => '10'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
