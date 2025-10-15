@extends('layouts.main')

@section('title', 'Kontak')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
@endsection
@section('content')
<!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <h1>Hubungi <span class="highlight">Kami</span></h1>
            <p>Kami siap melayani dan menjawab pertanyaan Anda. Jangan ragu untuk menghubungi kami melalui berbagai saluran komunikasi yang tersedia.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="content-grid">
                <!-- Contact Information Cards -->
                <div class="contact-cards">
                    <!-- Lokasi -->
                    <div class="contact-card">
                        <div class="card-content">
                            <div class="card-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="card-info">
                                <h3>Lokasi Sekolah</h3>
                                <p>
                                    Jl. Tongkol No. 03, Bangil<br>
                                    Kabupaten Pasuruan
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-card">
                        <div class="card-content">
                            <div class="card-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="card-info">
                                <h3>Email</h3>
                                <a href="mailto:smknesaba@yahoo.com">mailto:smknesaba@yahoo.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="contact-card">
                        <div class="card-content">
                            <div class="card-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                </svg>
                            </div>
                            <div class="card-info">
                                <h3>Media Sosial</h3>
                                <div class="social-links">
                                    <a href="https://www.instagram.com/smknegeri1bangil?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="social-link">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                        <span>@smkn1bangil</span>
                                    </a>
                                    <a href="https://www.facebook.com/SMKN1BANGIL" target="_blank" class="social-link">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                        <span>SMKN 1 Bangil</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4073.2020970487715!2d112.78934677500305!3d-7.600521292414385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7db438ee02df7%3A0x3446ff648b366c48!2sSMK%20Negeri%201%20Bangil!5e1!3m2!1sid!2sid!4v1759812072663!5m2!1sid!2sid"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Kritik & Saran Form -->
            <div class="form-section">
                <div class="form-header">
                    <h2>Kritik & <span class="highlight">Saran</span></h2>
                    <p>Masukan Anda sangat berarti bagi kami untuk terus berkembang dan memberikan pelayanan terbaik</p>
                </div>

                <!-- Success Alert (hidden by default, show with PHP/JavaScript) -->
                <!-- <div class="alert-success">
                    <p><strong>Terima kasih!</strong> Pesan Anda telah kami terima.</p>
                </div> -->

                <form action="" method="POST" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" placeholder="nama@example.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjek">Subjek <span class="required">*</span></label>
                        <input type="text" id="subjek" name="subjek" placeholder="Subjek pesan Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan <span class="required">*</span></label>
                        <textarea id="pesan" name="pesan" placeholder="Tuliskan kritik dan saran Anda..." required></textarea>
                    </div>

                    <div class="submit-container">
                        <button type="submit" class="submit-btn">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span>Kirim Pesan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection