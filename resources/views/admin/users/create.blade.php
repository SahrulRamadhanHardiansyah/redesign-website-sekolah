@extends('layouts.admin')
@section('title', 'Tambah User')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah User Baru</h1>
    <div class="card shadow"><div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @include('admin.users._form', ['tombol' => 'Simpan'])
        </form>
    </div></div>
</div>
@endsection