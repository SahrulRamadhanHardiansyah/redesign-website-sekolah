<?php

namespace App\Http\Controllers;

use App\Models\GtkSetting; // 1. Tambahkan import untuk model GtkSetting
use Illuminate\Http\Request;

class GtkController extends Controller
{
    /**
     * Fungsi helper untuk mengambil semua setting dari database.
     */
    private function getSettings()
    {
        return GtkSetting::pluck('value', 'key')->all();
    }

    /**
     * Menampilkan halaman data statistik Pendidik.
     */
    public function pendidik()
    {
        // 2. Ambil data dari database, bukan dari array statis
        $settings = $this->getSettings();
        
        // 3. Susun data untuk dikirim ke view
        $data = [
            'totalPendidik' => $settings['pendidik_total'] ?? 0,
            'gender' => json_decode($settings['pendidik_gender'] ?? '[]', true),
            'pendidikan' => json_decode($settings['pendidik_pendidikan'] ?? '[]', true),
            'statusSertifikasi' => json_decode($settings['pendidik_sertifikasi'] ?? '[]', true),
        ];
        return view('pages.data-pendidik', compact('data'));
    }

    /**
     * Menampilkan halaman data statistik Tenaga Kependidikan.
     */
    public function tenagaKependidikan()
    {
        $settings = $this->getSettings();
        $data = [
            'totalTendik' => $settings['tendik_total'] ?? 0,
            'gender' => json_decode($settings['tendik_gender'] ?? '[]', true),
            'posisi' => json_decode($settings['tendik_posisi'] ?? '[]', true),
        ];
        return view('pages.data-tenaga-kependidikan', compact('data'));
    }

    /**
     * Menampilkan halaman data statistik Siswa.
     */
    public function siswa()
    {
        $settings = $this->getSettings();
        $data = [
            'totalSiswa' => $settings['siswa_total'] ?? 0,
            'gender' => json_decode($settings['siswa_gender'] ?? '[]', true),
            'perJurusan' => json_decode($settings['siswa_per_jurusan'] ?? '[]', true),
            'perTingkat' => json_decode($settings['siswa_per_tingkat'] ?? '[]', true),
        ];
        return view('pages.data-siswa', compact('data'));
    }
}