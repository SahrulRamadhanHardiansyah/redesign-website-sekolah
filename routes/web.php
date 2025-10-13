<?php
use Illuminate\Support\Facades\Route;
use App\Data\BeritaData;

Route::get('/', function () { return view('pages.beranda'); })->name('beranda');
Route::get('/profil', function () { return view('pages.profil'); })->name('profil');
Route::get('/spmb', function () { return view('pages.spmb'); })->name('spmb');

Route::get('/jurusan', function () { return view('pages.jurusan'); })->name('jurusan');
Route::get('/jurusan/detail', function () { return view('pages.detail-jurusan'); })->name('jurusan.detail');

Route::get('/ekstrakurikuler', function () { return view('pages.ekstrakurikuler'); })->name('ekstrakurikuler');
Route::get('/prestasi', function () { return view('pages.prestasi'); })->name('prestasi');

Route::get('/berita', function () {
    $beritaList = BeritaData::getAll();
    return view('pages.berita', compact('beritaList'));
})->name('berita');

Route::get('/berita/{id}', function ($id) {
    $berita = BeritaData::getById($id);

    if (!$berita) {
        abort(404, 'Berita tidak ditemukan');
    }

    $beritaLainnya = BeritaData::getLatest(3);

    return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
})->name('berita.detail');

Route::get('/galeri', function () { return view('pages.galeri'); })->name('galeri');
