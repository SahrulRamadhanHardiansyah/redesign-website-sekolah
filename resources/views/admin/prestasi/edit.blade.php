@extends('layouts.admin')
@section('title', 'Edit Prestasi')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Prestasi</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.prestasi._form', ['prestasi' => $prestasi, 'tombol' => 'Update'])
            </form>
        </div>
    </div>
</div>
@endsection