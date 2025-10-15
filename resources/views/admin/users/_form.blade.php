@csrf
<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password @if(!isset($user)) (Wajib) @else (Opsional) @endif</label>
    <input type="password" class="form-control" name="password" id="password" @if(!isset($user)) required @endif>
    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
</div>
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" @if(!isset($user)) required @endif>
</div>

<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>