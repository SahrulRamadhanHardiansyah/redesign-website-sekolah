@extends('layouts.main')
@section('title', 'Ekstrakurikuler')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/ekstrakurikuler.css') }}">
@endsection

@section('content')
    <section class="ekskul-hero">
        <div class="hero-overlay">
            <h1>Ekstrakurikuler yang Mencetak<br>Bintang dan Prestasi</h1>
            <div class="hero-buttons">
                <a href="#prestasi" class="btn btn-secondary">Lihat Prestasi</a>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <h2 class="section-title"><span class="text-primary">Ekstrakurikuler</span> Sekolah</h2>
            <div class="ekskul-grid">
                @foreach($ekskul as $item)
                <a href="{{ route('ekstrakurikuler.detail', $item['slug']) }}" class="ekskul-card">
                    <img src="{{ asset($item['gambar']) }}" alt="{{ $item['nama'] }}">
                    <div class="ekskul-title">
                        <h3>{{ $item['nama'] }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection