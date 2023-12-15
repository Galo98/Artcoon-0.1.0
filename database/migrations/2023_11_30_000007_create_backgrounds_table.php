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
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('bkg_name');
            $table->float('bkg_price', 8, 2)->nullable();
            $table->timestamps();
        });

        DB::table('backgrounds')->insert([
            [
                'bkg_name' => 'Transparent',
                'bkg_price' => '0'
            ],
            [
                'bkg_name' => 'Plain',
                'bkg_price' => '0'
            ],
            [
                'bkg_name' => 'Simple',
                'bkg_price' => '0'
            ],
            [
                'bkg_name' => 'Complex',
                'bkg_price' => '0'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backgrounds');
    }
};
