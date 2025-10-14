@extends('layouts.main')
@section('title', $ekskul['nama'])

@section('style')
    <link rel="stylesheet" href="{{ asset('css/ekstrakurikuler-detail.css') }}">
@endsection

@section('content')
    <!-- Hero Section with Back Button -->
    <section class="ekskul-detail-hero">
        <div class="hero-content">
            <a href="{{ route('ekstrakurikuler') }}" class="back-button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <h1>Ekstrakurikuler <span class="text-primary">{{ $ekskul['nama'] }}</span></h1>
            <p class="hero-subtitle">{{ $ekskul['deskripsi_singkat'] }}</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="ekskul-detail-content">
        <div class="container">
            <!-- Logo & Intro Section -->
            <div class="intro-section">
                <div class="logo-container">
                    <img src="{{ asset($ekskul['gambar']) }}" alt="{{ $ekskul['nama'] }}">
                </div>
                
                <div class="intro-text">
                    <p class="deskripsi-singkat">{{ $ekskul['deskripsi_singkat'] }}</p>
                    
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Pembina</div>
                                <div class="info-value">{{ $ekskul['pembina'] }}</div>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Jadwal Latihan</div>
                                <div class="info-value">{{ $ekskul['jadwal'] }}</div>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Tempat</div>
                                <div class="info-value">{{ $ekskul['tempat'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Lengkap -->
            <div class="section-box">
                <h2 class="section-title">Tentang {{ $ekskul['nama'] }}</h2>
                <p class="section-text">{{ $ekskul['deskripsi_lengkap'] }}</p>
            </div>

            <!-- Tujuan Pembinaan -->
            <div class="section-box">
                <h2 class="section-title">Tujuan Pembinaan dan Pengembangan</h2>
                <ul class="tujuan-list">
                    @foreach($ekskul['tujuan'] as $tujuan)
                    <li>{{ $tujuan }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Kegiatan -->
            <div class="section-box">
                <h2 class="section-title">Kegiatan <span class="text-primary">{{ $ekskul['nama'] }}</span></h2>
                <div class="kegiatan-grid">
                    @foreach($ekskul['kegiatan'] as $kegiatan)
                    <div class="kegiatan-card">
                        <h3 class="kegiatan-title">{{ $kegiatan['judul'] }}</h3>
                        <p class="kegiatan-desc">{{ $kegiatan['deskripsi'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection