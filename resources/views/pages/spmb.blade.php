@extends('layouts.main')
@section('title', 'Penerimaan Murid Baru (SPMB)')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/spmb.css') }}">
@endsection
@section('content')
<div class="section-padding">
    <div class="container">
        <div style="text-align:center; margin-bottom: 50px;">
             <h1 class="section-title hero-title-spmb">Sistem Penerimaan Murid Baru (SPMB) SMKN 1 Bangil <br><span> Tahun Ajaran 2026/2027</span></h1>
             <img src="{{ asset('img/spmb/SPMB-Hero.jpg') }}" alt="SPMB Banner" style="max-width: 60%; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        </div>

        <h2 class="section-title">Alur Pendaftaran Mudah dalam <span>6 Langkah</span></h2>
        <div class="spmb-alur">
            @php
                $steps = [
                    ['num' => 1, 'icon' => 'fas fa-info-circle', 'title' => 'Pahami Informasi', 'desc' => 'Baca syarat dan ketentuan pendaftaran'],
                    ['num' => 2, 'icon' => 'fas fa-folder-open', 'title' => 'Siapkan Berkas', 'desc' => 'Kumpulkan dokumen yang diperlukan'],
                    ['num' => 3, 'icon' => 'fas fa-keyboard', 'title' => 'Isi Formulir Online', 'desc' => 'Lengkapi data diri dan unggah berkas'],
                    ['num' => 6, 'icon' => 'fas fa-user-graduate', 'title' => 'Daftar Ulang', 'desc' => 'Lakukan registrasi ulang jika diterima'],
                    ['num' => 5, 'icon' => 'fas fa-bullhorn', 'title' => 'Lihat Pengumuman', 'desc' => 'Cek hasil seleksi di website resmi'],
                    ['num' => 4, 'icon' => 'fas fa-user-check', 'title' => 'Verifikasi & Seleksi', 'desc' => 'Tunggu proses verifikasi berkas']
                ];
            @endphp
            @foreach($steps as $step)
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
                    <tr><td>Pendaftaran Online</td><td>1 Februari 2026</td><td>31 Maret 2026</td></tr>
                    <tr><td>Seleksi Administrasi</td><td>1 April 2026</td><td>30 April 2026</td></tr>
                    <tr><td>Pengumuman Hasil</td><td>10 Mei 2026</td><td>10 Mei 2026</td></tr>
                    <tr><td>Daftar Ulang</td><td>16 Mei 2026</td><td>31 Mei 2026</td></tr>
                </tbody>
            </table>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Pilih <span>Jalur Pendaftaran</span> yang Sesuai Untukmu</h2>
        <div class="jalur-pendaftaran">
            <div class="jalur-card">
                <div class="jalur-content">
                    <div class="jalur-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="jalur-text">
                        <h3>Jalur Domisili</h3>
                        <span>60% dari total kuota</span>
                    </div>
                </div>
            </div>
            <div class="jalur-card">
                <div class="jalur-content">
                    <div class="jalur-icon"><i class="fas fa-trophy"></i></div>
                    <div class="jalur-text">
                        <h3>Jalur Prestasi</h3>
                        <span>20% dari total kuota</span>
                    </div>
                </div>
            </div>
            <div class="jalur-card">
                <div class="jalur-content">
                    <div class="jalur-icon"><i class="fas fa-heart"></i></div>
                    <div class="jalur-text">
                        <h3>Jalur Afirmasi</h3>
                        <span>15% dari total kuota</span>
                    </div>
                </div>
            </div>
            <div class="jalur-card">
                <div class="jalur-content">
                    <div class="jalur-icon"><i class="fas fa-sync-alt"></i></div>
                    <div class="jalur-text">
                        <h3>Jalur Mutasi</h3>
                        <span>5% dari total kuota</span>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Persiapan <span>Dokumenmu</span></h2>
        <div class="dokumen-persiapan">
             <div class="dokumen-list">
                 <h3>Syarat Umum</h3>
                 <ul>
                     <li><i class="fas fa-check-circle"></i> Lulusan SMP/MTs Sederajat</li>
                     <li><i class="fas fa-check-circle"></i> Usia maksimal 21 tahun pada 1 Juli 2026</li>
                     <li><i class="fas fa-check-circle"></i> Sehat jasmani dan rohani</li>
                     <li><i class="fas fa-check-circle"></i> Tidak buta warna (untuk jurusan tertentu)</li>
                     <li><i class="fas fa-check-circle"></i> Berkelakuan baik</li>
                 </ul>
             </div>
             <div class="dokumen-list">
                 <h3>Berkas Wajib Upload (Scan)</h3>
                 <ul>
                    <li><i class="fas fa-upload"></i> Ijazah SMP/MTs atau Surat Keterangan Lulus</li>
                    <li><i class="fas fa-upload"></i> SKHUN (Surat Keterangan Hasil Ujian Nasional)</li>
                    <li><i class="fas fa-upload"></i> Akta Kelahiran</li>
                    <li><i class="fas fa-upload"></i> Kartu Keluarga (KK)</li>
                    <li><i class="fas fa-upload"></i> Pas foto berwarna 3x4 dan 4x6 (2 Lembar)</li>
                    <li><i class="fas fa-upload"></i> Surat keterangan berkelakuan baik dari sekolah asal</li>
                 </ul>
             </div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Masih Bingung? <span>Mungkin Jawabanmu Ada di Sini!</span></h2>
        <div class="faq-accordion">
            <div class="faq-item">
                <div class="faq-question">Kapan pendaftaran SPMB SMKN 1 Bangil dibuka? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>Pendaftaran akan dibuka mulai 1 Februari 2026 hingga 31 Maret 2026 secara online melalui website ini.</p></div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apakah ada biaya pendaftaran? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>Tidak ada biaya yang dikenakan untuk proses pendaftaran awal (biaya formulir). Biaya lainnya mungkin akan diinformasikan setelah calon siswa dinyatakan diterima.</p></div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Jurusan apa saja yang ada di SMKN 1 Bangil? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>SMKN 1 Bangil memiliki beberapa program keahlian unggulan, antara lain: Teknik Komputer dan Jaringan, Rekayasa Perangkat Lunak, Multimedia, Akuntansi dan Keuangan Lembaga, serta Otomatisasi dan Tata Kelola Perkantoran. Detail lengkap bisa dilihat di halaman Jurusan.</p></div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Bagaimana cara melihat hasil seleksi? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>Hasil seleksi akan diumumkan secara online di website ini pada tanggal 10 Mei 2026. Peserta dapat login ke akun pendaftaran masing-masing untuk melihat status kelulusan.</p></div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apa yang harus dilakukan jika lupa password akun pendaftaran? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>Pada halaman login, terdapat tautan "Lupa Password?". Klik tautan tersebut dan ikuti instruksi untuk mereset password melalui email yang telah Anda daftarkan.</p></div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apakah bisa mendaftar lebih dari satu jalur? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>Setiap calon siswa hanya diperbolehkan memilih satu jalur pendaftaran. Mohon untuk mempertimbangkan dan memilih jalur yang paling sesuai dengan kondisi Anda.</p></div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Bagaimana jika berkas yang diupload salah? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer"><p>Jika terjadi kesalahan upload berkas sebelum batas akhir pendaftaran, Anda dapat login kembali dan memperbarui berkas. Namun, jika sudah melewati masa pendaftaran, silakan hubungi panitia melalui kontak yang tersedia di bagian bantuan.</p></div>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Butuh Bantuan <span>Lebih Lanjut?</span></h2>
        <div class="bantuan-container">
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fab fa-whatsapp"></i></div>
                <h3>WhatsApp Panitia</h3>
                <p>Chat langsung dengan panitia untuk respon cepat.</p>
                <a href="https://wa.me/+6281234567890" target="_blank" class="btn-bantuan">Chat WhatsApp</a>
            </div>
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email Kami</h3>
                <p>Kirim pertanyaan Anda melalui email resmi kami.</p>
                <a href="mailto:smknesaba@yahoo.com" target="_blank" class="btn-bantuan">Kirim Email</a>
            </div>
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fas fa-headset"></i></div>
                <h3>Helpdesk di Sekolah</h3>
                <p>Kunjungi helpdesk kami di sekolah pada jam kerja.</p>
                <a href="https://maps.app.goo.gl/rbjB2mM75bFzKHow5" target="_blank" class="btn-bantuan">Lihat Lokasi</a>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
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