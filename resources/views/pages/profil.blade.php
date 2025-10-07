@extends('layouts.main')
@section('title', 'Profil Sekolah')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/profilJurusan.css') }}">
@endsection

@section('content')
    <div class="profil-header">
        <div class="container">
            <h1 class="section-title">Profil <span>Sekolah</span></h1>
            <img src="{{ asset('img/foto-sekolah.png') }}" alt="Gedung SMKN 1 Bangil">
            <p>SMK Negeri 1 Bangil adalah lembaga pendidikan kejuruan terkemuka yang berkomitmen untuk membekali siswa dengan keterampilan dan pengetahuan yang relevan dengan kebutuhan industri. Misi kami adalah mencetak lulusan yang kompeten, inovatif, dan beretika.</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="profil-content">
                <div class="identitas-sekolah">
                    <h3>Identitas Sekolah</h3>
                    <table>
                        <tr>
                            <td>Nama Sekolah</td>
                            <td>: SMKN 1 Bangil</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: Jl. Gajah Mada No. 123, Bangil</td>
                        </tr>
                        <tr>
                            <td>No. Telp</td>
                            <td>: +62 343 1234567</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: info@smkn1bangil.sch.id</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>: smkn1bangil.sch.id</td>
                        </tr>
                         <tr>
                            <td>Siswa</td>
                            <td>: 1200</td>
                        </tr>
                    </table>
                </div>
                <div class="sejarah-sekolah">
                    <h3>Sejarah</h3>
                    <p>SMK Negeri 1 Bangil didirikan pada <strong>16 Mei tahun 1997</strong> sebagai Sekolah Menengah Kejuruan (SMK) pertama di wilayah Bangil yang fokus pada pengembangan teknologi dan rekayasa. Awalnya, sekolah ini hanya memiliki dua program keahlian yang disesuaikan dengan kebutuhan industri lokal.</p>
                    <p>Seiring berjalannya waktu, SMK Negeri 1 Bangil telah berkembang menjadi salah satu SMK unggulan di Jawa Timur, dengan berbagai program keahlian yang diminati oleh siswa dari berbagai daerah.</p>
                </div>
            </div>

            <h2 class="section-title" style="margin-top: 80px;">Struktur <span>Organisasi</span></h2>
            <div class="struktur-grid">
                <div class="struktur-card">
                    <img src="{{ asset('img/kepsek.png') }}" alt="Kepala Sekolah">
                    <h4>Bapak A. Syamsul Hadi, S.Pd, M.Si</h4>
                    <p>Kepala Sekolah</p>
                </div>
                </div>

             <h2 class="section-title" style="margin-top: 80px;">Lokasi</h2>
             <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.595995475253!2d112.80980607474267!3d-7.618698792383832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7cf0a6a096c4f%3A0x6b8f3a3f5b72f10b!2sSMK%20Negeri%201%20Bangil!5e0!3m2!1sen!2sid!4v1724930193892!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection