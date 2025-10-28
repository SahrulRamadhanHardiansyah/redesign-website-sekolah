@extends('layouts.main')
@section('title', $berita->judul . ' - Detail Berita')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
<section class="section-padding">
    <div class="container">
        <!-- Tombol Kembali -->
        <a href="{{ route('berita') }}" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Berita
        </a>

        <div class="detail-berita-container">
            <span class="detail-berita-category">{{ $berita->kategori }}</span>
            <h1 class="detail-berita-title">{{ $berita->judul }}</h1>
            <p class="detail-berita-meta">
                <i class="bi bi-calendar"></i> Diposting pada {{ $berita->tanggal }}
                <span style="margin: 0 10px;">•</span>
                <i class="bi bi-person"></i> oleh {{ $berita->penulis }}
            </p>
            <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="detail-berita-img">

            <div class="detail-berita-content">
                @foreach($berita->konten as $paragraf)
                    <p>{{ $paragraf }}</p>
                @endforeach
            </div>

            <!-- Bagikan Berita -->
            <div style="margin-top: 40px; padding-top: 30px; border-top: 2px solid #e5e7eb;">
                <p style="font-weight: 600; margin-bottom: 15px; color: var(--dark-color);">
                    <i class="bi bi-share" style="margin-right: 7px;"></i> Bagikan Berita:
                </p>
                <div style="display: flex; gap: 15px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" style="color: #1877f2; font-size: 1.5rem;"><i class="bi bi-facebook"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $berita->judul }}" target="_blank" style="color: #1da1f2; font-size: 1.5rem;"><i class="bi bi-twitter"></i></a>
                    <a href="https://wa.me/?text={{ $berita->judul }} {{ url()->current() }}" target="_blank" style="color: #25d366; font-size: 1.5rem;"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}&title={{ $berita->judul }}" target="_blank" style="color: #0077b5; font-size: 1.5rem;"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

        <div class="berita-lainnya" style="margin-top: 80px;">
            <div class="section-header"> 
                <h2 class="section-title">Berita <span class="highlight">Lainnya</span></h2>
            </div>
            <div class="berita-grid-3">
                @foreach($beritaLainnya as $item)
                    @if($item->id != $berita->id)
                    <div class="berita-card">
                        <div class="card-image">
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}">
                            <span class="card-badge">{{ $item->kategori }}</span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">{{ $item->judul }}</h3>
                            <div class="card-meta">
                                <i class="bi bi-calendar"></i>{{ $item->tanggal }}
                            </div>
                            <p class="card-excerpt">{{ $item->excerpt }}</p>
                            <a href="{{ route('berita.detail', $item->id) }}" class="btn-read-more">Baca Selengkapnya</a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
