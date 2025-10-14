@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Foto Galeri Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.galeri._form', ['tombol' => 'Simpan'])
            </form>
        </div>
    </div>
</div>
@endsection