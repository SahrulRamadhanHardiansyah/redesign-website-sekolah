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
                <!-- FAQ Search -->
                <div class="faq-search">
                    <div class="search-container">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input type="text" id="faqSearch" placeholder="Cari pertanyaan...">
                    </div>
                </div>

                <!-- FAQ Categories -->
                <div class="faq-categories">
                    <button class="category-btn active" data-category="all">Semua</button>
                    <button class="category-btn" data-category="pendaftaran">Pendaftaran</button>
                    <button class="category-btn" data-category="jurusan">Program Keahlian</button>
                    <button class="category-btn" data-category="umum">Informasi Umum</button>
                    <button class="category-btn" data-category="fasilitas">Fasilitas</button>
                </div>

                <!-- FAQ Items -->
                <div class="faq-items">
                    <!-- Pendaftaran Category -->
                    <div class="faq-item" data-category="pendaftaran">
                        <div class="faq-question">
                            <h3>Kapan pendaftaran PPDB dibuka?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>Pendaftaran PPDB SMK Negeri 1 Bangil biasanya dibuka pada bulan Mei setiap tahunnya. Untuk informasi lebih detail mengenai jadwal pendaftaran, silakan pantau website resmi sekolah atau media sosial kami.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="pendaftaran">
                        <div class="faq-question">
                            <h3>Dokumen apa saja yang diperlukan untuk pendaftaran?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>Dokumen yang diperlukan meliputi:</p>
                            <ul>
                                <li>Fotokopi akta kelahiran</li>
                                <li>Fotokopi kartu keluarga</li>
                                <li>Fotokopi ijazah SMP/sederajat</li>
                                <li>Pas foto 3x4 (latar belakang merah)</li>
                                <li>Fotokopi rapor SMP kelas 7-9</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Jurusan Category -->
                    <div class="faq-item" data-category="jurusan">
                        <div class="faq-question">
                            <h3>Berapa banyak program keahlian yang tersedia?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>SMK Negeri 1 Bangil menyediakan 6 program keahlian unggulan yang relevan dengan kebutuhan industri saat ini. Setiap program keahlian dirancang untuk membekali siswa dengan keterampilan dan pengetahuan yang dibutuhkan di dunia kerja.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="jurusan">
                        <div class="faq-question">
                            <h3>Apakah ada tes khusus untuk memilih jurusan?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>Ya, terdapat tes minat dan bakat untuk membantu siswa memilih program keahlian yang sesuai dengan potensi dan minat mereka. Tes ini bertujuan untuk memastikan siswa berada di jurusan yang tepat.</p>
                        </div>
                    </div>

                    <!-- Umum Category -->
                    <div class="faq-item" data-category="umum">
                        <div class="faq-question">
                            <h3>Berapa biaya pendidikan di SMK Negeri 1 Bangil?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>SMK Negeri 1 Bangil merupakan sekolah negeri sehingga tidak memungut biaya SPP. Hanya ada beberapa komponen biaya seperti uang praktik, seragam, dan kegiatan pembelajaran yang besarnya telah ditetapkan sesuai peraturan.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="umum">
                        <div class="faq-question">
                            <h3>Apakah tersedia asrama untuk siswa?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>Saat ini SMK Negeri 1 Bangil belum menyediakan asrama untuk siswa. Namun, sekolah dapat membantu memberikan informasi mengenai tempat tinggal di sekitar sekolah bagi siswa yang berasal dari luar kota.</p>
                        </div>
                    </div>

                    <!-- Fasilitas Category -->
                    <div class="faq-item" data-category="fasilitas">
                        <div class="faq-question">
                            <h3>Fasilitas apa saja yang tersedia di sekolah?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>SMK Negeri 1 Bangil dilengkapi dengan berbagai fasilitas modern seperti:</p>
                            <ul>
                                <li>Laboratorium komputer dan praktik</li>
                                <li>Perpustakaan digital</li>
                                <li>Ruang kelas ber-AC</li>
                                <li>Wi-Fi area</li>
                                <li>Lapangan olahraga</li>
                                <li>Mushola</li>
                                <li>Kantin sehat</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item" data-category="fasilitas">
                        <div class="faq-question">
                            <h3>Apakah sekolah menyediakan akses internet untuk siswa?</h3>
                            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p>Ya, sekolah menyediakan akses Wi-Fi gratis untuk siswa yang dapat digunakan untuk keperluan pembelajaran. Akses internet diatur dan diawasi untuk memastikan digunakan secara bertanggung jawab.</p>
                        </div>
                    </div>
                </div>

                <!-- Contact CTA -->
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

@section('scripts')
    <script src="{{ asset('js/faq.js') }}"></script>
@endsection
