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
    // Switch to database data, fallback to static if empty
    $beritaCollection = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
    if ($beritaCollection->isEmpty()) {
        $beritaList = BeritaData::getAll();
    } else {
        // Convert to array of objects to match BeritaData structure
        $beritaList = $beritaCollection->map(function($berita) {
            return (object) [
                'id' => $berita->id,
                'judul' => $berita->judul,
                'slug' => $berita->slug,
                'kategori' => 'Berita Sekolah',
                'tanggal' => $berita->tanggal ? \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') : '',
                'penulis' => $berita->penulis,
                'gambar' => $berita->gambar,
                'excerpt' => \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100),
                'konten' => $berita->isi,
            ];
        })->all(); // Convert collection to array
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
    // Try database first, fallback to static data
    $beritaModel = Berita::where('status', 'publish')->find($id);
    if (!$beritaModel) {
        $berita = BeritaData::getById($id);
    } else {
        $berita = (object) [
            'id' => $beritaModel->id,
            'judul' => $beritaModel->judul,
            'slug' => $beritaModel->slug,
            'kategori' => 'Berita Sekolah',
            'tanggal' => $beritaModel->tanggal ? \Carbon\Carbon::parse($beritaModel->tanggal)->format('d F Y') : '',
            'penulis' => $beritaModel->penulis,
            'gambar' => $beritaModel->gambar,
            'excerpt' => \Illuminate\Support\Str::limit(strip_tags($beritaModel->isi), 100),
            'konten' => [$beritaModel->isi], // Convert to array for view compatibility
        ];
    }

    if (!$berita) {
        abort(404, 'Berita tidak ditemukan');
    }

    // Get other news
    $beritaLainnyaCollection = Berita::where('status', 'publish')->where('id', '!=', $id)->latest('tanggal')->take(3)->get();
    if ($beritaLainnyaCollection->isEmpty()) {
        $beritaLainnya = BeritaData::getLatest(3);
    } else {
        $beritaLainnya = $beritaLainnyaCollection->map(function($b) {
            return (object) [
                'id' => $b->id,
                'judul' => $b->judul,
                'slug' => $b->slug,
                'kategori' => 'Berita Sekolah',
                'tanggal' => $b->tanggal ? \Carbon\Carbon::parse($b->tanggal)->format('d F Y') : '',
                'penulis' => $b->penulis,
                'gambar' => $b->gambar,
                'excerpt' => \Illuminate\Support\Str::limit(strip_tags($b->isi), 100),
                'konten' => [$b->isi], // Convert to array for view compatibility
            ];
        })->all(); // Convert collection to array
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
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
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
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita'])->except(['show']); // Method 'show' biasanya tidak diperlukan di admin CRUD

    // Tambahkan rute admin lainnya di sini (misal: guru, kelas, dll)

});
Route::post('/admin/update-jumlah-siswa', [DashboardController::class, 'updateJumlahSiswa'])
    ->name('admin.updateJumlahSiswa');
