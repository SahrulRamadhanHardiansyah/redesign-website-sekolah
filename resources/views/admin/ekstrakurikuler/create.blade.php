@extends('layouts.admin')
@section('title', 'Tambah Ekstrakurikuler')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Ekstrakurikuler</h1>
    <div class="card shadow"><div class="card-body">
        <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.ekstrakurikuler._form', ['tombol' => 'Simpan'])
        </form>
    </div></div>
</div>
@endsection