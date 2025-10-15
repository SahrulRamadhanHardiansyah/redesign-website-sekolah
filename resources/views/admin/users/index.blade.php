@extends('layouts.admin')
@section('title', 'Kelola User')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User Baru</a>
    </div>
    @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
    <div class="card shadow"><div class="card-body"><div class="table-responsive">
        <table class="table table-bordered">
            <thead><tr><th>Nama</th><th>Email</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" {{ Auth::id() === $user->id ? 'disabled' : '' }}><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center">Data user masih kosong.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div></div></div>
</div>
@endsection