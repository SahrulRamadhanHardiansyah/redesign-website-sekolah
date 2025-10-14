@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Berita</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.berita._form', ['berita' => $berita, 'tombol' => 'Update'])
            </form>
        </div>
    </div>
</div>
@endsection