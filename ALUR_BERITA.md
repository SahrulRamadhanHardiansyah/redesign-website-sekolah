# Alur Berita - Sistem CRUD Laravel

## Overview
Sistem berita ini menggunakan Laravel dengan database MySQL untuk menyimpan data berita. Sistem ini memiliki dua bagian utama:
1. **Admin Interface** - Untuk mengelola berita (CRUD)
2. **Public Display** - Untuk menampilkan berita ke publik

## Struktur Database
Tabel `beritas` dengan kolom:
- `id` (primary key, auto increment)
- `judul` (string) - Judul berita
- `slug` (string, unique) - Slug untuk URL SEO
- `isi` (text) - Isi berita
- `gambar` (string, nullable) - Path file gambar
- `penulis` (string, nullable) - Nama penulis
- `tanggal` (date, nullable) - Tanggal publikasi
- `status` (enum: 'draft', 'publish') - Status berita
- `created_at`, `updated_at` (timestamps)

## Alur Pengambilan Data

### 1. Model Berita (`app/Models/Berita.php`)
```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'penulis',
        'tanggal',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
```

**Penjelasan:**
- `$fillable`: Menentukan kolom yang boleh diisi mass assignment
- `$casts`: Mengkonversi kolom tanggal menjadi objek Carbon

### 2. Controller Berita (`app/Http/Controllers/BeritaController.php`)

#### Method Index (Menampilkan daftar berita admin)
```php
public function index()
{
    $beritas = Berita::orderBy('created_at', 'desc')->get();
    return view('admin.berita.index', compact('beritas'));
}
```
**Penjelasan:**
- Mengambil semua berita dari database
- Mengurutkan berdasarkan `created_at` descending (terbaru dulu)
- Mengirim data ke view admin

#### Method Store (Menyimpan berita baru)
```php
public function store(Request $request)
{
    $request->validate([...]); // Validasi input

    $slug = Str::slug($request->judul);
    $gambarPath = null;

    // Proses upload gambar
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/gambar_berita');
        $gambarPath = str_replace('public/', 'storage/', $gambarPath);
    }

    Berita::create([
        'judul' => $request->judul,
        'slug' => $slug . '-' . time(),
        'isi' => $request->isi,
        'gambar' => $gambarPath,
        'penulis' => $request->penulis ?? 'Admin',
        'tanggal' => $request->tanggal ?? now(),
        'status' => $request->status,
    ]);

    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
}
```
**Penjelasan:**
- Validasi input dari form
- Generate slug dari judul menggunakan `Str::slug()`
- Upload gambar ke `storage/app/public/gambar_berita`
- Simpan data ke database
- Redirect dengan pesan sukses

#### Method Show (Menampilkan detail berita)
```php
public function show(Berita $berita)
{
    $beritaLainnya = Berita::where('id', '!=', $berita->id)
        ->where('status', 'publish')
        ->latest()
        ->take(3)
        ->get();

    return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
}
```
**Penjelasan:**
- Route Model Binding: Laravel otomatis mencari berita berdasarkan ID
- Mengambil 3 berita lain yang statusnya 'publish'
- Mengirim data ke view detail berita

### 3. Routes (`routes/web.php`)

#### Admin Routes
```php
Route::prefix('admin')->group(function () {
    Route::resource('berita', BeritaController::class)->names([
        'index' => 'admin.berita.index',
        'create' => 'admin.berita.create',
        'store' => 'admin.berita.store',
        'show' => 'admin.berita.show',
        'edit' => 'admin.berita.edit',
        'update' => 'admin.berita.update',
        'destroy' => 'admin.berita.destroy',
    ]);
});
```
**Penjelasan:**
- `Route::resource()` membuat 7 route CRUD otomatis
- Prefix 'admin' untuk mengelompokkan route admin
- Custom names untuk menghindari konflik dengan route publik

#### Public Routes
```php
Route::get('/berita', function () {
    $beritaCollection = \App\Models\Berita::where('status', 'publish')
        ->orderBy('tanggal', 'desc')
        ->get();

    if ($beritaCollection->isEmpty()) {
        $beritaList = BeritaData::getAll(); // Fallback ke data statis
    } else {
        // Convert ke format yang kompatibel dengan view
        $beritaList = $beritaCollection->map(function($berita) {
            return (object) [
                'id' => $berita->id,
                'judul' => $berita->judul,
                'slug' => $berita->slug,
                'kategori' => 'Berita Sekolah',
                'tanggal' => $berita->tanggal ? \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') : '',
                'penulis' => $berita->penulis,
                'gambar' => $berita->gambar,
                'excerpt' => \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100),
                'konten' => $berita->isi,
            ];
        })->toArray();
    }

    return view('pages.berita', compact('beritaList'));
})->name('berita');
```
**Penjelasan:**
- Mengambil berita dengan status 'publish' dari database
- Jika kosong, gunakan data statis dari `BeritaData`
- Convert format database ke format yang expected view
- Format tanggal dari 'Y-m-d' ke 'd F Y' (contoh: "8 Oktober 2025")

### 4. Views

#### Admin Index (`resources/views/admin/berita/index.blade.php`)
```blade
@foreach($beritas as $berita)
    <tr>
        <td>{{ $berita->id }}</td>
        <td>{{ Str::limit($berita->judul, 50) }}</td>
        <td>
            <span class="badge {{ $berita->status == 'publish' ? 'bg-success' : 'bg-warning' }}">
                {{ $berita->status }}
            </span>
        </td>
        <td>{{ $berita->tanggal ? $berita->tanggal->format('d M Y') : 'N/A' }}</td>
        <td>
            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach
```
**Penjelasan:**
- Loop melalui collection berita
- Tampilkan status dengan badge warna
- Tombol edit dan delete dengan form untuk DELETE method

#### Public Berita Page (`resources/views/pages/berita.blade.php`)
```blade
@foreach ($beritaList as $berita)
    <div class="berita-card">
        <div class="card-image">
            <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
        </div>
        <div class="card-content">
            <h3 class="card-title">{{ $berita->judul }}</h3>
            <div class="card-meta">
                <i class="bi bi-calendar"></i>{{ $berita->tanggal }}
            </div>
            <p class="card-excerpt">{{ $berita->excerpt }}</p>
            <a href="{{ route('berita.detail', $berita->id) }}" class="btn-read-more">Baca Selengkapnya</a>
        </div>
    </div>
@endforeach
```
**Penjelasan:**
- Loop melalui array berita
- `asset()` helper untuk generate URL lengkap gambar
- Link ke detail berita menggunakan route name

### 5. Seeder (`database/seeders/BeritaSeeder.php`)
```php
public function run(): void
{
    $beritaData = BeritaData::getAll();

    foreach ($beritaData as $data) {
        $item = is_array($data) ? (object) $data : $data;

        Berita::create([
            'judul' => $item->judul,
            'slug' => Str::slug($item->judul) . '-' . uniqid(),
            'isi' => is_array($item->konten) ? implode("\n\n", $item->konten) : $item->konten,
            'gambar' => $item->gambar ?? null,
            'penulis' => $item->penulis ?? 'Admin',
            'tanggal' => $item->tanggal ? $this->parseIndonesianDate($item->tanggal) : now(),
            'status' => 'publish',
        ]);
    }
}
```
**Penjelasan:**
- Mengambil data dari `BeritaData` (data statis)
- Convert array konten menjadi string
- Parse tanggal Indonesia ke format database
- Set status default 'publish'

## Alur Lengkap

1. **Admin membuat berita baru:**
   - Akses `/admin/berita/create`
   - Isi form dan upload gambar
   - Data disimpan ke database via `BeritaController@store`

2. **Admin mengelola berita:**
   - Akses `/admin/berita` untuk melihat daftar
   - Edit/delete berita via tombol di tabel

3. **Publik melihat berita:**
   - Akses `/berita` - ambil data dari database, fallback ke statis
   - Klik "Baca Selengkapnya" -> `/berita/{id}`
   - Route mengambil data dari database atau fallback

4. **Fallback system:**
   - Jika database kosong, gunakan `BeritaData`
   - Memastikan website tetap berfungsi saat database kosong

## File Upload Flow
1. Form upload gambar di admin
2. File disimpan ke `storage/app/public/gambar_berita/`
3. Path disimpan di database sebagai `storage/gambar_berita/filename.jpg`
4. `php artisan storage:link` membuat symlink agar bisa diakses via web
5. View menggunakan `asset($berita->gambar)` untuk URL lengkap

## Error Handling
- Validasi form di controller
- Route Model Binding untuk findOrFail
- Fallback ke data statis jika database kosong
- 404 jika berita tidak ditemukan

## Optimisasi
- Eager loading bisa ditambahkan untuk relasi jika ada
- Pagination untuk daftar berita admin
- Caching untuk berita yang sering diakses
- Index database untuk kolom yang sering dicari
