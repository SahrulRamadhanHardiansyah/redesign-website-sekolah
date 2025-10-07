@extends('layouts.main')

@section('title', 'Beranda - SMKN 1 Bangil')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endsection

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>SMKN 1 Bangil: Mencetak Generasi Unggul</h1>
            <p>Bergabunglah dengan kami untuk meraih masa depan cerah melalui pendidikan vokasi yang berkualitas dan relevan dengan industri.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-secondary">Lihat Berita</a>
                <a href="#" class="btn btn-primary btn-cta">Cek Info SPMB 2025</a>
            </div>
        </div>
    </section>

    <section class="fakta-sekolah section-padding">
        <div class="container">
            <h2 class="section-title">Fakta <span>SMKN 1 Bangil</span></h2>
            <div class="fakta-grid">
                <div class="fakta-card">
                    <h3>1200+</h3>
                    <p>Jumlah Siswa</p>
                </div>
                <div class="fakta-card">
                    <h3>9</h3>
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

    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Jurusan</h2>
            <div class="grid-4">
                 @php
                    $jurusans = [
                        ['img' => 'jurusan-pplg.png', 'name' => 'Pengembangan Perangkat Lunak'],
                        ['img' => 'jurusan-listrik.png', 'name' => 'Teknik Kelistrikan'],
                        ['img' => 'jurusan-elektro.png', 'name' => 'Teknik Elektronika'],
                        ['img' => 'jurusan-dkv.png', 'name' => 'Desain Komunikasi Visual'],
                    ];
                @endphp
                @foreach($jurusans as $jurusan)
                <div class="jurusan-card card">
                    <img src="{{ asset('img/' . $jurusan['img']) }}" alt="{{ $jurusan['name'] }}">
                    <h4>{{ $jurusan['name'] }}</h4>
                </div>
                @endforeach
            </div>
             <div style="text-align: center; margin-top: 40px;">
                <a href="#" class="btn btn-primary">Lihat Semua Jurusan</a>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: var(--light-gray-color);">
        <div class="container">
            <h2 class="section-title">Berita & Kegiatan <span>Terbaru</span></h2>
            <div class="grid-4">
                @for ($i = 0; $i < 4; $i++)
                <div class="card">
                    <img src="{{ asset('img/berita-sample.png') }}" alt="Judul Berita" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Siswa SMKN 1 Bangil Juara Lomba Kompetensi Tingkat Nasional</h3>
                        <p class="card-text"><small>18 Mei 2025 | Akademik</small></p>
                    </div>
                </div>
                @endfor
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <a href="#" class="btn btn-primary">Lihat Semua</a>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Galeri</h2>
            <div class="galeri-grid">
                <div class="galeri-item">
                    <img src="{{ asset('img/galeri-1.png') }}" alt="Galeri 1">
                    <span class="date-tag">5 September</span>
                </div>
                <div class="galeri-item">
                    <img src="{{ asset('img/galeri-1.png') }}" alt="Galeri 2">
                    <span class="date-tag">23 Juni</span>
                </div>
                <div class="galeri-item">
                    <img src="{{ asset('img/galeri-1.png') }}" alt="Galeri 3">
                    <span class="date-tag">23 Juni</span>
                </div>
                <div class="galeri-item">
                    <img src="{{ asset('img/galeri-1.png') }}" alt="Galeri 4">
                    <span class="date-tag">22 Mei</span>
                </div>
                <div class="galeri-item">
                    <img src="{{ asset('img/galeri-1.png') }}" alt="Galeri 5">
                    <span class="date-tag">21 April</span>
                </div>
            </div>
             <div style="text-align: center; margin-top: 40px;">
                <a href="#" class="btn btn-primary">Lihat Semua</a>
            </div>
        </div>
    </section>
    
@endsection