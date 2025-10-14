@extends('layouts.admin')
@section('title', 'Kelola Prestasi')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Prestasi</h1>
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Prestasi Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul Prestasi</th>
                            <th>Tahun</th>
                            <th>Status Unggulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestasis as $prestasi)
                            <tr>
                                <td>{{ $prestasi->judul }}</td>
                                <td>{{ $prestasi->tahun }}</td>
                                <td>
                                    @if ($prestasi->is_unggulan)
                                        <span class="badge bg-success">Ya</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">Data prestasi masih kosong.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection