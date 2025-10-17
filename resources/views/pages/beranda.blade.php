@extends('layouts.main')

@section('title', 'Beranda - SMKN 1 Bangil')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endsection

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>SMKN 1 Bangil: Mencetak Generasi Unggul</h1>
            <p>Bergabunglah dengan kami untuk meraih masa depan cerah melalui pendidikan vokasi yang berkualitas dan relevan
                dengan industri.</p>
            <div class="hero-buttons">
                <a href="{{ route('berita') }}" class="btn btn-secondary">Lihat Berita</a>
                <a href="{{ route('spmb') }}" class="btn btn-primary btn-cta">Cek Info SPMB 2025</a>
            </div>
        </div>
    </section>

    <section class="fakta-sekolah section-padding">
        <div class="container">
            <h2 class="section-title">Fakta <span>SMKN 1 Bangil</span></h2>
            <div class="fakta-grid">
                <div class="fakta-card">
                    <div class="stat-value">
                        <h3>{{ number_format((int) ($jumlahSiswa ?? 0)) }}</h3>
                    </div>
                    <p>Total Siswa</p>
                </div>
                <div class="fakta-card">
                    <h3>{{ number_format((int) ($jumlahJurusan ?? 0)) }}</h3>
                    <p>Program Keahlian</p>
                </div>
                <div class="fakta-card">
                    <h3>5000+</h3>
                    <p>Jumlah Alumni</p>
                </div>
                <div class="fakta-card">
                    <h3>200+</h3>
                    <p>Prestasi</p>
                </div>
            </div>
        </div>
    </section>

    <section class="jurusan-section section-padding">
        <div class="container">
            <h2 class="section-title">Jurusan</h2>
            <div class="jurusan-grid">
                @php
                    $jurusans = [
                        ['img' => 'jurusan-pplg.png', 'name' => 'Pengembangan Perangkat Lunak'],
                        ['img' => 'jurusan-listrik.png', 'name' => 'Teknik Kelistrikan'],
                        ['img' => 'jurusan-elektro.png', 'name' => 'Teknik Elektronika'],
                        ['img' => 'jurusan-dkv.png', 'name' => 'Desain Komunikasi Visual'],
                    ];
                @endphp
                @foreach ($jurusans as $jurusan)
                    <div class="jurusan-card card">
                        <img src="{{ asset('img/' . $jurusan['img']) }}" alt="{{ $jurusan['name'] }}">
                        <h4>{{ $jurusan['name'] }}</h4>
                    </div>
                @endforeach
            </div>
            <div class="section-cta">
                <a href="{{ route('jurusan') }}" class="btn btn-primary">Lihat Semua Jurusan</a>
            </div>
        </div>
    </section>

    <section class="berita-section section-padding">
        <div class="container">
            <h2 class="section-title">Berita & Kegiatan <span>Terbaru</span></h2>
            <div class="berita-grid">
                @forelse ($beritaTerbaru as $berita)
                    <a href="{{ route('berita.detail', $berita->id) }}" class="card-link">
                        {{-- Class .card sekarang memiliki struktur flex yang diatur di CSS --}}
                        <div class="card">
                            <img src="{{ asset($berita->gambar ?? 'img/berita-sample.png') }}" alt="{{ $berita->judul }}" class="card-img">
                            <div class="card-body">
                                {{-- Judul dan tanggal sekarang dibungkus div terpisah --}}
                                <div class="card-content">
                                    <h3 class="card-title">{{ Str::limit($berita->judul, 60) }}</h3>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text"><small>{{ $berita->tanggal ? $berita->tanggal->translatedFormat('d F Y') : '' }}</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-12">
                        <p class="text-center">Belum ada berita untuk ditampilkan.</p>
                    </div>
                @endforelse
            </div>
            <div class="section-cta">
                <a href="{{ route('berita') }}" class="btn btn-primary">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    {{-- ========================================================== --}}
    {{-- Galeri Section (Struktur Diperbarui) --}}
    {{-- ========================================================== --}}
    <section class="galeri-section section-padding">
        <div class="container" style="margin-bottom: 5rem;">
            <h2 class="section-title">Galeri Terbaru</h2>
            <div class="galeri-grid">
                @forelse ($galeriTerbaru as $item)
                    <div class="galeri-item">
                        <a href="{{ asset($item->gambar) }}" data-lightbox="beranda-gallery" data-title="{{ $item->judul }}">
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}">

                            {{-- Date Tag (TETAP ADA) --}}
                            <span class="date-tag">{{ $item->created_at->translatedFormat('d M') }}</span>

                            {{-- Overlay (SEKARANG DENGAN JUDUL) --}}
                            <div class="galeri-overlay">
                                <h4 class="overlay-title">{{ Str::limit($item->judul, 40) }}</h4>
                                <span class="overlay-icon"><i class="fas fa-search-plus"></i></span>
                            </div>
                        </a>
                    </div>
                @empty
                     <div class="col-12">
                        <p class="text-center">Belum ada foto di galeri untuk ditampilkan.</p>
                    </div>
                @endforelse
            </div>
            <div class="section-cta">
                <a href="{{ route('galeri') }}" class="btn btn-primary">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>
@endsection
