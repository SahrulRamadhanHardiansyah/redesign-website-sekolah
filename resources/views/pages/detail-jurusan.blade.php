@extends('layouts.main')

@section('title', $jurusan['nama'] . ' - SMKN 1 Bangil')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/profilJurusan.css') }}">
@endsection

@section('content')
    <div class="profil-container">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="breadcrumb-nav">
                <a href="/">Beranda</a>
                <span class="separator">/</span>
                <a href="/jurusan">Jurusan</a>
                <span class="separator">/</span>
                <span class="current">{{ $jurusan['nama'] }}</span>
            </div>

            <!-- Hero Section -->
            <div class="profil-hero">
                <div class="hero-image">
                    <img src="{{ asset('img/' . $jurusan['logo']) }}" alt="{{ $jurusan['nama'] }}">
                </div>
                <div class="hero-content">
                    <h1 class="school-name">{{ $jurusan['nama'] }}</h1>
                    <div class="jurusan-badge">{{ $jurusan['singkatan'] }}</div>
                    <p class="school-description">{{ $jurusan['deskripsi'] }}</p>
                </div>
            </div>

            <!-- Kompetensi Section -->
            <div class="identitas-section">
                <h2 class="section-subtitle">Kompetensi yang Dipelajari</h2>
                <div class="kompetensi-grid">
                    @foreach ($jurusan['kompetensi'] as $index => $kompetensi)
                    <div class="kompetensi-card">
                        <div class="kompetensi-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <p class="kompetensi-text">{{ $kompetensi }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Peluang Kerja Section -->
            <div class="prestasi-section">
                <h2 class="section-subtitle">Peluang Kerja & Jabatan</h2>
                <div class="peluang-grid">
                    @foreach ($jurusan['peluang_kerja'] as $peluang)
                    <div class="peluang-card">
                        <div class="peluang-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h4>{{ $peluang }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA Section -->
            <div class="cta-section">
                <div class="cta-card">
                    <div class="cta-buttons">
                        <a href="/jurusan" class="btn btn-secondary">Lihat Jurusan Lain</a>
                        <a href="/spmb" class="btn btn-primary">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection