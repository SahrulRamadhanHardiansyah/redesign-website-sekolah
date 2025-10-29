@csrf
<div class="mb-3">
    <label for="question" class="form-label">Pertanyaan</label>
    <input type="text" class="form-control" name="question" id="question" value="{{ old('question', $faq->question ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select name="category" id="category" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category }}" {{ old('category', $faq->category ?? '') == $category ? 'selected' : '' }}>
                {{ ucfirst($category) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="answer" class="form-label">Jawaban</label>
    <textarea name="answer" id="answer" class="form-control" rows="6" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
    <small class="form-text text-muted">Anda bisa menggunakan baris baru untuk membuat paragraf atau daftar sederhana.</small>
</div>

<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
<a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">Batal</a>