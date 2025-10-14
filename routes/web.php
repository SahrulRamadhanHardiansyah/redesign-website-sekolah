<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Data\BeritaData;

Route::get('/', function () { return view('pages.beranda'); })->name('beranda');
Route::get('/profil', function () { return view('pages.profil'); })->name('profil');
Route::get('/spmb', function () { return view('pages.spmb'); })->name('spmb');

Route::get('/jurusan', function () { return view('pages.jurusan'); })->name('jurusan');
Route::get('/jurusan/detail', function () { return view('pages.detail-jurusan'); })->name('jurusan.detail');

Route::get('/ekstrakurikuler', function () { return view('pages.ekstrakurikuler'); })->name('ekstrakurikuler');
Route::get('/prestasi', function () { return view('pages.prestasi'); })->name('prestasi');

// Admin routes for Berita CRUD
Route::prefix('admin')->group(function () {
    Route::resource('berita', BeritaController::class)->names([
        'index' => 'admin.berita.index',
        'create' => 'admin.berita.create',
        'store' => 'admin.berita.store',
        'show' => 'admin.berita.show',
        'edit' => 'admin.berita.edit',
        'update' => 'admin.berita.update',
        'destroy' => 'admin.berita.destroy',
    ]);
});

// Public routes for Berita (updated to use controller)
Route::get('/berita', function () {
    // Switch to database data, fallback to static if empty
    $beritaCollection = \App\Models\Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
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

Route::get('/berita/{id}', function ($id) {
    // Try database first, fallback to static data
    $beritaModel = \App\Models\Berita::where('status', 'publish')->find($id);
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
    $beritaLainnyaCollection = \App\Models\Berita::where('status', 'publish')->where('id', '!=', $id)->latest('tanggal')->take(3)->get();
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

Route::get('/galeri', function () { return view('pages.galeri'); })->name('galeri');
