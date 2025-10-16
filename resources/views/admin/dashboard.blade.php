@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1" style="color: #1a1d29; font-weight: 700;">Dashboard</h1>
            <p class="text-muted mb-0">Selamat datang di Admin Panel SMKN 1 Bangil</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Baris Kartu Rangkuman (Data Dinamis) --}}
    <div class="row">
        {{-- Total Siswa --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="summary-card primary">
                <div class="summary-card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="summary-card-title">Total Siswa</div>
                        <div class="summary-card-value">{{ number_format($jumlahSiswa) }}</div>
                    </div>
                    <i class="fas fa-user-graduate summary-card-icon"></i>
                </div>
            </div>
        </div>

        {{-- Total Guru --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="summary-card success">
                <div class="summary-card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="summary-card-title">Total Guru</div>
                        <div class="summary-card-value">{{ number_format($jumlahGuru) }}</div>
                    </div>
                    <i class="fas fa-chalkboard-teacher summary-card-icon"></i>
                </div>
            </div>
        </div>

        {{-- Total Jurusan --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="summary-card warning">
                <div class="summary-card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="summary-card-title">Total Jurusan</div>
                        <div class="summary-card-value">{{ number_format($jumlahJurusan) }}</div>
                    </div>
                    <i class="fas fa-book-open summary-card-icon"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris Form Edit Data Rangkuman --}}
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i>Edit Data Rangkuman
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dashboard.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3 align-items-end">
                            {{-- Input Jumlah Siswa --}}
                            <div class="col-md-3">
                                <label for="jumlah_siswa" class="form-label">Total Siswa</label>
                                <input type="number" name="jumlah_siswa" id="jumlah_siswa" value="{{ old('jumlah_siswa', $jumlahSiswa) }}" class="form-control" required>
                            </div>
                            {{-- Input Jumlah Guru --}}
                            <div class="col-md-3">
                                <label for="jumlah_guru" class="form-label">Total Guru</label>
                                <input type="number" name="jumlah_guru" id="jumlah_guru" value="{{ old('jumlah_guru', $jumlahGuru) }}" class="form-control" required>
                            </div>
                            {{-- Input Jumlah Jurusan --}}
                            <div class="col-md-3">
                                <label for="jumlah_jurusan" class="form-label">Total Jurusan</label>
                                <input type="number" name="jumlah_jurusan" id="jumlah_jurusan" value="{{ old('jumlah_jurusan', $jumlahJurusan) }}" class="form-control" required>
                            </div>
                            {{-- Tombol Simpan --}}
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Statistik Website --}}
        <div class="col-lg-6 mb-4">
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fas fa-chart-line me-2"></i>Statistik Website
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-3">
                        <i class="fas fa-info-circle me-1"></i>
                        Integrasi dengan sistem analitik sedang dalam pengembangan
                    </p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 rounded" style="background: linear-gradient(135deg, rgba(2, 205, 171, 0.1) 0%, rgba(1, 165, 137, 0.05) 100%);">
                                <div class="text-muted small mb-1">Pengunjung Hari Ini</div>
                                <div class="h4 mb-0 fw-bold" style="color: #02cdab;">-</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded" style="background: linear-gradient(135deg, rgba(25, 135, 84, 0.1) 0%, rgba(21, 115, 71, 0.05) 100%);">
                                <div class="text-muted small mb-1">Bulan Ini</div>
                                <div class="h4 mb-0 fw-bold text-success">-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris Pintasan Manajemen --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-custom">
                <div class="card-header">
                    <i class="fas fa-bolt me-2"></i>Pintasan Manajemen
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('admin.berita.index') }}"
                                class="btn btn-outline-primary w-100 p-3 text-start d-flex align-items-center">
                                <div class="me-3" style="font-size: 1.8rem; opacity: 0.8;">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Kelola Berita</div>
                                    <small class="text-muted">Tambah & edit berita</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#"
                                class="btn btn-outline-success w-100 p-3 text-start d-flex align-items-center">
                                <div class="me-3" style="font-size: 1.8rem; opacity: 0.8;">
                                    <i class="fas fa-images"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Kelola Galeri</div>
                                    <small class="text-muted">Kelola foto kegiatan</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#"
                                class="btn btn-outline-info w-100 p-3 text-start d-flex align-items-center">
                                <div class="me-3" style="font-size: 1.8rem; opacity: 0.8;">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Kelola Prestasi</div>
                                    <small class="text-muted">Data prestasi siswa</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="#"
                                class="btn btn-outline-warning w-100 p-3 text-start d-flex align-items-center">
                                <div class="me-3" style="font-size: 1.8rem; opacity: 0.8;">
                                    <i class="fas fa-school"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Kelola Jurusan</div>
                                    <small class="text-muted">Program keahlian</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('admin.ekstrakurikuler.index') }}"
                                class="btn btn-outline-danger w-100 p-3 text-start d-flex align-items-center">
                                <div class="me-3" style="font-size: 1.8rem; opacity: 0.8;">
                                    <i class="fas fa-futbol"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Ekstrakurikuler</div>
                                    <small class="text-muted">Kelola kegiatan ekskul</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('admin.users.index') }}"
                                class="btn btn-outline-secondary w-100 p-3 text-start d-flex align-items-center">
                                <div class="me-3" style="font-size: 1.8rem; opacity: 0.8;">
                                    <i class="fas fa-users-cog"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Kelola User</div>
                                    <small class="text-muted">Manajemen pengguna</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
