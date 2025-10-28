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
                    <h2 class="section-title">Berita <span class="highlight">Terbaru</span></h2>
                    <a href="{{ route('berita') }}" class="btn-see-all">Lihat semua <i
                            class="bi bi-arrow-right-short"></i></a>
                </div>
                <div class="berita-grid-3"> 
                    @php
                        $beritaUtama = array_slice($beritaList, 0, 3, true);
                    @endphp

                    @foreach ($beritaUtama as $berita)
                        <a href="{{ route('berita.detail', $berita->id) }}" class="berita-card-link">
                            <div class="berita-card">
                                <div class="card-image">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
                                    <span class="card-badge">{{ $berita->kategori }}</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">{{ $berita->judul }}</h3>
                                    <div class="card-meta">
                                        <i class="bi bi-calendar"></i>{{ $berita->tanggal }}
                                    </div>
                                    <p class="card-excerpt">{{ $berita->excerpt }}</p>

                                    <span class="btn-read-more">
                                        Baca Selengkapnya
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
