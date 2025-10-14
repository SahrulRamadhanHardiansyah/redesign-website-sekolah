@extends('layouts.main')

@section('title', 'Program Keahlian - SMKN 1 Bangil')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/jurusan.css') }}">
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">Jurusan</h1>
            <p><span>SMK Negeri 1 Bangil</span> menawarkan berbagai jurusan yang relevan dengan kebutuhan industri saat ini. Setiap jurusan dirancang untuk membekali siswa dengan ketreampilan dan pengetahuan yang dibutuhkan untuk sukses di dunia kerja.</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="jurusan-grid">
                @php
                    $jurusans = [
                        ['img' => 'jurusan-pplg.png', 'name' => 'Rekayasa Perangkat Lunak', 'desc' => 'Program studi ini memberikan pengetahuan tentang prinsip & teknik untuk membuat perangkat lunak.'],
                        ['img' => 'jurusan-tjkt.png', 'name' => 'Teknik Jaringan dan Telekomunikasi', 'desc' => 'Program studi ini memberikan pengetahuan, prinsip dan teknik tentang komputer dan jaringan.'],
                        ['img' => 'jurusan-perfilman.png', 'name' => 'Broadcasting dan Perfilman', 'desc' => 'Program studi ini mengajari prinsip & teknik tentang produksi siaran televisi, radio, dan pembuatan film.'],
                        ['img' => 'jurusan-mekatronika.png', 'name' => 'Mekatronika', 'desc' => 'Program studi ini mengajari prinsip & teknik ilmu mekanika, elektronika, dan informatika untuk automasi industri.'],
                        ['img' => 'jurusan-ototronik.png', 'name' => 'Ototronika', 'desc' => 'Program studi ini memberikan pengetahuan tentang ilmu elektronika dan otomotif modern.'],
                        ['img' => 'jurusan-busana.png', 'name' => 'Busana', 'desc' => 'Program studi ini mengajari teknik desain, pembuatan pola, hingga produksi busana berkualitas.'],
                        ['img' => 'jurusan-elektro.png', 'name' => 'Teknik Elektronika', 'desc' => 'Program studi ini mengajari prinsip dasar elektronika, perancangan sirkuit, dan instrumentasi.'],
                        ['img' => 'jurusan-listrik.png', 'name' => 'Teknik Listrik', 'desc' => 'Program studi ini mengajari prinsip & teknik instalasi, pemeliharaan, dan perbaikan sistem tenaga listrik.'],
                        ['img' => 'jurusan-dkv.png', 'name' => 'Desain Komunikasi Visual', 'desc' => 'Program studi ini mempelajari cara menyampaikan pesan secara visual melalui berbagai media kreatif.'],
                    ];      
                @endphp

                @foreach ($jurusans as $jurusan)
                <div class="jurusan-card-full">
                    <img src="{{ asset('img/' . $jurusan['img']) }}" alt="{{ $jurusan['name'] }}">
                    <h3>{{ $jurusan['name'] }}</h3>
                    <p>{{ $jurusan['desc'] }}</p>                                                                           
                    <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection