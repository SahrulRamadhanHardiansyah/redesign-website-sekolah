@extends('layouts.admin')
@section('title', 'Edit Ekstrakurikuler')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Ekstrakurikuler</h1>
    <div class="card shadow"><div class="card-body">
        <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.ekstrakurikuler._form', ['ekstrakurikuler' => $ekstrakurikuler, 'tombol' => 'Update'])
        </form>
    </div></div>
</div>
@endsection