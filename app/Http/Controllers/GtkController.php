<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class GtkController extends Controller
{
    /**
     * Menampilkan halaman data statistik Pendidik.
     */
    public function pendidik()
    {
        $data = [
            'totalPendidik' => 85,
            'gender' => [
                'labels' => ['Laki-laki', 'Perempuan'],
                'data' => [45, 40], // 45 Pria, 40 Wanita
            ],
            'pendidikan' => [
                'labels' => ['S2', 'S1', 'D3/D4'],
                'data' => [15, 65, 5], // 15 Magister, 65 Sarjana, 5 Diploma
            ],
            'statusSertifikasi' => [
                'labels' => ['Sudah Sertifikasi', 'Belum Sertifikasi'],
                'data' => [70, 15], // 70 sudah, 15 belum
            ],
        ];
        return view('pages.data-pendidik', compact('data'));
    }
    /**
     * Menampilkan halaman data statistik Tenaga Kependidikan.
     */
    public function tenagaKependidikan()
    {
        $data = [
            'totalTendik' => 35,
            'gender' => [
                'labels' => ['Laki-laki', 'Perempuan'],
                'data' => [15, 20],
            ],
            'posisi' => [
                'labels' => ['Administrasi', 'Perpustakaan', 'Laboran', 'Kebersihan', 'Keamanan'],
                'data' => [12, 4, 8, 7, 4],
            ],
        ];
        return view('pages.data-tenaga-kependidikan', compact('data'));
    }
    /**
     * Menampilkan halaman data statistik Siswa.
     */
    public function siswa()
    {
        $data = [
            'totalSiswa' => 1560,
            'perJurusan' => [
                'labels' => ['TJKT', 'PPLG', 'DKV', 'Busana', 'Ototronika', 'Mekatronika'],
                'data' => [320, 290, 250, 210, 260, 230],
            ],
            'perTingkat' => [
                'labels' => ['Kelas X', 'Kelas XI', 'Kelas XII'],
                'data' => [540, 520, 500],
            ],
             'gender' => [
                'labels' => ['Laki-laki', 'Perempuan'],
                'data' => [980, 580],
            ],
        ];
        return view('pages.data-siswa', compact('data'));
    }
}
