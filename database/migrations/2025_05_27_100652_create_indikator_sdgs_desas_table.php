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
        Schema::create('indikator_sdgs_desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_indikator_sdgs_desa_id')->constrained('category_indikator_sdgs_desas')->onDelete('cascade');
            $table->decimal('nilai', 10, 2);
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_sdgs_desas');
    }
};
