<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 1 Bangil')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    @yield('style')
</head>

<body>

    <header class="navbar">
        <div class="container">
            <a href="/" class="navbar-logo">
                <img src="{{ asset('img/logo-navbar.png') }}" alt="Logo SMKN 1 Bangil">
            </a>

            <nav class="navbar-nav">
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <!-- Dropdown Profil -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profil') }}">Profil</a></li>
                            <li><a href="{{ route('jurusan') }}">Jurusan</a></li>
                            <li><a href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Berita Sekolah -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Berita Sekolah</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('berita') }}" class="dropdown-toggle">Berita Sekolah</a></li>
                            <li><a href="{{ route('galeri') }}">Galeri</a></li>
                            <li><a href="#">Pengumuman</a></li>
                            <li><a href="#">Kegiatan</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown GTK & SISWA -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Gtk & Siswa</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Data Pendidik</a></li>
                            <li><a href="#">Data Tenaga Kependidikan</a></li>
                            <li><a href="#">Data Siswa</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown fitur & app -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Fitur & App</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Smart BKK</a></li>
                            <li><a href="#">Sertifikat Profesi</a></li>
                            <li><a href="#">CBT Online</a></li>
                            <li><a href="#">Peta Situs</a></li>
                        </ul>
                    </li>


                    <li><a href="{{ route('spmb') }}" class="spmb-btn">SPMB</a></li>
                </ul>

            </nav>

            <div class="navbar-extra">
                <form action="#" class="search-form">
                    <input type="search" placeholder="Search">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </header>


    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-about">
                    <img src="{{ asset('img/footer/smk1bgl__1_-removebg-preview.png') }}"
                        alt="Logo Footer SMKN 1 Bangil" class="footer-logo">
                    <div class="social-links">
                        <a
                            href="https://www.instagram.com/smknegeri1bangil?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                                class="fab fa-instagram"></i> Instagram</a>
                        <a href="https://www.facebook.com/SMKN1BANGIL"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="https://youtube.com/@nesabatv?si=WKsjdBl-HNJeBO7c"><i class="fab fa-youtube"></i>
                            YouTube</a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Tentang Sekolah</h4>
                    <ul>
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Prestasi</a></li>
                        <li><a href="#">Berita</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Hubungi kami</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="https://wa.me/+6287743274606"><i class="fab fa-whatsapp"></i>
                                0343-744144</a></li>
                        <li><a href="mailto:smknesaba@yahoo.com"><i class="fas fa-envelope"></i>
                                smknesaba@yahoo.com</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>GTK & Siswa</h4>
                    <ul>
                        <li><a href="#">SPMB</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">Galeri</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="partner-logos">
                    <img src="{{ asset('img/logo-partner.png') }}" alt="Partner 1">
                </div>
                <p>&copy; 2025 SMK Negeri 1 Bangil. All rights reserved.</p>
            </div>
        </div>
    </footer>


    @yield('script')
</body>

</html>
