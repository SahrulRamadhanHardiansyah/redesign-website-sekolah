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

        @php
            $highlights = [
                ['type' => 'main-highlight', 'image' => 'prestasi-hero.png', 'date' => '5 September', 'text' => 'SMK Negeri 1 Bangil terus mencetak prestasi gemilang di berbagai bidang, baik akademik maupun non-akademik.'],
                ['type' => 'side-highlight', 'image' => 'prestasi-hero.png', 'date' => '5 September', 'text' => 'Juara Lomba Debat'],
                ['type' => 'side-highlight', 'image' => 'prestasi-hero.png', 'date' => '5 September', 'text' => 'Olimpiade Sains Nasional'],
                ['type' => 'side-highlight', 'image' => 'prestasi-hero.png', 'date' => '5 September', 'text' => 'Lomba Kompetensi Siswa'],
            ];
        @endphp

        <div class="prestasi-highlight-grid">
            @foreach ($highlights as $item)
            <div class="highlight-item {{ $item['type'] }}">
                <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['text'] }}">
                <div class="date-tag">{{ $item['date'] }}</div>
                <div class="highlight-overlay">
                    @if ($item['type'] == 'main-highlight')
                        <p>{{ $item['text'] }}</p>
                    @else
                        <h4>{{ $item['text'] }}</h4>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Daftar <span>Prestasi Terbaru</span></h2>

        {{-- Data Prestasi (Dummy) --}}
        @php
            $achievements = [
                ['title' => 'Juara 2 Lomba Debat Bahasa Inggris', 'description' => 'Tim debat SMKN 1 Bangil meraih juara 2 dalam lomba debat bahasa Inggris tingkat kabupaten.', 'year' => '2025'],
                ['title' => 'Penghargaan Sekolah Adiwiyata Mandiri', 'description' => 'SMKN 1 Bangil mendapatkan penghargaan sebagai sekolah Adiwiyata Mandiri atas komitmennya terhadap lingkungan.', 'year' => '2024'],
                ['title' => 'Juara 3 Lomba Desain Grafis', 'description' => 'Siswa SMKN 1 Bangil meraih juara 3 dalam lomba desain grafis tingkat provinsi.', 'year' => '2023'],
                ['title' => 'Medali Perunggu Olimpiade Matematika', 'description' => 'Siswa berhasil meraih medali perunggu dalam olimpiade matematika tingkat nasional.', 'year' => '2022'],
                ['title' => 'Juara 1 Lomba Cipta Puisi', 'description' => 'Siswa SMKN 1 Bangil meraih juara 1 dalam lomba cipta puisi tingkat kabupaten.', 'year' => '2021'],
            ];
        @endphp

        <div class="prestasi-list">
            <div class="prestasi-list-header">
                <div class="header-col">Prestasi</div>
                <div class="header-col">Deskripsi</div>
                <div class="header-col">Tahun</div>
            </div>

            @foreach ($achievements as $ach)
            <div class="prestasi-item">
                <div class="prestasi-title" data-label="Prestasi">{{ $ach['title'] }}</div>
                <div class="prestasi-desc" data-label="Deskripsi">{{ $ach['description'] }}</div>
                <div class="prestasi-year" data-label="Tahun">{{ $ach['year'] }}</div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection