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
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalJurusan = Jurusan::count();

        // Ambil jumlah siswa dari tabel settings
        $settingSiswa = Setting::where('key', 'jumlah_siswa')->first();
        $totalSiswa = $settingSiswa ? $settingSiswa->value : 0;

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalJurusan'
        ));
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
