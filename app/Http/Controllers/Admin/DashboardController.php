<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Jurusan;
// Asumsi Anda memiliki model ini juga
// use App\Models\Ekstrakurikuler;
// use App\Models\Staff;
// use App\Models\Setting; // Model untuk menyimpan jumlah siswa

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data total dari masing-masing model
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalJurusan = Jurusan::count();

        // Placeholder untuk model yang mungkin belum Anda buat
        $totalEkstra = 0; // Ganti dengan: Ekstrakurikuler::count();
        $totalStaff = 0; // Ganti dengan: Staff::count();

        // Mengambil jumlah siswa dari tabel setting (misalnya)
        // Jika belum ada, default-nya 0
        // $settingSiswa = Setting::where('key', 'jumlah_siswa')->first();
        // $totalSiswa = $settingSiswa ? $settingSiswa->value : 0;
        
        // Untuk sekarang kita gunakan angka statis sebagai contoh
        $totalSiswa = 1250; // Ganti ini dengan logika pengambilan data dari database

        // Kirim semua data ke view
        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalJurusan',
            'totalEkstra',
            'totalStaff'
        ));
    }

    /**
     * Fungsi untuk menyimpan jumlah siswa.
     * Anda perlu membuat route untuk ini.
     */
    public function updateJumlahSiswa(Request $request)
    {
        $request->validate([
            'jumlah_siswa' => 'required|integer|min:0',
        ]);

        // Logika untuk menyimpan ke database settings
        // Setting::updateOrCreate(
        //     ['key' => 'jumlah_siswa'],
        //     ['value' => $request->jumlah_siswa]
        // );

        // Untuk contoh ini, kita hanya kembali dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Jumlah siswa berhasil diperbarui!');
    }
}