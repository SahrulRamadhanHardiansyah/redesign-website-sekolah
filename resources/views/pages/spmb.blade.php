@extends('layouts.main')
@section('title', 'Penerimaan Murid Baru (SPMB)')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/spmb.css') }}">
@endsection
@section('content')
<div class="section-padding">
    <div class="container">
        <div style="text-align:center; margin-bottom: 50px;">
             <h1 class="section-title hero-title-spmb">
                {{ $settings['hero_title'] ?? 'Sistem Penerimaan Murid Baru' }} <br>
                <span>{{ $settings['hero_subtitle'] ?? 'Tahun Ajaran Terbaru' }}</span>
            </h1>
             <img src="{{ asset($settings['hero_image'] ?? 'img/spmb/SPMB-Hero.jpg') }}" alt="SPMB Banner" style="max-width: 60%; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        </div>

        <h2 class="section-title">Alur Pendaftaran Mudah dalam <span>{{ count($settings['alur_pendaftaran']) }} Langkah</span></h2>
        <div class="spmb-alur">
            @foreach($settings['alur_pendaftaran'] as $step)
            <div class="spmb-step">
                <div class="step-number-badge">{{ $step['num'] }}</div>
                <div class="step-icon-main"><i class="{{ $step['icon'] }}"></i></div>
                <p>
                    <strong>{{ $step['title'] }}</strong>
                    <small>{{ $step['desc'] }}</small>
                </p>
            </div>
            @endforeach
        </div>
        
        <h2 class="section-title" style="margin-top: 80px;">Catat <span>Tanggal Pentingnya!</span></h2>
        <div class="table-container">
            <table class="jadwal-table">
                <thead>
                    <tr><th>Kegiatan</th><th>Tanggal Mulai</th><th>Tanggal Selesai</th></tr>
                </thead>
                <tbody>
                    @forelse($settings['jadwal_penting'] as $jadwal)
                        <tr>
                            <td>{{ $jadwal['kegiatan'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($jadwal['mulai'])->translatedFormat('d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($jadwal['selesai'])->translatedFormat('d F Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Jadwal belum tersedia. Silakan cek kembali nanti.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Pilih <span>Jalur Pendaftaran</span> yang Sesuai Untukmu</h2>
        <div class="jalur-pendaftaran">
            @foreach($settings['jalur_pendaftaran'] ?? [] as $jalur)
            <div class="jalur-card">
                <div class="jalur-content">
                    <div class="jalur-icon"><i class="{{ $jalur['icon'] ?? 'fas fa-school' }}"></i></div>
                    <div class="jalur-text">
                        <h3>{{ $jalur['nama'] ?? 'Nama Jalur' }}</h3>
                        <span>{{ $jalur['kuota'] ?? 'Kuota' }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Persiapan <span>Dokumenmu</span></h2>
        <div class="dokumen-persiapan">
            <div class="dokumen-list">
                <h3>Syarat Umum</h3>
                <ul>
                    @foreach($settings['syarat_umum'] as $syarat)
                        <li><i class="{{ $syarat['icon'] ?? 'fas fa-check-circle' }}"></i> {{ $syarat['text'] ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="dokumen-list">
                <h3>Berkas Wajib Upload (Scan)</h3>
                <ul>
                    @foreach($settings['berkas_wajib'] as $berkas)
                        <li><i class="{{ $berkas['icon'] ?? 'fas fa-upload' }}"></i> {{ $berkas['text'] ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Masih Bingung? <span>Mungkin Jawabanmu Ada di Sini!</span></h2>
        <div class="faq-accordion">
            @foreach($settings['faq'] as $faq)
            <div class="faq-item">
                <div class="faq-question">{{ $faq['tanya'] }} <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>{{ $faq['jawab'] }}</p></div>
            </div>
            @endforeach
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Butuh Bantuan <span>Lebih Lanjut?</span></h2>
        <div class="bantuan-container">
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fab fa-whatsapp"></i></div>
                <h3>WhatsApp Panitia</h3>
                <p>Chat langsung dengan panitia untuk respon cepat.</p>
                <a href="https://wa.me/{{ $settings['kontak_wa'] ?? '' }}" target="_blank" class="btn-bantuan">Chat WhatsApp</a>
            </div>
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email Kami</h3>
                <p>Kirim pertanyaan Anda melalui email resmi kami.</p>
                <a href="mailto:{{ $settings['kontak_email'] ?? '' }}" target="_blank" class="btn-bantuan">Kirim Email</a>
            </div>
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fas fa-headset"></i></div>
                <h3>Helpdesk di Sekolah</h3>
                <p>Kunjungi helpdesk kami di sekolah pada jam kerja.</p>
                <a href="{{ $settings['kontak_lokasi'] ?? '#' }}" target="_blank" class="btn-bantuan">Lihat Lokasi</a>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all other items for a classic accordion effect
            faqItems.forEach(i => {
                if (i !== item) {
                    i.classList.remove('active');
                }
            });

            // Toggle the clicked item
            item.classList.toggle('active');
        });
    });
});
</script>
@endsection