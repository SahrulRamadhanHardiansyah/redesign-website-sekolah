<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul berita
            $table->string('slug')->unique(); // Slug untuk URL SEO
            $table->text('isi'); // Isi berita
            $table->string('gambar')->nullable(); // Nama file gambar utama
            $table->string('penulis')->nullable(); // Nama penulis berita
            $table->date('tanggal')->nullable(); // Tanggal publikasi
            $table->enum('status', ['draft', 'publish'])->default('draft'); // Status berita
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
