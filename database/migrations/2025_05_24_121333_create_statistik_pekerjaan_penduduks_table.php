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
        Schema::create('statistik_pekerjaan_penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan', 100);
            $table->integer('jumlah');
            $table->year('tahun');
            $table->timestamps();
            $table->unique(['pekerjaan', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_pekerjaan_penduduks');
    }
};
