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
        Schema::create('statistik_total_penduduks', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_penduduk', 10, 0)->nullable();
            $table->decimal('jumlah_kk', 10, 0)->nullable();
            $table->decimal('jumlah_lakilaki', 10, 0)->nullable();
            $table->decimal('jumlah_perempuan', 10, 0)->nullable();
            $table->year('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_total_penduduks');
    }
};
