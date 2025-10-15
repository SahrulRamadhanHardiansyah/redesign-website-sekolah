<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique(); // Untuk URL, contoh: /ekstrakurikuler/pmr
            $table->string('gambar')->nullable(); // Untuk logo/gambar utama ekskul
            $table->longText('deskripsi'); // Akan menyimpan semua detail dalam format Markdown
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};