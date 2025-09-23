@extends('layouts.main')
@section('title', 'Penerimaan Murid Baru (SPMB)')

@section('content')
<div class="section-padding">
    <div class="container">
        <h1 class="section-title">Sistem Penerimaan Murid Baru (SPMB) <br><span>SMKN 1 Bangil Tahun Ajaran 2026/2027</span></h1>
        <div style="text-align:center; margin-bottom: 50px;">
             <img src="{{ asset('img/spmb-banner.png') }}" alt="SPMB Banner" style="max-width: 100%; border-radius: 12px;">
        </div>

        <h2 class="section-title">Alur Pendaftaran Mudah dalam <span>6 Langkah</span></h2>
        <div class="spmb-alur">
             @php
                $steps = [
                    'Pahami Informasi', 'Siapkan Berkas', 'Isi Formulir Online',
                    'Verifikasi & Seleksi', 'Lihat Pengumuman', 'Daftar Ulang'
                ];
            @endphp
            @foreach($steps as $index => $step)
            <div class="spmb-step">
                <div class="step-icon">{{ $index + 1 }}</div>
                <p><strong>{{ $step }}</strong></p>
            </div>
            @endforeach
        </div>
        
        <h2 class="section-title" style="margin-top: 80px;">Catat <span>Tanggal Pentingnya!</span></h2>
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

         <h2 class="section-title" style="margin-top: 80px;">Persiapan <span>Dokumenmu</span></h2>
         <div class="dokumen-persiapan">
             <div class="dokumen-list">
                 <h3>Syarat Umum</h3>
                 <ul>
                     <li><i class="fas fa-check-circle"></i> Usia maksimal 21 tahun pada 1 Juli 2026</li>
                     <li><i class="fas fa-check-circle"></i> Lulusan SMP/Sederajat</li>
                     <li><i class="fas fa-check-circle"></i> Berkelakuan baik</li>
                 </ul>
             </div>
              <div class="dokumen-list">
                 <h3>Berkas Wajib Upload (Scan)</h3>
                 <ul>
                     <li><i class="fas fa-upload"></i> Ijazah/Surat Keterangan Lulus</li>
                     <li><i class="fas fa-upload"></i> Akta Kelahiran</li>
                     <li><i class="fas fa-upload"></i> Kartu Keluarga (KK)</li>
                     <li><i class="fas fa-upload"></i> Pas foto berwarna 3x4 dan 4x6</li>
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
                <div class="faq-answer"><p>Tidak ada biaya yang dikenakan untuk pendaftaran awal.</p></div>
            </div>
         </div>
    </div>
</div>
@endsection