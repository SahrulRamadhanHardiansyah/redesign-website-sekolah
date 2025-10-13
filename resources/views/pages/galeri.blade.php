@extends('layouts.main')
@section('title', 'Galeri & Kegiatan')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" />
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title">Galeri & <span>Kegiatan</span></h1>
        <p>Jelajahi momen-momen berharga dan prestasi dari berbagai kegiatan di SMK Negeri 1 Bangil.</p>
    </div>
</div>

<section class="gallery-section section-padding" style="margin-bottom: 5rem;">
    <div class="container">

        <div class="gallery-controls">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="akademik">Akademik</button>
                <button class="filter-btn" data-filter="ekskul">Ekstrakurikuler</button>
                <button class="filter-btn" data-filter="lomba">Lomba</button>
                <button class="filter-btn" data-filter="acara">Acara Sekolah</button>
            </div>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="gallery-search" placeholder="Cari kegiatan...">
            </div>
        </div>

        @php
            $galleryItems = [
                ['image' => 'galeri-1.png', 'title' => 'Diskusi Kelompok Siswa', 'category' => 'akademik'],
                ['image' => 'galeri-1.png', 'title' => 'Kegiatan Pramuka', 'category' => 'ekskul'],
                ['image' => 'galeri-1.png', 'title' => 'Lomba Kompetensi Siswa', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Seminar Teknologi', 'category' => 'akademik'],
                ['image' => 'galeri-1.png', 'title' => 'Perayaan HUT Sekolah', 'category' => 'acara'],
                ['image' => 'galeri-1.png', 'title' => 'Latihan Paskibra', 'category' => 'ekskul'],
                ['image' => 'galeri-1.png', 'title' => 'Workshop Guru', 'category' => 'acara'],
                ['image' => 'galeri-1.png', 'title' => 'Olimpiade Sains', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Pameran Karya Siswa DKV', 'category' => 'akademik'],
                ['image' => 'galeri-1.png', 'title' => 'Class Meeting', 'category' => 'acara'],
                ['image' => 'galeri-1.png', 'title' => 'Ekskul Robotik', 'category' => 'ekskul'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
                ['image' => 'galeri-1.png', 'title' => 'Juara Turnamen Futsal', 'category' => 'lomba'],
            ];
        @endphp

        <div class="gallery-grid">
            @foreach ($galleryItems as $item)
            <div class="gallery-card" data-category="{{ $item['category'] }}">
                <a href="{{ asset('img/' . $item['image']) }}" data-lightbox="gallery" data-title="{{ $item['title'] }}">
                    <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['title'] }}">
                    <div class="overlay">
                        <h3 class="overlay-title">{{ $item['title'] }}</h3>
                        <p class="overlay-category">{{ ucfirst($item['category']) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="pagination-container"></div>

    </div>
</section>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="{{ asset('js/galeri.js') }}"></script>
@endsection
