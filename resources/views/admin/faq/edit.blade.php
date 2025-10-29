@extends('layouts.admin')
@section('title', 'Edit FAQ')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit FAQ</h1>
    <div class="card shadow"><div class="card-body">
        <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
            @method('PUT')
            @include('admin.faq._form', ['faq' => $faq, 'categories' => $categories, 'tombol' => 'Update'])
        </form>
    </div></div>
</div>
@endsection