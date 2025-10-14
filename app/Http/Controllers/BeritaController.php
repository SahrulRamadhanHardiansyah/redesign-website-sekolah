<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar semua berita (Read - Index).
     * Akan digunakan untuk halaman admin/dashboard.
     */
    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->get();
        return view('admin.berita.index', compact('beritas')); // Asumsi view admin
    }

    /**
     * Tampilkan form untuk membuat berita baru (Create - Form).
     */
    public function create()
    {
        return view('admin.berita.create'); // Asumsi view admin
    }

    /**
     * Simpan berita baru ke database (Create - Store).
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'nullable|date',
            'status' => 'required|in:draft,publish',
        ]);

        $slug = Str::slug($request->judul);
        $gambarPath = null;

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $path = Storage::disk('public')->put('gambar_berita', $request->file('gambar'));
            $gambarPath = 'storage/' . $path;
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

    /**
     * Tampilkan detail berita (Read - Show).
     * Ini digunakan untuk halaman detail front-end.
     * Anda sudah memiliki rute ini di web.php, kita akan ubah implementasinya.
     */
    public function show(Berita $berita)
    {
        // Berita $berita melakukan Route Model Binding berdasarkan ID/slug
        // Logika rute front-end: Berita::where('status', 'publish')->findOrFail($id);
        // Tapi untuk CRUD, kita asumsikan ini adalah detail admin atau publik dengan model binding.
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
    }

    /**
     * Tampilkan form untuk mengedit berita (Update - Form).
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita')); // Asumsi view admin
    }

    /**
     * Perbarui berita di database (Update - Store/Patch).
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'nullable|date',
            'status' => 'required|in:draft,publish',
        ]);

        $slug = Str::slug($request->judul);
        $gambarPath = $berita->gambar; // Pertahankan gambar lama

        // Proses upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                $oldPath = str_replace('storage/', '', $berita->gambar);
                Storage::disk('public')->delete($oldPath);
            }
            // Simpan gambar baru
            $path = Storage::disk('public')->put('gambar_berita', $request->file('gambar'));
            $gambarPath = 'storage/' . $path;
        }

        $berita->update([
            'judul' => $request->judul,
            // Hanya update slug jika judul berubah, untuk sementara kita buat simpel
            'slug' => $slug . '-' . $berita->id, // Agar unik & tidak berubah
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'penulis' => $request->penulis ?? 'Admin',
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita dari database (Delete - Destroy).
     */
    public function destroy(Berita $berita)
    {
        // Hapus gambar terkait
        if ($berita->gambar) {
            $oldPath = str_replace('storage/', 'public/', $berita->gambar);
            Storage::delete($oldPath);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
