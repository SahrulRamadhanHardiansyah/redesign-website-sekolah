@extends('layouts.admin')
@section('title', 'Kelola Ekstrakurikuler')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Ekstrakurikuler</h1>
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Baru</a>
    </div>
    @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <div class="card shadow"><div class="card-body"><div class="table-responsive">
        <table class="table table-bordered">
            <thead><tr><th>Logo</th><th>Nama</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($ekskuls as $ekskul)
                <tr>
                    <td><img src="{{ asset($ekskul->gambar) }}" alt="{{ $ekskul->nama }}" height="50"></td>
                    <td>{{ $ekskul->nama }}</td>
                    <td>
                        <a href="{{ route('admin.ekstrakurikuler.edit', $ekskul->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.ekstrakurikuler.destroy', $ekskul->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center">Data masih kosong.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div></div></div>
</div>
@endsection