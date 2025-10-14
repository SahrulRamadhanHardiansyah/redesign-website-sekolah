<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('tahun'); // Menggunakan string agar fleksibel misal: "2024/2025"
            $table->date('tanggal')->nullable(); // Tanggal spesifik, untuk sorting unggulan
            $table->string('gambar')->nullable(); // Gambar hanya untuk prestasi unggulan
            $table->boolean('is_unggulan')->default(false); // Flag untuk prestasi di grid atas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};