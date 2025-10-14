@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Baris Kartu Rangkuman --}}
    <div class="row">
        {{-- Total Siswa --}}
        <div class="col-xl-4 col-md-6">
            <div class="summary-card primary">
                <div class="summary-card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="summary-card-title">Total Siswa</div>
                        <div class="summary-card-value">1,234</div> {{-- Ganti dengan data dinamis --}}
                    </div>
                    <i class="fas fa-users summary-card-icon"></i>
                </div>
            </div>
        </div>
        {{-- Total Guru --}}
        <div class="col-xl-4 col-md-6">
            <div class="summary-card success">
                <div class="summary-card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="summary-card-title">Total Guru</div>
                        <div class="summary-card-value">115</div> {{-- Ganti dengan data dinamis --}}
                    </div>
                    <i class="fas fa-chalkboard-teacher summary-card-icon"></i>
                </div>
            </div>
        </div>
        {{-- Total Jurusan --}}
        <div class="col-xl-4 col-md-6">
            <div class="summary-card warning">
                <div class="summary-card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="summary-card-title">Total Jurusan</div>
                        <div class="summary-card-value">9</div> {{-- Ganti dengan data dinamis --}}
                    </div>
                    <i class="fas fa-book-open summary-card-icon"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris Opsi & Statistik --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-custom mb-4">
                <div class="card-header">
                    Update Jumlah Siswa
                </div>
                <div class="card-body">
                    <p class="card-text small text-muted">Ubah angka yang ditampilkan pada section siswa.</p>
                    <form action="#" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="number" class="form-control" name="jumlah_siswa" value="1234" placeholder="Masukkan jumlah siswa">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
             <div class="card card-custom mb-4">
                <div class="card-header">
                    Statistik Website
                </div>
                <div class="card-body">
                    <p class="card-text small text-muted">Integrasi dengan sistem analitik sedang dalam pengembangan.</p>
                    <ul class="list-unstyled">
                        <li>Pengunjung Hari Ini: <strong>-</strong></li>
                        <li>Total Pengunjung Bulan Ini: <strong>-</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris Pintasan Manajemen --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-custom">
                <div class="card-header">
                    Pintasan Manajemen
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-3">
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-primary w-100 p-3 text-start"><i class="fas fa-newspaper me-2"></i> Kelola Berita</a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <a href="#" class="btn btn-outline-success w-100 p-3 text-start"><i class="fas fa-images me-2"></i> Kelola Galeri</a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <a href="#" class="btn btn-outline-info w-100 p-3 text-start"><i class="fas fa-trophy me-2"></i> Kelola Prestasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
