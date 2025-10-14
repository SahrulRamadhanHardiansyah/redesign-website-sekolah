@extends('layouts.admin')
@section('title', 'Tambah Prestasi')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Prestasi Baru</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @include('admin.prestasi._form', ['tombol' => 'Simpan'])
            </form>
        </div>
    </div>
</div>
@endsection