<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpmbSetting;

class SpmbSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Sistem Penerimaan Murid Baru (SPMB) SMKN 1 Bangil'],
            ['key' => 'hero_subtitle', 'value' => 'Tahun Ajaran 2026/2027'],
            ['key' => 'hero_image', 'value' => 'img/spmb/SPMB-Hero.jpg'],

            // Alur Pendaftaran (disimpan sebagai JSON)
            ['key' => 'alur_pendaftaran', 'value' => json_encode([
                ['num' => 1, 'icon' => 'fas fa-info-circle', 'title' => 'Pahami Informasi', 'desc' => 'Baca syarat dan ketentuan pendaftaran'],
                ['num' => 2, 'icon' => 'fas fa-folder-open', 'title' => 'Siapkan Berkas', 'desc' => 'Kumpulkan dokumen yang diperlukan'],
                ['num' => 3, 'icon' => 'fas fa-keyboard', 'title' => 'Isi Formulir Online', 'desc' => 'Lengkapi data diri dan unggah berkas'],
                ['num' => 4, 'icon' => 'fas fa-user-check', 'title' => 'Verifikasi & Seleksi', 'desc' => 'Tunggu proses verifikasi berkas'],
                ['num' => 5, 'icon' => 'fas fa-bullhorn', 'title' => 'Lihat Pengumuman', 'desc' => 'Cek hasil seleksi di website resmi'],
                ['num' => 6, 'icon' => 'fas fa-user-graduate', 'title' => 'Daftar Ulang', 'desc' => 'Lakukan registrasi ulang jika diterima']
            ])],

            // Jadwal Penting (disimpan sebagai JSON)
            ['key' => 'jadwal_penting', 'value' => json_encode([
                ['kegiatan' => 'Pendaftaran Online', 'mulai' => '2026-02-01', 'selesai' => '2026-03-31'],
                ['kegiatan' => 'Seleksi Administrasi', 'mulai' => '2026-04-01', 'selesai' => '2026-04-30'],
                ['kegiatan' => 'Pengumuman Hasil', 'mulai' => '2026-05-10', 'selesai' => '2026-05-10'],
                ['kegiatan' => 'Daftar Ulang', 'mulai' => '2026-05-16', 'selesai' => '2026-05-31']
            ])],

            // Syarat Umum (disimpan sebagai JSON)
            ['key' => 'syarat_umum', 'value' => json_encode([
                ['icon' => 'fas fa-check-circle', 'text' => 'Lulusan SMP/MTs Sederajat'],
                ['icon' => 'fas fa-check-circle', 'text' => 'Usia maksimal 21 tahun pada 1 Juli 2026'],
                ['icon' => 'fas fa-check-circle', 'text' => 'Sehat jasmani dan rohani'],
                ['icon' => 'fas fa-check-circle', 'text' => 'Tidak buta warna (untuk jurusan tertentu)'],
                ['icon' => 'fas fa-check-circle', 'text' => 'Berkelakuan baik'],
            ])],

            // Berkas Wajib (disimpan sebagai JSON)
            ['key' => 'berkas_wajib', 'value' => json_encode([
                ['icon' => 'fas fa-upload', 'text' => 'Ijazah SMP/MTs atau Surat Keterangan Lulus'],
                ['icon' => 'fas fa-upload', 'text' => 'SKHUN (Surat Keterangan Hasil Ujian Nasional)'],
                ['icon' => 'fas fa-upload', 'text' => 'Akta Kelahiran'],
                ['icon' => 'fas fa-upload', 'text' => 'Kartu Keluarga (KK)'],
                ['icon' => 'fas fa-upload', 'text' => 'Pas foto berwarna 3x4 dan 4x6 (2 Lembar)'],
                ['icon' => 'fas fa-upload', 'text' => 'Surat keterangan berkelakuan baik dari sekolah asal'],
            ])],

            // FAQ (disimpan sebagai JSON)
            ['key' => 'faq', 'value' => json_encode([
                ['tanya' => 'Kapan pendaftaran SPMB SMKN 1 Bangil dibuka?', 'jawab' => 'Pendaftaran akan dibuka mulai 1 Februari 2026 hingga 31 Maret 2026 secara online melalui website ini.'],
                ['tanya' => 'Apakah ada biaya pendaftaran?', 'jawab' => 'Tidak ada biaya yang dikenakan untuk proses pendaftaran awal (biaya formulir). Biaya lainnya mungkin akan diinformasikan setelah calon siswa dinyatakan diterima.']
            ])],

            // Kontak Bantuan
            ['key' => 'kontak_wa', 'value' => '+6281234567890'],
            ['key' => 'kontak_email', 'value' => 'smknesaba@yahoo.com'],
            ['key' => 'kontak_lokasi', 'value' => 'https://maps.app.goo.gl/rbjB2mM75bFzKHow5'],
        ];

        foreach ($settings as $setting) {
            // Gunakan updateOrCreate agar seeder bisa dijalankan ulang tanpa error
            SpmbSetting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}