<div class="mb-3">
    <label for="judul" class="form-label">Judul Foto</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}" required>
    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="akademik" {{ old('kategori', $galeri->kategori ?? '') == 'akademik' ? 'selected' : '' }}>Akademik</option>
        <option value="ekskul" {{ old('kategori', $galeri->kategori ?? '') == 'ekskul' ? 'selected' : '' }}>Ekstrakurikuler</option>
        <option value="lomba" {{ old('kategori', $galeri->kategori ?? '') == 'lomba' ? 'selected' : '' }}>Lomba</option>
        <option value="acara" {{ old('kategori', $galeri->kategori ?? '') == 'acara' ? 'selected' : '' }}>Acara Sekolah</option>
    </select>
    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Upload Gambar</label>
    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar">
    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
    @if(isset($galeri) && $galeri->gambar)
        <div class="mt-2">
            <small>Gambar saat ini:</small><br>
            <img src="{{ asset($galeri->gambar) }}" alt="{{ $galeri->judul }}" width="200">
        </div>
    @endif
</div>

<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
<a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>