<?php

use App\Data\EkstrakurikulerData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaController;
use App\Data\BeritaData; // Pastikan class ini ada dan bisa di-autoload
use App\Models\Berita;   // Pastikan model ini ada

/*
|--------------------------------------------------------------------------
| RUTE HALAMAN PUBLIK (Untuk Pengunjung)
|--------------------------------------------------------------------------
| Rute-rute ini dapat diakses oleh siapa saja.
*/

Route::get('/', function () { return view('pages.beranda'); })->name('beranda');
Route::get('/profil', function () { return view('pages.profil'); })->name('profil');
Route::get('/spmb', function () { return view('pages.spmb'); })->name('spmb');

Route::get('/jurusan', function () { return view('pages.jurusan'); })->name('jurusan');
Route::get('/jurusan/detail', function () { return view('pages.detail-jurusan'); })->name('jurusan.detail');

Route::get('/ekstrakurikuler', function () { return view('pages.ekstrakurikuler'); })->name('ekstrakurikuler');
Route::get('/prestasi', function () { return view('pages.prestasi'); })->name('prestasi');
Route::get('/galeri', function () { return view('pages.galeri'); })->name('galeri');

// Rute Berita Publik (Fungsionalitas Asli Dipertahankan Sesuai Permintaan)
Route::get('/berita', function () {
    $beritaList = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
    if ($beritaList->isEmpty()) {
        $beritaList = BeritaData::getAll();
    }
    return view('pages.berita', compact('beritaList'));
})->name('berita');

// Route Ekstrakurikuler
Route::get('/ekstrakurikuler', function () {
    $ekskul = EkstrakurikulerData::getAll();
    return view('pages.ekstrakurikuler', compact('ekskul'));
})->name('ekstrakurikuler');

Route::get('/ekstrakurikuler/{slug}', function ($slug) {
    $ekskul = EkstrakurikulerData::getBySlug($slug);
    
    if (!$ekskul) {
        abort(404, 'Ekstrakurikuler tidak ditemukan');
    }
    
    return view('pages.detail-ekstrakurikuler', compact('ekskul'));
})->name('ekstrakurikuler.detail');


Route::get('/berita/{id}', function ($id) {
    $berita = Berita::where('status', 'publish')->find($id);
    if (!$berita) {
        $berita = BeritaData::getById($id);
    }

    if (!$berita) {
        abort(404, 'Berita tidak ditemukan');
    }

    $beritaLainnya = Berita::where('status', 'publish')->where('id', '!=', $id)->latest('tanggal')->take(3)->get();
    if ($beritaLainnya->isEmpty()) {
        $beritaLainnya = BeritaData::getLatest(3);
    }

    return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
})->name('berita.detail');


/*
|--------------------------------------------------------------------------
| RUTE AUTENTIKASI ADMIN
|--------------------------------------------------------------------------
| Rute untuk menampilkan form login dan memproses login.
*/

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.post');
// Anda akan butuh route logout nanti, bisa ditambahkan di sini
// Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| RUTE AREA ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
| Semua rute di dalam grup ini dilindungi dan hanya bisa diakses
| setelah admin berhasil login.
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/update-jumlah-siswa', [DashboardController::class, 'updateJumlahSiswa'])->name('siswa.update');

    // Route Berita (CRUD)
    Route::resource('berita', BeritaController::class)->except(['show']); // Method 'show' biasanya tidak diperlukan di admin CRUD

    // Tambahkan rute admin lainnya di sini (misal: guru, kelas, dll)

});