@extends('layouts.main')
@section('title', 'Berita & Kegiatan Sekolah')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
<div class="berita-container">
    <div class="container">
        <h1 class="page-title">Berita & Kegiatan Sekolah</h1>
        
        <div class="berita-section">
            <div class="section-header">
                <h2 class="section-title">Berita <span class="highlight">Unggulan</span></h2>
                <a href="#" class="btn-see-all">Lihat semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="berita-grid-2">
                @for ($i = 0; $i < 2; $i++)
                <div class="berita-card">
                    <div class="card-image">
                        <img src={{ asset('img/berita-sample.png') }} alt="Sosialisasi SPMB">
                        <span class="card-badge">Kegiatan Sekolah</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOSIALISASI SPMB SMKN 1 Bangil kepada guru SMP/ Sederajat</h3>
                        <div class="card-meta">
                            <i class="bi bi-calendar"></i>16 Januari 2025
                        </div>
                        <p class="card-excerpt">SMK Negeri 1 Bangil mulai merah panglipuran langsung sekretil Sekolah Kehutung Program Nasional. Penghergaan ini diberikan sebagai penghargaan atas kontribusi...</p>
                        <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="berita-section">
            <div class="section-header">
                <h2 class="section-title">Akademik</h2>
                <a href="#" class="btn-see-all">Lihat semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="berita-grid-3">
                @for ($i = 0; $i < 3; $i++)
                <div class="berita-card">
                    <div class="card-image">
                        <img src={{ asset('img/berita-sample.png') }} alt="Berita Akademik">
                        <span class="card-badge badge-akademik">Akademik</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOSIALISASI SPMB SMKN 1 Bangil kepada guru SMP/ Sederajat</h3>
                        <div class="card-meta">
                            <i class="bi bi-calendar"></i>16 Januari 2025
                        </div>
                        <p class="card-excerpt">SMK Negeri 1 Bangil mulai merah panglipuran langsung sekretil Sekolah Kehutung Program Nasional. Penghergaan ini diberikan sebagai penghargaan atas kontribusi...</p>
                        <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="berita-section">
            <div class="section-header">
                <h2 class="section-title">Pengumuman</h2>
                <a href="#" class="btn-see-all">Lihat semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="berita-grid-3">
                @for ($i = 0; $i < 3; $i++)
                <div class="berita-card">
                    <div class="card-image">
                        <img src={{ asset('img/berita-sample.png') }} alt="Pengumuman">
                        <span class="card-badge badge-pengumuman">Pengumuman</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOSIALISASI SPMB SMKN 1 Bangil kepada guru SMP/ Sederajat</h3>
                        <div class="card-meta">
                            <i class="bi bi-calendar"></i>16 Januari 2025
                        </div>
                        <p class="card-excerpt">SMK Negeri 1 Bangil mulai merah panglipuran langsung sekretil Sekolah Kehutung Program Nasional. Penghergaan ini diberikan sebagai penghargaan atas kontribusi...</p>
                        <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="berita-section">
            <div class="section-header">
                <h2 class="section-title">Kegiatan Sekolah</h2>
                <a href="#" class="btn-see-all">Lihat semua <i class="bi bi-arrow-right-short"></i></a>
            </div>
            <div class="berita-grid-3">
                @for ($i = 0; $i < 3; $i++)
                <div class="berita-card">
                    <div class="card-image">
                        <img src={{ asset('img/berita-sample.png') }} alt="Kegiatan Sekolah">
                        <span class="card-badge badge-kegiatan">Kegiatan Sekolah</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOSIALISASI SPMB SMKN 1 Bangil kepada guru SMP/ Sederajat</h3>
                        <div class="card-meta">
                            <i class="bi bi-calendar"></i>16 Januari 2025
                        </div>
                        <p class="card-excerpt">SMK Negeri 1 Bangil mulai merah panglipuran langsung sekretil Sekolah Kehutung Program Nasional. Penghergaan ini diberikan sebagai penghargaan atas kontribusi...</p>
                        <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection