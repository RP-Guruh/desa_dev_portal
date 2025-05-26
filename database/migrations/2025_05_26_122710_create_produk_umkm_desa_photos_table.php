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
        Schema::create('produk_umkm_desa_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_umkm_desa_id')
                ->constrained('produk_umkm_desas')
                ->onDelete('cascade');
            $table->text('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_umkm_desa_photos');
    }
};
