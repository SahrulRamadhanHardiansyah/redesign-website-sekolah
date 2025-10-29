@extends('layouts.main')

@section('title', 'FAQ - SMKN 1 Bangil')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">FAQ</h1>
            <p class="header-description">Pertanyaan yang sering diajukan tentang <span>SMK Negeri 1 Bangil</span>. Temukan jawaban untuk pertanyaan umum mengenai pendaftaran, program keahlian, dan informasi lainnya.</p>
        </div>
    </div>

    <section class="faq-section">
        <div class="container">
            <div class="faq-content">
                <div class="faq-search">
                    <div class="search-container">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <circle cx="11" cy="11" r="8"></circle> <path d="m21 21-4.3-4.3"></path> </svg>
                        <input type="text" id="faqSearch" placeholder="Cari pertanyaan...">
                    </div>
                </div>

                <div class="faq-categories">
                    <button class="category-btn active" data-category="all">Semua</button>
                    @foreach($categories as $category)
                        <button class="category-btn" data-category="{{ $category }}">{{ ucfirst($category) }}</button>
                    @endforeach
                </div>

                <div class="faq-items">
                    @forelse($faqs as $faq)
                        <div class="faq-item" data-category="{{ $faq->category }}">
                            <div class="faq-question">
                                <h3>{{ $faq->question }}</h3>
                                <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <path d="m6 9 6 6 6-6"/> </svg>
                            </div>
                            <div class="faq-answer">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada FAQ yang tersedia.</p>
                    @endforelse
                </div>

                <div class="contact-cta">
                    <div class="cta-card">
                        <h3>Masih ada pertanyaan?</h3>
                        <p>Jika Anda tidak menemukan jawaban yang Anda cari, jangan ragu untuk menghubungi kami langsung.</p>
                        <a href="/contact" class="btn btn-primary">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/faq.js') }}"></script>
@endsection
