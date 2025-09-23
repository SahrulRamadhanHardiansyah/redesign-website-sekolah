@extends('layouts.main')
@section('title', 'Detail Berita')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="detail-berita-container">
            <h1 class="detail-berita-title">Sosialisasi SPMB SMKN 1 Bangil kepada Guru SMP/Sederajat</h1>
            <p class="detail-berita-meta">Diposting pada 6 Mei 2025 oleh Ahmad Rafi</p>
            <img src="{{ asset('img/detail-berita.png') }}" alt="Sosialisasi SPMB" class="detail-berita-img">
            
            <div class="detail-berita-content">
                <p><strong>SMK Negeri 1 Bangil</strong> telah meraih penghargaan bergengsi sebagai Sekolah Adiwiyata Tingkat Nasional. Penghargaan ini diberikan sebagai pengakuan atas komitmen sekolah dalam menjaga lingkungan hidup dan menerapkan prinsip-prinsip pembangunan berkelanjutan dalam kegiatan sehari-hari.</p>
                <p>Kepala Sekolah, Bapak Budi Santoso, menyampaikan rasa syukur dan bangganya atas pencapaian ini. "Penghargaan ini adalah hasil kerja keras seluruh warga sekolah — mulai dari siswa, guru, hingga staf. Kami terus berupaya menciptakan lingkungan belajar yang hijau, bersih, dan sehat," ujarnya.</p>
                <p>Dengan diraihnya penghargaan ini, <strong>SMK Negeri 1 Bangil</strong> semakin termotivasi untuk terus meningkatkan upaya pelestarian lingkungan dan menjadi contoh bagi sekolah-sekolah lain di Indonesia. "Kami berharap dapat menginspirasi generasi muda untuk lebih peduli terhadap lingkungan dan berkontribusi dalam menjaga kelestarian alam," tambah Bapak Budi.</p>
            </div>
        </div>

        <div class="berita-lainnya" style="margin-top: 80px;">
            <h2 class="section-title">Berita <span>Lainnya</span></h2>
            <div class="grid-3">
                @for ($i = 0; $i < 3; $i++)
                <div class="card">
                    <img src="{{ asset('img/berita-sample.png') }}" alt="Judul Berita" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">SMK Negeri 1 Bangil Gelar Acara Peringatan Hari Pendidikan Nasional</h3>
                        <a href="#" class="btn btn-secondary">Lihat Berita</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</section>
@endsection