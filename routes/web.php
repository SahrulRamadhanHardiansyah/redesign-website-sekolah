<?php

use App\Data\EkstrakurikulerData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaController;
use App\Data\BeritaData;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SpmbPageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GtkController;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Setting;

/*
|--------------------------------------------------------------------------
| RUTE HALAMAN PUBLIK (Untuk Pengunjung)
|--------------------------------------------------------------------------
| Rute-rute ini dapat diakses oleh siapa saja.
*/

Route::get('/', function () {
    $jumlahSiswa = Setting::getValue('jumlah_siswa', '0');
    return view('pages.beranda', compact('jumlahSiswa'));
})->name('beranda');

Route::get('/Kontak', function () {return view('pages.kontak');})->name('kontak');
Route::get('/SambutanKepsek', function() {return view('pages.SambutanKepsek');})->name('SambutanKepsek');
Route::get('/profil', function () { return view('pages.profil'); })->name('profil');

// Rute untuk Halaman GTK & Siswa
Route::get('/data-pendidik', [GtkController::class, 'pendidik'])->name('data.pendidik');
Route::get('/data-tenaga-kependidikan', [GtkController::class, 'tenagaKependidikan'])->name('data.tenaga_kependidikan');
Route::get('/data-siswa', [GtkController::class, 'siswa'])->name('data.siswa');

// Rute SPMB Publik
Route::get('/spmb', function () {
    // 1. Ambil semua setting dari database
    $settings = \App\Models\SpmbSetting::pluck('value', 'key')->all();

    // 2. Decode semua field yang disimpan sebagai JSON menjadi array
    $settings['alur_pendaftaran'] = json_decode($settings['alur_pendaftaran'] ?? '[]', true);
    $settings['jadwal_penting'] = json_decode($settings['jadwal_penting'] ?? '[]', true);
    $settings['faq'] = json_decode($settings['faq'] ?? '[]', true);

    // Tambahkan json_decode untuk syarat dan berkas
    $decoded_syarat = json_decode($settings['syarat_umum'] ?? '[]', true);
    $settings['syarat_umum'] = is_array($decoded_syarat) ? $decoded_syarat : [];

    $decoded_berkas = json_decode($settings['berkas_wajib'] ?? '[]', true);
    $settings['berkas_wajib'] = is_array($decoded_berkas) ? $decoded_berkas : [];

    // Untuk JALUR PENDAFTARAN agar tidak error di masa depan
    $decoded_jalur = json_decode($settings['jalur_pendaftaran'] ?? '[]', true);
    $settings['jalur_pendaftaran'] = is_array($decoded_jalur) ? $decoded_jalur : [];

    // 3. Kirim data yang sudah siap ke view
    return view('pages.spmb', compact('settings'));
})->name('spmb');

Route::get('/jurusan', function () { return view('pages.jurusan'); })->name('jurusan');
Route::get('/jurusan/detail', function () { return view('pages.detail-jurusan'); })->name('jurusan.detail');

// Rute Prestasi Publik
Route::get('/prestasi', function () {
    $allPrestasi = \App\Models\Prestasi::orderBy('tahun', 'desc')->orderBy('tanggal', 'desc')->get();

    // Ambil 4 prestasi unggulan terbaru (berdasarkan tanggal) untuk grid atas
    $highlights = $allPrestasi->where('is_unggulan', true)->take(4);

    // Ambil sisanya untuk daftar tabel di bawah
    $achievements = $allPrestasi; // Menampilkan semua prestasi di list

    return view('pages.prestasi', compact('highlights', 'achievements'));
})->name('prestasi');

// Rute Galeri Publik
Route::get('/galeri', function () {
    // Ambil data dari database
    $galleryItems = \App\Models\Galeri::orderBy('created_at', 'desc')->get();
    return view('pages.galeri', compact('galleryItems'));
})->name('galeri');

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
    $ekskul = Ekstrakurikuler::orderBy('nama')->get();
    return view('pages.ekstrakurikuler', compact('ekskul'));
})->name('ekstrakurikuler');

Route::get('/ekstrakurikuler/{ekstrakurikuler:slug}', function (Ekstrakurikuler $ekstrakurikuler) {
    return view('pages.detail-ekstrakurikuler', ['ekskul' => $ekstrakurikuler]);
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

    // Route Galeri (CRUD)
    Route::resource('galeri', GaleriController::class)->parameters(['galeri' => 'galeri'])->except(['show']);

    // Route untuk halaman SPMB
    Route::get('spmb', [SpmbPageController::class, 'edit'])->name('spmb.edit');
    Route::put('spmb', [SpmbPageController::class, 'update'])->name('spmb.update');

    // Route Prestasi (CRUD)
    Route::resource('prestasi', PrestasiController::class)->parameters(['prestasi' => 'prestasi'])->except(['show']);

    // Route Ekstrakurikuler (CRUD)
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class)->parameters(['ekstrakurikuler' => 'ekstrakurikuler'])->except(['show']);

    // Route untuk CRUD User
    Route::resource('users', UserController::class)->parameters(['users' => 'user']);

    // Route untuk Profil
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::post('/admin/update-jumlah-siswa', [DashboardController::class, 'updateJumlahSiswa'])
    ->name('admin.updateJumlahSiswa');
