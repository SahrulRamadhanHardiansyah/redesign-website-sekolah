@extends('layouts.admin')
@section('title', 'Edit Foto Galeri')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Foto Galeri</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('admin.galeri._form', ['galeri' => $galeri, 'tombol' => 'Update'])
            </form>
        </div>
    </div>
</div>
@endsection