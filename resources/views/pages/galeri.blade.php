@extends('layouts.main')
@section('title', 'Galeri & Kegiatan')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endsection


@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="section-title">Galeri & <span>Kegiatan</span></h1>
        <p>Jelajahi momen-momen berharga dan prestasi dari berbagai kegiatan di SMK Negeri 1 Bangil.</p>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div class="grid-3">
             {{-- @for ($i = 0; $i < 12; $i++) --}}
             <div class="galeri-item" style="height: 250px;">
                <img src="{{ asset('img/galeri-1.png') }}" alt="Foto Kegiatan {{ $i + 1 }}">
             </div>
             {{-- @endfor --}}
        </div>
    </div>
</section>
@endsection