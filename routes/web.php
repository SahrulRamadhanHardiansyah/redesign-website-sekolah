<?php

use App\Models\Berita;
use App\Models\Setting;
use App\Data\BeritaData;
use App\Data\JurusanData;
use App\Models\Ekstrakurikuler;
use App\Data\EkstrakurikulerData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GtkController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\SpmbPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\GtkPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ChatbotController;
use App\Models\Galeri;

/*
|--------------------------------------------------------------------------
| RUTE HALAMAN PUBLIK (Untuk Pengunjung)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    // Mengambil data rangkuman
    $jumlahSiswa = Setting::getValue('jumlah_siswa', '0');
    $jumlahJurusan = Setting::getValue('jumlah_jurusan', '0');
    $jumlahGuru = Setting::getValue('jumlah_guru', '0');

    // Mengambil 4 berita terbaru yang statusnya 'publish'
    $beritaTerbaru = Berita::where('status', 'publish')
                            ->latest('tanggal') // Urutkan berdasarkan tanggal, terbaru dulu
                            ->take(4)           // Ambil 4 data
                            ->get();

    // Mengambil 5 foto galeri terbaru
    $galeriTerbaru = Galeri::latest() // Urutkan berdasarkan created_at, terbaru dulu
                           ->take(5)    // Ambil 5 data
                           ->get();

    // Kirim semua data ke view
    return view('pages.beranda', compact(
        'jumlahSiswa', 
        'jumlahJurusan', 
        'jumlahGuru',
        'beritaTerbaru',
        'galeriTerbaru'
    ));
})->name('beranda');

Route::get('/Kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/SambutanKepsek', function () {
    return view('pages.SambutanKepsek');
})->name('SambutanKepsek');

Route::get('/profil', function () {
    return view('pages.profil');
})->name('profil');

// Rute untuk Halaman GTK & Siswa
Route::get('/data-pendidik', [GtkController::class, 'pendidik'])->name('data.pendidik');
Route::get('/data-tenaga-kependidikan', [GtkController::class, 'tenagaKependidikan'])->name('data.tenaga_kependidikan');
Route::get('/data-siswa', [GtkController::class, 'siswa'])->name('data.siswa');

// Rute SPMB Publik
Route::get('/spmb', function () {
    $settings = \App\Models\SpmbSetting::pluck('value', 'key')->all();
    $settings['alur_pendaftaran'] = json_decode($settings['alur_pendaftaran'] ?? '[]', true);
    $settings['jadwal_penting'] = json_decode($settings['jadwal_penting'] ?? '[]', true);
    $settings['faq'] = json_decode($settings['faq'] ?? '[]', true);
    $decoded_syarat = json_decode($settings['syarat_umum'] ?? '[]', true);
    $settings['syarat_umum'] = is_array($decoded_syarat) ? $decoded_syarat : [];
    $decoded_berkas = json_decode($settings['berkas_wajib'] ?? '[]', true);
    $settings['berkas_wajib'] = is_array($decoded_berkas) ? $decoded_berkas : [];
    $decoded_jalur = json_decode($settings['jalur_pendaftaran'] ?? '[]', true);
    $settings['jalur_pendaftaran'] = is_array($decoded_jalur) ? $decoded_jalur : [];
    return view('pages.spmb', compact('settings'));
})->name('spmb');

// Rute Jurusan
Route::get('/jurusan', function () {
    return view('pages.jurusan', [
        'jurusans' => JurusanData::getAllForListing()
    ]);
})->name('jurusan');

Route::get('/jurusan/{slug}', function ($slug) {
    $jurusan = JurusanData::findBySlug($slug);
    if (!$jurusan) {
        abort(404);
    }
    return view('pages.detail-jurusan', [
        'jurusan' => $jurusan
    ]);
})->name('jurusan.detail');

// Rute Prestasi Publik
Route::get('/prestasi', function () {
    $allPrestasi = \App\Models\Prestasi::orderBy('tahun', 'desc')->orderBy('tanggal', 'desc')->get();
    $highlights = $allPrestasi->where('is_unggulan', true)->take(4);
    $achievements = $allPrestasi;
    return view('pages.prestasi', compact('highlights', 'achievements'));
})->name('prestasi');

// Rute Galeri Publik
Route::get('/galeri', function () {
    $galleryItems = \App\Models\Galeri::orderBy('created_at', 'desc')->get();
    return view('pages.galeri', compact('galleryItems'));
})->name('galeri');

// Rute Berita Publik
Route::get('/berita', function () {
    $beritaCollection = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
    if ($beritaCollection->isEmpty()) {
        $beritaList = BeritaData::getAll();
    } else {
        $beritaList = $beritaCollection->map(function ($berita) {
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
        })->all();
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
            'konten' => [$beritaModel->isi],
        ];
    }

    if (!$berita) {
        abort(404, 'Berita tidak ditemukan');
    }

    $beritaLainnyaCollection = Berita::where('status', 'publish')->where('id', '!=', $id)->latest('tanggal')->take(3)->get();
    if ($beritaLainnyaCollection->isEmpty()) {
        $beritaLainnya = BeritaData::getLatest(3);
    } else {
        $beritaLainnya = $beritaLainnyaCollection->map(function ($b) {
            return (object) [
                'id' => $b->id,
                'judul' => $b->judul,
                'slug' => $b->slug,
                'kategori' => 'Berita Sekolah',
                'tanggal' => $b->tanggal ? \Carbon\Carbon::parse($b->tanggal)->format('d F Y') : '',
                'penulis' => $b->penulis,
                'gambar' => $b->gambar,
                'excerpt' => \Illuminate\Support\Str::limit(strip_tags($b->isi), 100),
                'konten' => [$b->isi],
            ];
        })->all();
    }

    return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
})->name('berita.detail');

/*
|--------------------------------------------------------------------------
| RUTE AUTENTIKASI ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| RUTE AREA ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/dashboard', [DashboardController::class, 'update'])->name('dashboard.update');

    Route::put('/update-jumlah-siswa', [DashboardController::class, 'updateJumlahSiswa'])->name('siswa.update');
    Route::post('/update-jumlah-siswa', [DashboardController::class, 'updateJumlahSiswa'])->name('updateJumlahSiswa');

    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita'])->except(['show']);
    Route::resource('galeri', GaleriController::class)->parameters(['galeri' => 'galeri'])->except(['show']);
    Route::get('spmb', [SpmbPageController::class, 'edit'])->name('spmb.edit');
    Route::put('spmb', [SpmbPageController::class, 'update'])->name('spmb.update');
    Route::resource('prestasi', PrestasiController::class)->parameters(['prestasi' => 'prestasi'])->except(['show']);
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class)->parameters(['ekstrakurikuler' => 'ekstrakurikuler'])->except(['show']);
    Route::resource('users', UserController::class)->parameters(['users' => 'user']);
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route untuk Kelola Data GTK & Siswa
    Route::get('gtk-data', [GtkPageController::class, 'edit'])->name('gtk.edit');
    Route::put('gtk-data', [GtkPageController::class, 'update'])->name('gtk.update');
});


Route::get('/chatbot', function () {
    return response()->json(['message' => 'Endpoint ini hanya menerima POST. Gunakan UI atau kirim POST ke /chatbot.'], 200);
});

// Tambahkan route POST untuk menerima request dari JS
Route::post('/chatbot', [ChatbotController::class, 'chat']);
