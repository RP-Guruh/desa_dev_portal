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
        Schema::create('statistik_usia_penduduks', function (Blueprint $table) {
            $table->id();
            $table->integer('usia_min');
            $table->integer('usia_max');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->decimal('jumlah', 10, 0);
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_usia_penduduks');
    }
};
