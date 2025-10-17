<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap - SMKN 1 Bangil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .back-button {
            position: absolute;
            left: 6rem;
            top: 50px; 
            z-index: 10;
            width: 48px;
            height: 48px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-color);
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background: #f1f1f1;
            transform: translateX(-3px);
        }

        .sitemap-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        h1 {
            color: var(--dark-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        h2 {
            color: var(--dark-color);
            font-size: 1.5rem;
            margin-top: 30px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-color);
            padding-left: 10px;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: var(--text-color);
            transition: color 0.3s ease;
        }
        a:hover {
            color: var(--primary-color);
        }
        .main-list > li > a {
            font-weight: 600;
        }
        .sub-list {
            padding-left: 30px;
            margin-top: 10px;
            border-left: 2px solid #e0e0e0;
        }
        .sub-list li {
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .back-button {
                left: 1rem;
                top: 25px;
            }
        }

        @media (max-width: 576px) {
            .back-button {
                top: 15px;
            }
        }
    </style>
</head>
<body>

<a href="{{ route('beranda') }}" class="back-button">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</a>

<div class="sitemap-container">
    <h1>Sitemap Website</h1>

    <h2><a href="{{ route('beranda') }}">Halaman Utama</a></h2>

    <h2>Profil & Data Sekolah</h2>
    <ul class="main-list">
        <li><a href="{{ route('profil') }}">Profil Sekolah</a></li>
        <li><a href="{{ route('SambutanKepsek') }}">Sambutan Kepala Sekolah</a></li>
        <li><a href="{{ route('data.pendidik') }}">Data Pendidik (Guru)</a></li>
        <li><a href="{{ route('data.tenaga_kependidikan') }}">Data Tenaga Kependidikan</a></li>
        <li><a href="{{ route('data.siswa') }}">Data Siswa</a></li>
    </ul>

    <h2>Jurusan</h2>
    <ul class="main-list">
        <li>
            <a href="{{ route('jurusan') }}">Semua Jurusan</a>
            <ul class="sub-list">
                @foreach(App\Data\JurusanData::all() as $jurusan)
                    <li><a href="{{ route('jurusan.detail', ['slug' => $jurusan['slug']]) }}">{{ $jurusan['nama'] }} ({{ $jurusan['singkatan'] }})</a></li>
                @endforeach
            </ul>
        </li>
    </ul>

    <h2>Kesiswaan</h2>
    <ul class="main-list">
        <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
        <li>
            <a href="{{ route('ekstrakurikuler') }}">Semua Ekstrakurikuler</a>
            <ul class="sub-list">
                @foreach(App\Data\EkstrakurikulerData::getAll() as $ekskul)
                    <li><a href="{{ route('ekstrakurikuler.detail', ['ekstrakurikuler' => $ekskul['slug']]) }}">{{ $ekskul['nama'] }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>

    <h2>Informasi & Publikasi</h2>
    <ul class="main-list">
        <li><a href="{{ route('galeri') }}">Galeri</a></li>
        <li>
            <a href="{{ route('berita') }}">Semua Berita</a>
            <ul class="sub-list">
                 @foreach(App\Data\BeritaData::getAll() as $berita)
                    <li><a href="{{ route('berita.detail', ['id' => $berita->id]) }}">{{ $berita->judul }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
    
    <h2>Penerimaan Siswa & Kontak</h2>
    <ul class="main-list">
        <li><a href="{{ route('spmb') }}">SPMB (Seleksi Penerimaan Murid Baru)</a></li>
        <li><a href="{{ route('kontak') }}">Kontak</a></li>
    </ul>

</div>

</body>
</html> 