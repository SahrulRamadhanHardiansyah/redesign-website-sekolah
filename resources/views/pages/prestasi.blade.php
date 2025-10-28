@extends('layouts.main')
@section('title', 'Prestasi Sekolah')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/prestasi.css') }}">
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title">Prestasi <span>SMKN 1 Bangil</span></h1>
    </div>
</div>

<section class="section-padding" style="margin-bottom: 5rem;">
    <div class="container">

        <div class="prestasi-highlight-grid">
            @forelse ($highlights as $item)
            <div class="highlight-item {{ $loop->first ? 'main-highlight' : 'side-highlight' }}">
                <img src="{{ asset($item->gambar ?? 'img/prestasi/prestasi-hero.png') }}" alt="{{ $item->judul }}">
                <div class="date-tag">{{ $item->tanggal ? $item->tanggal->format('d F') : '' }}</div>
                <div class="highlight-overlay">
                    @if ($loop->first)
                        <p>{{ $item->deskripsi }}</p>
                    @else
                        <h4>{{ $item->judul }}</h4>
                    @endif
                </div>
            </div>
            @empty
                <p>Belum ada prestasi unggulan yang ditampilkan.</p>
            @endforelse
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Daftar <span>Prestasi Terbaru</span></h2>
        <div class="prestasi-list">
            <div class="prestasi-list-header">
                <div class="header-col">Prestasi</div>
                <div class="header-col">Deskripsi</div>
                <div class="header-col">Tahun</div>
            </div>

            @foreach ($achievements as $ach)
            <div class="prestasi-item">
                <div class="prestasi-title" data-label="Prestasi">{{ $ach->judul }}</div>
                <div class="prestasi-desc" data-label="Deskripsi">{{ $ach->deskripsi }}</div>
                <div class="prestasi-year" data-label="Tahun">{{ $ach->tahun }}</div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection