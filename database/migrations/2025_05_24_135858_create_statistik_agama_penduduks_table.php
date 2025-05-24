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
        Schema::create('statistik_agama_penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('agama', 100);
            $table->integer('jumlah');
            $table->year('tahun');
            $table->timestamps();
            $table->unique(['agama', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_agama_penduduks');
    }
};
