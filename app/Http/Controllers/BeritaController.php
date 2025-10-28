<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->get();
        return view('admin.berita.index', compact('beritas')); 
    }

    public function create()
    {
        return view('admin.berita.create'); 
    }

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

    public function show(Berita $berita)
    {
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.detail-berita', compact('berita', 'beritaLainnya'));
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita')); 
    }

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
        $gambarPath = $berita->gambar; 


        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                $oldPath = str_replace('storage/', '', $berita->gambar);
                Storage::disk('public')->delete($oldPath);
            }
            $path = Storage::disk('public')->put('gambar_berita', $request->file('gambar'));
            $gambarPath = 'storage/' . $path;
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => $slug . '-' . $berita->id, 
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'penulis' => $request->penulis ?? 'Admin',
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            $oldPath = str_replace('storage/', 'public/', $berita->gambar);
            Storage::delete($oldPath);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
