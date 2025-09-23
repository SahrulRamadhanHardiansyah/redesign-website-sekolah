@extends('layouts.main')
@section('title', 'Ekstrakurikuler')

@section('content')
    <section class="ekskul-hero">
        <div class="hero-content">
            <h1>Ekstrakurikuler yang Mencetak<br>Bintang dan Prestasi</h1>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Ekstrakurikuler <span>Sekolah</span></h2>
            <div class="ekskul-grid">
                @php
                    $ekskul = [
                        ['img' => 'ekskul-pmr.png', 'name' => 'Palang Merah Remaja (PMR)'],
                        ['img' => 'ekskul-pecinta-alam.png', 'name' => 'Pecinta Alam'],
                        ['img' => 'ekskul-pramuka.png', 'name' => 'Pramuka'],
                        ['img' => 'ekskul-paskibra.png', 'name' => 'Paskibra'],
                        ['img' => 'ekskul-futsal.png', 'name' => 'Futsal'],
                        ['img' => 'ekskul-musik.png', 'name' => 'Musik'],
                        ['img' => 'ekskul-voli.png', 'name' => 'Bola Voli'],
                        ['img' => 'ekskul-basket.png', 'name' => 'Basket'],
                        ['img' => 'ekskul-pickleball.png', 'name' => 'Pickleball'],
                    ];
                @endphp

                @foreach($ekskul as $item)
                <div class="ekskul-card">
                    <img src="{{ asset('img/' . $item['img']) }}" alt="{{ $item['name'] }}">
                    <div class="overlay">
                        <h3>{{ $item['name'] }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection