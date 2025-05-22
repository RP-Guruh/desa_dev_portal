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
        Schema::create('batas_wilayahs', function (Blueprint $table) {
            $table->id();
            $table->string('batas_utara');
            $table->string('batas_timur');
            $table->string('batas_selatan');
            $table->string('batas_barat');
            $table->decimal('luas_wilayah', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batas_wilayahs');
    }
};
