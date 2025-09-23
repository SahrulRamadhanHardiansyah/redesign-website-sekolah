<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.beranda'); })->name('beranda');
Route::get('/profil', function () { return view('pages.profil'); })->name('profil');
Route::get('/spmb', function () { return view('pages.spmb'); })->name('spmb');

Route::get('/jurusan', function () { return view('pages.jurusan'); })->name('jurusan');
Route::get('/jurusan/detail', function () { return view('pages.detail-jurusan'); })->name('jurusan.detail'); 

Route::get('/ekstrakurikuler', function () { return view('pages.ekstrakurikuler'); })->name('ekstrakurikuler');
Route::get('/prestasi', function () { return view('pages.prestasi'); })->name('prestasi');

Route::get('/berita', function () { return view('pages.berita'); })->name('berita');
Route::get('/berita/detail', function () { return view('pages.detail-berita'); })->name('berita.detail'); 
Route::get('/galeri', function () { return view('pages.galeri'); })->name('galeri');