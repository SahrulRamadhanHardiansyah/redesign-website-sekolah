@extends('layouts.main')
@section('title', 'Profil Sekolah')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/profilSekolah.css') }}">
@endsection

@section('content')
    <div class="profil-container">
        <div class="container">
            <h1 class="page-title">Profil Sekolah</h1>

            <!-- Hero Section -->
            <div class="profil-hero">
                <div class="hero-image">
                    <img src="{{ asset('img/profil/headerProfil.png') }}" alt="Gedung SMKN 1 Bangil">
                </div>
                <div class="hero-content">
                    <h2 class="school-name">SMK Negeri 1 Bangil</h2>
                    <p class="school-description">SMK Negeri 1 Bangil adalah sekolah menengah kejuruan terkemuka yang berkomitmen menyelenggarakan pendidikan berkualitas dan membina para profesional muda. Visi kami adalah "Terwujudnya lulusan yang unggul berkompetensi kejuruan dibidang Teknologi Informasi, Akuntansi dan Kuliner yang berakhlak mulia dengan menanamkan nilai-nilai Pancasila sampai dengan tahun 2027." Kami membangkitkan masa depan dan minta lulusan kami akui atas keahlian, inovasi, dan perilaku etis mereka.</p>
                </div>
            </div>

            <!-- Identitas Sekolah -->
            <div class="identitas-section">
                <h3 class="section-subtitle">Identitas sekolah</h3>
                <table class="identitas-table">
                    <tr>
                        <td class="label-col">Nama Sekolah</td>
                        <td class="value-col">SMK Negeri 1 Bangil</td>
                        <td class="label-col">No. Telp</td>
                        <td class="value-col">+62 343-746-144</td>
                    </tr>
                    <tr>
                        <td class="label-col">Alamat</td>
                        <td class="value-col">Jl. Tongkol No. 3, Bangil, Kab. Pasuruan, Jawa Timur</td>
                        <td class="label-col">Email</td>
                        <td class="value-col">smknesaba@yahoo.com</td>
                    </tr>
                    <tr>
                        <td class="label-col">NPSN</td>
                        <td class="value-col">20582278</td>
                        <td class="label-col">Siswa</td>
                        <td class="value-col">± 2000</td>
                    </tr>
                </table>
            </div>

            <!-- Sejarah -->
            <div class="sejarah-section">
                <h3 class="section-subtitle">Sejarah</h3>
                <p class="sejarah-text">
                    <span class="highlight-link">SMK Negeri 1 Bangil</span> didirikan pada <strong>16 Mei tahun 1997</strong> sebagai Sekolah Menengah Kejuruan (SMK) pertama di wilayah Bangil. Sejak awal sekolah ini berfokus pada pendidikan kejuruan berkualitas yang relevan dengan industri. Seiring berjalannya waktu, <span class="highlight-link">SMK Negeri 1 Bangil</span> telah berkembang menjadi salah satu SMK unggulan di Jawa Timur, dengan berbagai program keahlian yang diminati oleh siswa dari berbagai daerah.
                </p>
            </div>

            <!-- Prestasi -->
            <div class="prestasi-section">
                <h3 class="section-subtitle">Prestasi</h3>
                <div class="prestasi-grid">
                    <div class="prestasi-card">
                        <img src="{{ asset('img/profil/profilPrestasi1.png') }}" alt="Desain Grafis">
                        <h4>Desain Grafis – Juara 3 Contest 2025 UNSIDA</h4>
                    </div>
                    <div class="prestasi-card">
                        <img src="{{ asset('img/profil/profilPrestasi2.png') }}" alt="O2SN Karate">
                        <h4>O2SN Kabupaten Pasuruan – Harapan 1 Cabor Karate</h4>
                    </div>
                    <div class="prestasi-card">
                        <img src="{{ asset('img/profil/profilPrestasi3.png') }}" alt="Bola Voli">
                        <h4>KACABON CUP 2025 – Juara 3 Bola Voli</h4>
                    </div>
                </div>
                <button class="btn-lihat-semua">Lihat Semua</button>
            </div>

            <!-- Struktur Organisasi -->
            <div class="struktur-section">
                <h3 class="section-subtitle">Struktur Organisasi</h3>

                <!-- Kepala Sekolah -->
                <div class="kepala-sekolah-card">
                    <img src="{{ asset('img/profil/Kepsek.png') }}" alt="Kepala Sekolah">
                    <div class="kepala-info">
                        <p class="kepala-jabatan">Kepala Sekolah</p>
                        <p class="kepala-nama">Bapak A. Syamsul Hadi, S.Pd, M.Si</p>
                    </div>
                </div>

                <!-- Wakil Kepala Sekolah -->
                <div class="wakil-grid">
                    <div class="wakil-card">
                        <img src="{{ asset('img/profil/Waka1.png') }}" alt="Wakil Kepala Sekolah">
                        <h5>Wakil Kepala Sekolah Bidang Kurikulum</h5>
                        <p>Bapak  Budi Irawan, M.Com </p>
                    </div>
                    <div class="wakil-card">
                        <img src="{{ asset('img/profil/Waka1.png') }}" alt="Wakil Kepala Sekolah">
                        <h5>Wakil Kepala Sekolah Bidang Kesiswaan</h5>
                        <p>Bapak Haqiqi Mufassir, S.Mat </p>
                    </div>
                    <div class="wakil-card">
                        <img src="{{ asset('img/profil/Waka2.png') }}" alt="Wakil Kepala Sekolah">
                        <h5>Wakil Kepala Sekolah Bidang Sarana dan Prasarana</h5>
                        <p>Bapak Muhaimin S.Pd.</p>
                    </div>
                    <div class="wakil-card">
                        <img src="{{ asset('img/profil/Waka1.png') }}" alt="Wakil Kepala Sekolah">
                        <h5>Wakil Kepala Sekolah Bidang Sarana dan Prasarana</h5>
                        <p>Bapak Damanhuri ST, M.Pd</p>
                    </div>
                </div>
            </div>

            <!-- Lokasi -->
            <div class="lokasi-section">
                <h3 class="section-subtitle">Lokasi</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4073.2020970487715!2d112.78934677500305!3d-7.600521292414385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7db438ee02df7%3A0x3446ff648b366c48!2sSMK%20Negeri%201%20Bangil!5e1!3m2!1sid!2sid!4v1759812072663!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
    </div>
@endsection
