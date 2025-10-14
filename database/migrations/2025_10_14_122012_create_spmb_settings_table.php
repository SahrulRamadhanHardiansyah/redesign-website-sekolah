<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spmb_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Kunci unik untuk setiap setting, misal: 'hero_title'
            $table->longText('value')->nullable(); // Nilai dari setting, bisa berupa teks, JSON, atau path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spmb_settings');
    }
};