<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::orderBy('tahun', 'desc')->orderBy('tanggal', 'desc')->get();
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|string|max:10',
            'tanggal' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'is_unggulan' => 'nullable|boolean',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $path = Storage::disk('public')->put('prestasi', $request->file('gambar'));
            $gambarPath = 'storage/' . $path;
        }

        Prestasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarPath,
            'is_unggulan' => $request->has('is_unggulan'),
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|string|max:10',
            'tanggal' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'is_unggulan' => 'nullable|boolean',
        ]);

        $gambarPath = $prestasi->gambar;
        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete(str_replace('storage/', '', $prestasi->gambar));
            }
            $path = Storage::disk('public')->put('prestasi', $request->file('gambar'));
            $gambarPath = 'storage/' . $path;
        }

        $prestasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarPath,
            'is_unggulan' => $request->has('is_unggulan'),
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete(str_replace('storage/', '', $prestasi->gambar));
        }
        $prestasi->delete();
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}