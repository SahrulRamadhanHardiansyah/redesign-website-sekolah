@extends('layouts.main')
@section('title', 'Berita & Kegiatan Sekolah')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
@endsection


@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="section-title">Berita & Kegiatan <span>Sekolah</span></h1>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div class="berita-section">
            <h2 class="berita-section-title">Berita Unggulan</h2>
            <div class="grid-3">
                @for ($i = 0; $i < 2; $i++)
                <div class="card">
                    <img src="{{ asset('img/berita-sample.png') }}" alt="Judul Berita" class="card-img">
                    <div class="card-body">
                        <p><small>Kategori Berita | 20 Mei 2025</small></p>
                        <h3 class="card-title">Sosialisasi SPMB SMKN 1 Bangil kepada Guru SMP/Sederajat</h3>
                        <a href="#" class="btn btn-secondary">Baca Selengkapnya</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        
        <div class="berita-section">
            <h2 class="berita-section-title">Akademik</h2>
            <div class="grid-3">
                @for ($i = 0; $i < 3; $i++)
                <div class="card">
                    <img src="{{ asset('img/berita-sample.png') }}" alt="Judul Berita" class="card-img">
                    <div class="card-body">
                         <p><small>Akademik | 18 Mei 2025</small></p>
                        <h3 class="card-title">Siswa SMKN 1 Bangil Raih Juara Lomba Kompetensi Siswa</h3>
                         <a href="#" class="btn btn-secondary">Baca Selengkapnya</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        </div>
</section>
@endsection