@extends('layouts.main')
@section('title', 'Prestasi Sekolah')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/prestasi.css') }}">
@endsection

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="prestasi-hero">
            <img src="{{ asset('img/prestasi-hero.png') }}" alt="Siswa Berprestasi">
            <div class="prestasi-hero-content">
                <h1>Prestasi SMKN 1 Bangil</h1>
                <p>SMK Negeri 1 Bangil terus mencetak prestasi gemilang di berbagai bidang, baik akademik maupun non-akademik.</p>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Daftar <span>Prestasi Terbaru</span></h2>
        <table class="prestasi-table">
            <thead>
                <tr>
                    <th>Prestasi</th>
                    <th>Deskripsi</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juara 2 Lomba Debat Bahasa Inggris</td>
                    <td>Tim debat SMKN 1 Bangil meraih juara 2 dalam lomba debat bahasa Inggris tingkat kabupaten.</td>
                    <td>2023</td>
                </tr>
                <tr>
                    <td>Penghargaan Sekolah Adiwiyata Mandiri</td>
                    <td>SMKN 1 Bangil mendapatkan penghargaan sebagai sekolah Adiwiyata Mandiri atas komitmennya terhadap lingkungan.</td>
                    <td>2022</td>
                </tr>
                 <tr>
                    <td>Juara 3 Lomba Desain Grafis</td>
                    <td>Siswa SMKN 1 Bangil meraih juara 3 dalam lomba desain grafis tingkat provinsi.</td>
                    <td>2021</td>
                </tr>
                 <tr>
                    <td>Medali Perunggu Olimpiade Matematika</td>
                    <td>Siswa berhasil meraih medali perunggu dalam olimpiade matematika tingkat nasional.</td>
                    <td>2020</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection