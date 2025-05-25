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
        Schema::create('berita_desas', function (Blueprint $table) {
            $table->id(); 
            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('isi');
            $table->dateTime('tanggal_publikasi');
            $table->boolean('status')->default(false);
            $table->string('thumbnail')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_desas');
    }
};
