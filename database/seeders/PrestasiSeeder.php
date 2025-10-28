<?php

namespace Database\Seeders; 

use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        Prestasi::truncate();

        // Prestasi Unggulan (untuk grid atas)
        Prestasi::create([
            'judul' => 'SMK Negeri 1 Bangil Terus Mencetak Prestasi Gemilang',
            'deskripsi' => 'SMK Negeri 1 Bangil terus mencetak prestasi gemilang di berbagai bidang, baik akademik maupun non-akademik, membuktikan kualitasnya sebagai sekolah unggul.',
            'tahun' => '2025',
            'tanggal' => '2025-09-05',
            'gambar' => 'img/prestasi/prestasi-hero.png',
            'is_unggulan' => true,
        ]);
        Prestasi::create([
            'judul' => 'Juara Lomba Debat Bahasa Inggris',
            'deskripsi' => 'Tim debat SMKN 1 Bangil meraih juara 2 dalam lomba debat bahasa Inggris tingkat kabupaten.',
            'tahun' => '2025',
            'tanggal' => '2025-08-15',
            'gambar' => 'img/prestasi/prestasi-hero.png',
            'is_unggulan' => true,
        ]);
        Prestasi::create([
            'judul' => 'Olimpiade Sains Nasional',
            'deskripsi' => 'Siswa berhasil meraih medali perunggu dalam olimpiade matematika tingkat nasional.',
            'tahun' => '2025',
            'tanggal' => '2025-07-20',
            'gambar' => 'img/prestasi/prestasi-hero.png',
            'is_unggulan' => true,
        ]);
        Prestasi::create([
            'judul' => 'Lomba Kompetensi Siswa',
            'deskripsi' => 'Siswa jurusan RPL berhasil menjadi finalis LKS tingkat Nasional di bidang Web Technologies.',
            'tahun' => '2025',
            'tanggal' => '2025-06-10',
            'gambar' => 'img/prestasi/prestasi-hero.png',
            'is_unggulan' => true,
        ]);

        // Prestasi Lainnya (untuk daftar tabel)
        Prestasi::create([
            'judul' => 'Penghargaan Sekolah Adiwiyata Mandiri',
            'deskripsi' => 'SMKN 1 Bangil mendapatkan penghargaan sebagai sekolah Adiwiyata Mandiri atas komitmennya terhadap lingkungan.',
            'tahun' => '2024',
            'is_unggulan' => false,
        ]);
        Prestasi::create([
            'judul' => 'Juara 3 Lomba Desain Grafis',
            'deskripsi' => 'Siswa SMKN 1 Bangil meraih juara 3 dalam lomba desain grafis tingkat provinsi.',
            'tahun' => '2023',
            'is_unggulan' => false,
        ]);
    }
}