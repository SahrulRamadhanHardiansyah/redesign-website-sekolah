<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::truncate();

        $galleryItems = [
            ['judul' => 'Diskusi Kelompok Siswa', 'gambar' => 'img/galeri-1.png', 'kategori' => 'akademik'],
            ['judul' => 'Kegiatan Pramuka', 'gambar' => 'img/galeri-1.png', 'kategori' => 'ekskul'],
            ['judul' => 'Lomba Kompetensi Siswa', 'gambar' => 'img/galeri-1.png', 'kategori' => 'lomba'],
            ['judul' => 'Seminar Teknologi', 'gambar' => 'img/galeri-1.png', 'kategori' => 'akademik'],
            ['judul' => 'Perayaan HUT Sekolah', 'gambar' => 'img/galeri-1.png', 'kategori' => 'acara'],
            ['judul' => 'Latihan Paskibra', 'gambar' => 'img/galeri-1.png', 'kategori' => 'ekskul'],
            ['judul' => 'Workshop Guru', 'gambar' => 'img/galeri-1.png', 'kategori' => 'acara'],
            ['judul' => 'Olimpiade Sains', 'gambar' => 'img/galeri-1.png', 'kategori' => 'lomba'],
            ['judul' => 'Pameran Karya Siswa DKV', 'gambar' => 'img/galeri-1.png', 'kategori' => 'akademik'],
        ];

        foreach ($galleryItems as $item) {
            Galeri::create($item);
        }
    }
}