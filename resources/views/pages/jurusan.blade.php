@extends('layouts.main')

@section('title', 'Program Keahlian - SMKN 1 Bangil')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">Program <span>Keahlian</span></h1>
            <p>SMK Negeri 1 Bangil menawarkan berbagai jurusan yang relevan dengan kebutuhan industri saat ini.</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="jurusan-grid">
                @php
                    $jurusans = [
                        ['img' => 'jurusan-pplg.png', 'name' => 'Rekayasa Perangkat Lunak', 'desc' => 'Mempelajari pengembangan dan pemeliharaan perangkat lunak secara sistematis.'],
                        ['img' => 'jurusan-tjkt.png', 'name' => 'Teknik Komputer & Jaringan', 'desc' => 'Berfokus pada perancangan, instalasi, dan pemeliharaan sistem jaringan komputer.'],
                        ['img' => 'jurusan-perfilman.png', 'name' => 'Broadcasting dan Perfilman', 'desc' => 'Mempelajari teknik produksi siaran televisi, radio, dan pembuatan film.'],
                        ['img' => 'jurusan-mekatronika.png', 'name' => 'Mekatronika', 'desc' => 'Gabungan disiplin ilmu mekanika, elektronika, dan informatika untuk automasi industri.'],
                        ['img' => 'jurusan-ototronik.png', 'name' => 'Ototronik', 'desc' => 'Fokus pada teknologi elektronik yang diterapkan dalam sistem otomotif modern.'],
                        ['img' => 'jurusan-busana.png', 'name' => 'Busana', 'desc' => 'Mempelajari desain, pembuatan pola, hingga produksi busana berkualitas.'],
                        ['img' => 'jurusan-elektro.png', 'name' => 'Teknik Elektronika', 'desc' => 'Mempelajari prinsip dasar elektronika, perancangan sirkuit, dan instrumentasi.'],
                        ['img' => 'jurusan-listrik.png', 'name' => 'Teknik Listrik', 'desc' => 'Fokus pada instalasi, pemeliharaan, dan perbaikan sistem tenaga listrik.'],
                        ['img' => 'jurusan-dkv.png', 'name' => 'Desain Komunikasi Visual', 'desc' => 'Mempelajari cara menyampaikan pesan secara visual melalui berbagai media kreatif.'],
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