<?php
use App\Data\EkstrakurikulerData;
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
    $beritaList = \App\Models\Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
    if ($beritaList->isEmpty()) {
        $beritaList = BeritaData::getAll();
    }
    return view('pages.berita', compact('beritaList'));
})->name('berita');

Route::get('/berita/{id}', function ($id) {
    // Try database first, fallback to static data
    $berita = \App\Models\Berita::where('status', 'publish')->find($id);
    if (!$berita) {
        $berita = BeritaData::getById($id);
    }

    if (!$berita) {
        abort(404, 'Berita tidak ditemukan');
    }

    // Get other news
    $beritaLainnya = \App\Models\Berita::where('status', 'publish')->where('id', '!=', $id)->latest('tanggal')->take(3)->get();
    if ($beritaLainnya->isEmpty()) {
        $beritaLainnya = BeritaData::getLatest(3);
    }

    return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
})->name('berita.detail');

Route::get('/galeri', function () { return view('pages.galeri'); })->name('galeri');
