@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    <div class="card shadow"><div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @method('PUT')
            @include('admin.users._form', ['user' => $user, 'tombol' => 'Update'])
        </form>
    </div></div>
</div>
@endsection