@extends('layouts.admin')
@section('title', 'Kelola FAQ')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola FAQ</h1>
        <a href="{{ route('admin.faq.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah FAQ Baru</a>
    </div>
    @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <div class="card shadow"><div class="card-body"><div class="table-responsive">
        <table class="table table-bordered">
            <thead><tr><th>Pertanyaan</th><th>Kategori</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($faqs as $faq)
                <tr>
                    <td>{{ Str::limit($faq->question, 80) }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($faq->category) }}</span></td>
                    <td>
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center">Data FAQ masih kosong.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div></div></div>
</div>
@endsection