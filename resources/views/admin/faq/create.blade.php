@extends('layouts.admin')
@section('title', 'Tambah FAQ')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah FAQ Baru</h1>
    <div class="card shadow"><div class="card-body">
        <form action="{{ route('admin.faq.store') }}" method="POST">
            @include('admin.faq._form', ['categories' => $categories, 'tombol' => 'Simpan'])
        </form>
    </div></div>
</div>
@endsection