@csrf
<div class="mb-3">
    <label for="nama" class="form-label">Nama Ekstrakurikuler</label>
    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $ekstrakurikuler->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Logo/Gambar Utama</label>
    <input class="form-control" type="file" name="gambar" id="gambar">
    @if(isset($ekstrakurikuler) && $ekstrakurikuler->gambar)
        <img src="{{ asset($ekstrakurikuler->gambar) }}" alt="{{ $ekstrakurikuler->nama }}" class="img-thumbnail mt-2" width="200">
    @endif
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi Lengkap (Mendukung Markdown)</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="15" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
    <small class="form-text text-muted">Gunakan `#` untuk judul, `*` atau `1.` untuk daftar, `**teks tebal**` untuk menebalkan.</small>
</div>

<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
<a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Batal</a>