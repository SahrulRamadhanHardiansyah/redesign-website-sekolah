@extends('layouts.admin')

@section('title', 'Tambah Berita Baru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Berita Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @include('admin.berita._form', ['tombol' => 'Simpan'])
            </form>
        </div>
    </div>
</div>
@endsection