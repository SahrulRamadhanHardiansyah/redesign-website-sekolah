<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 1 Bangil')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="container">
            <a href="/" class="navbar-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo SMKN 1 Bangil">
            </a>
            <nav class="navbar-nav">
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ route('profil') }}">Profil</a></li>
                    <li><a href="{{ route('jurusan') }}">Jurusan</a></li>
                    <li><a href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('berita') }}">Berita Sekolah</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                    <li><a href="#">GTK & SISWA</a></li>
                    <li><a href="{{ route('spmb') }}" class="btn btn-primary">SPMB</a></li>
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
                    <img src="{{ asset('img/logo-footer.png') }}" alt="Logo Footer SMKN 1 Bangil" class="footer-logo">
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                        <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="#"><i class="fab fa-youtube"></i> YouTube</a>
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
                    <h4>Program Keahlian</h4>
                    <ul>
                        <li><a href="#">PPLG</a></li>
                        <li><a href="#">TJKT</a></li>
                        <li><a href="#">Listrik</a></li>
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

</body>
</html>