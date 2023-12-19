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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->float('type_price', 8, 2)->nullable();
            $table->timestamps();
        });

        DB::table('types')->insert([
            [
                'type_name' => 'Skectch',
                'type_price' => '8'
            ],
            [
                'type_name' => 'Simple color',
                'type_price' => '12'
            ],
            [
                'type_name' => 'Full color',
                'type_price' => '18'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
