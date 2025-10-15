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
                ['tanya' => 'Jurusan apa saja yang tersedia di SMKN 1 Bangil?', 'jawab' => 'SMKN 1 Bangil merupakan sekolah kejuruan unggulan di Kabupaten Pasuruan yang menawarkan berbagai jurusan sesuai kebutuhan dunia industri dan teknologi. Jurusan yang tersedia antara lain Teknik Elektronika Industri, Teknik Instalasi dan Pemanfaatan Tenaga Listrik, Teknik Komputer dan Jaringan, Rekayasa Perangkat Lunak (RPL), Multimedia, Produksi dan Siaran Program Televisi, Tata Busana, Ototronika, dan Mekatronika. Melalui beragam jurusan tersebut, SMKN 1 Bangil mempersiapkan siswanya menjadi tenaga kerja profesional yang siap bersaing di era modern.'],
                ['tanya' => 'Apakah ada biaya pendaftaran?', 'jawab' => 'Tidak ada biaya yang dikenakan untuk proses pendaftaran awal (biaya formulir). Biaya lainnya mungkin akan diinformasikan setelah calon siswa dinyatakan diterima.'],
                ['tanya' => 'Bagaimana jika berkas yang diupload salah?', 'jawab' => 'Jika berkas yang diunggah salah saat pendaftaran PPDB SMKN 1 Bangil, segera login kembali ke akun pendaftaran dan periksa apakah masih ada opsi untuk mengedit atau mengganti berkas sebelum waktu pendaftaran ditutup. Jika sistem tidak mengizinkan penggantian, segera hubungi panitia PPDB SMKN 1 Bangil melalui kontak resmi (telepon, WhatsApp, atau datang langsung ke sekolah). Jelaskan kesalahan berkas yang diunggah dan mintalah bantuan untuk memperbaikinya. Penting untuk bertindak cepat agar data bisa diperbaiki sebelum proses verifikasi dilakukan.'],
                ['tanya' => 'Apakah bisa mendaftar lebih dari satu jalur?', 'jawab' => 'Tidak, pendaftar tidak diperbolehkan mendaftar lebih dari satu jalur di PPDB SMKN 1 Bangil. Calon siswa hanya dapat memilih satu jalur pendaftaran (seperti zonasi, afirmasi, perpindahan tugas orang tua, atau prestasi) sesuai dengan syarat dan ketentuan yang berlaku. Jika mendaftar di lebih dari satu jalur, sistem biasanya akan otomatis membatalkan salah satu atau seluruh pendaftaran. Karena itu, pastikan memilih jalur yang paling sesuai dengan kondisi dan prestasi kamu.'],
                ['tanya' => 'Apa yang harus dilakukan jika lupa password akun pendaftaran?', 'jawab' => 'Jika lupa password akun pendaftaran, buka halaman login di situs resmi PPDB SMKN 1 Bangil, lalu pilih menu “Lupa Password” dan ikuti langkah untuk mengatur ulang melalui email yang terdaftar. Pastikan email aktif agar tautan reset bisa diterima. Jika masih mengalami kendala atau tidak menerima email, segera hubungi panitia PPDB SMKN 1 Bangil melalui kontak resmi (telepon, WhatsApp, atau datang langsung ke sekolah) untuk mendapatkan bantuan mengakses kembali akun pendaftaran.'],
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