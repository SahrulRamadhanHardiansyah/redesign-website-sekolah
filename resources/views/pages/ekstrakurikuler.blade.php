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
                @php
                    $ekskul = [
                        ['img' => 'ekstrakurikuler/PMR.jpg', 'name' => 'Palang Merah Remaja (PMR)'],
                        ['img' => 'ekstrakurikuler/Pecinta-alam.jpg', 'name' => 'Pecinta Alam'],
                        ['img' => 'ekstrakurikuler/Pramuka.jpg', 'name' => 'Pramuka'],
                        ['img' => 'ekstrakurikuler/Paskibraka.webp', 'name' => 'Paskibra'],
                        ['img' => 'ekstrakurikuler/Futsal.jpg', 'name' => 'Futsal'],
                        ['img' => 'ekstrakurikuler/Musik.jpg', 'name' => 'Musik'],
                        ['img' => 'ekstrakurikuler/Voli.jpg', 'name' => 'Bola Voli'],
                        ['img' => 'ekstrakurikuler/Basket.jpg', 'name' => 'Basket'],
                        ['img' => 'ekstrakurikuler/ekskul-pickleball.png', 'name' => 'Pickleball'],
                        ['img' => 'ekstrakurikuler/Albanjari.jpeg', 'name' => 'Banjari'],
                        ['img' => 'ekstrakurikuler/Gateball.jpeg', 'name' => 'Gateball'],
                    ];
                @endphp

                @foreach($ekskul as $item)
                <div class="ekskul-card">
                    <img src="{{ asset('img/' . $item['img']) }}" alt="{{ $item['name'] }}">
                    <div class="ekskul-title">
                        <h3>{{ $item['name'] }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection