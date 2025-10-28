@extends('layouts.main')

@section('title', 'Program Keahlian - SMKN 1 Bangil')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/jurusan.css') }}">
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">Jurusan</h1>
            <p><span>SMK Negeri 1 Bangil</span> menawarkan berbagai jurusan yang relevan dengan kebutuhan industri saat ini. Setiap jurusan dirancang untuk membekali siswa dengan keterampilan dan pengetahuan yang dibutuhkan untuk sukses di dunia kerja.</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="jurusan-grid">
                @foreach ($jurusans as $jurusan)
                <div class="jurusan-card-full">
                    <img src="{{ asset('img/jurusan/' . $jurusan['logo']) }}" alt="{{ $jurusan['nama'] }}">
                    <h3>{{ $jurusan['nama'] }}</h3>
                    <p>{{ $jurusan['deskripsi'] }}</p>                                                                           
                    <a href="{{ route('jurusan.detail', $jurusan['slug']) }}" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection