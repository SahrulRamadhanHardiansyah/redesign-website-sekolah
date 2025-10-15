@extends('layouts.main')
@section('title', $ekskul->nama)

@section('style')
    <link rel="stylesheet" href="{{ asset('css/ekstrakurikuler-detail.css') }}">
@endsection

@section('content')
    <section class="ekskul-detail-hero">
        <a href="{{ route('ekstrakurikuler') }}" class="back-button">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <div class="hero-content">
            <h1>Ekstrakurikuler <span class="text-primary">{{ $ekskul->nama }}</span></h1>
        </div>
    </section>

    <section class="ekskul-detail-content">
        <div class="container">
            <div class="logo-container-detail">
                <img src="{{ asset($ekskul->gambar) }}" alt="Logo {{ $ekskul->nama }}">
            </div>

            {{-- Render konten Markdown di sini --}}
            <div class="markdown-content">
                {!! \Parsedown::instance()->text($ekskul->deskripsi) !!}
            </div>
        </div>
    </section>
@endsection