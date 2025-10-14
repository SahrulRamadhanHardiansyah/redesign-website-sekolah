@csrf
<div class="mb-3">
    <label for="judul" class="form-label">Judul Prestasi</label>
    <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $prestasi->judul ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $prestasi->deskripsi ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="text" class="form-control" name="tahun" id="tahun" value="{{ old('tahun', $prestasi->tahun ?? date('Y')) }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="tanggal" class="form-label">Tanggal (Opsional, untuk Urutan Unggulan)</label>
        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal', isset($prestasi->tanggal) ? $prestasi->tanggal->format('Y-m-d') : '') }}">
    </div>
</div>
<hr>
<div class="mb-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_unggulan" value="1" id="is_unggulan" {{ old('is_unggulan', $prestasi->is_unggulan ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_unggulan">
            <strong>Jadikan Prestasi Unggulan?</strong> (Akan tampil di grid atas dengan gambar)
        </label>
    </div>
</div>
<div class="mb-3">
    <label for="gambar" class="form-label">Gambar (Wajib jika jadi Unggulan)</label>
    <input class="form-control" type="file" name="gambar" id="gambar">
    @if(isset($prestasi) && $prestasi->gambar)
        <img src="{{ asset($prestasi->gambar) }}" alt="{{ $prestasi->judul }}" class="img-thumbnail mt-2" width="200">
    @endif
</div>

<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
<a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">Batal</a>