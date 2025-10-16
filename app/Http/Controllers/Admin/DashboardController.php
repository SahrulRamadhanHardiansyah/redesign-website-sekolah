<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil SEMUA data yang dibutuhkan dari tabel settings
        $jumlahSiswa = (int) Setting::getValue('jumlah_siswa', 0);
        $jumlahGuru = (int) Setting::getValue('jumlah_guru', 0);      // <-- BARIS INI SEBELUMNYA HILANG
        $jumlahJurusan = (int) Setting::getValue('jumlah_jurusan', 0);  // <-- BARIS INI SEBELUMNYA HILANG

        // 2. Kirim SEMUA variabel ke view
        return view('admin.dashboard', compact(
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahJurusan'
        ));
    }

    public function update(Request $request)
    {
        // Validasi semua input yang dikirim dari form
        $request->validate([
            'jumlah_siswa' => 'required|integer|min:0',
            'jumlah_guru' => 'required|integer|min:0',
            'jumlah_jurusan' => 'required|integer|min:0',
        ]);

        // Loop melalui data yang divalidasi dan simpan ke database
        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Kembali ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.dashboard')
            ->with('success', 'Data rangkuman dashboard berhasil diperbarui!');
    }


    public function updateJumlahSiswa(Request $request)
    {
        $request->validate([
            'jumlah_siswa' => 'required|integer|min:0',
        ]);

        Setting::updateOrCreate(
            ['key' => 'jumlah_siswa'],
            ['value' => $request->jumlah_siswa]
        );

        return redirect()->route('admin.dashboard')
            ->with('success', 'Jumlah siswa berhasil diperbarui!');
    }
}
