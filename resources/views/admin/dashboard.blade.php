@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <h1>Dashboard Admin</h1>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Manajemen Konten</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="bi bi-newspaper" style="font-size: 3rem; color: #007bff;"></i>
                                    <h5 class="card-title mt-3">Berita</h5>
                                    <p class="card-text">Kelola berita dan kegiatan sekolah</p>
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-primary">Kelola Berita</a>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan card untuk fitur lain jika diperlukan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
