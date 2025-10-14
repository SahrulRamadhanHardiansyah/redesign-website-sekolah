<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpmbSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpmbPageController extends Controller
{
    /**
     * Menampilkan form untuk mengedit halaman SPMB.
     */
    public function edit()
    {
        // Ambil semua setting dan ubah menjadi array asosiatif [key => value]
        $settings = SpmbSetting::pluck('value', 'key')->all();

        // Decode JSON fields untuk dikirim ke view
        $settings['alur_pendaftaran'] = json_decode($settings['alur_pendaftaran'] ?? '[]', true);
        $settings['jadwal_penting'] = json_decode($settings['jadwal_penting'] ?? '[]', true);
        $settings['faq'] = json_decode($settings['faq'] ?? '[]', true);
        $decoded_syarat = json_decode($settings['syarat_umum'] ?? '[]', true);
        $settings['syarat_umum'] = is_array($decoded_syarat) ? $decoded_syarat : [];

        $decoded_berkas = json_decode($settings['berkas_wajib'] ?? '[]', true);
        $settings['berkas_wajib'] = is_array($decoded_berkas) ? $decoded_berkas : [];

        return view('admin.spmb.edit', compact('settings'));
    }

    /**
     * Menyimpan perubahan dari form.
     */
    public function update(Request $request)
    {
        // Validasi input dasar
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kontak_wa' => 'required|string',
            'kontak_email' => 'required|email',
        ]);

        // Loop melalui semua input dan simpan ke database
        $allSettings = $request->except(['_token', '_method', 'hero_image']);

        foreach ($allSettings as $key => $value) {
            // Untuk data yang berulang (array), encode menjadi JSON
            if (is_array($value)) {
                // Filter array kosong sebelum menyimpan
                $value = array_filter($value, function($item) {
                    // Memastikan semua field dalam satu baris diisi
                    return !in_array(null, array_values($item), true);
                });
                $value = json_encode($value);
            }

            SpmbSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Proses upload gambar hero
        if ($request->hasFile('hero_image')) {
            $setting = SpmbSetting::firstWhere('key', 'hero_image');
            if ($setting && $setting->value) {
                Storage::disk('public')->delete(str_replace('storage/', '', $setting->value));
            }
            $path = Storage::disk('public')->put('spmb', $request->file('hero_image'));
            SpmbSetting::updateOrCreate(['key' => 'hero_image'], ['value' => 'storage/' . $path]);
        }

        return redirect()->route('admin.spmb.edit')->with('success', 'Halaman SPMB berhasil diperbarui!');
    }
}