<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GtkSetting;
use Illuminate\Http\Request;

class GtkPageController extends Controller
{
    /**
     * Menampilkan form untuk mengedit data statistik.
     */
    public function edit()
    {
        // Ambil semua setting dari database, ubah menjadi array [key => value]
        $settings = GtkSetting::pluck('value', 'key')->all();

        // Decode semua data yang disimpan sebagai JSON agar bisa di-loop di view
        $jsonKeys = [
            'pendidik_gender', 'pendidik_pendidikan', 'pendidik_sertifikasi', 
            'tendik_gender', 'tendik_posisi', 
            'siswa_gender', 'siswa_per_jurusan', 'siswa_per_tingkat'
        ];

        foreach($jsonKeys as $key) {
            // Coba decode string JSON menjadi array
            $decoded = json_decode($settings[$key] ?? '[]', true);
            // Pastikan hasilnya adalah array, jika tidak, buat array kosong
            $settings[$key] = is_array($decoded) ? $decoded : ['labels' => [], 'data' => []];
        }
        
        return view('admin.gtk.edit', compact('settings'));
    }

    /**
     * Memperbarui data statistik di database.
     */
    public function update(Request $request)
    {
        $allSettings = $request->except(['_token', '_method']);

        foreach ($allSettings as $key => $value) {
            // Jika data yang dikirim adalah array (dari form chart),
            // kita ubah formatnya dan encode menjadi JSON sebelum disimpan.
            if (is_array($value)) {
                // Filter baris kosong yang mungkin dikirim oleh form
                $filteredValue = array_filter($value, function($item) {
                    return !empty($item['label']) && isset($item['data']);
                });

                // Ubah struktur array dari [0 => ['label' => 'X', 'data' => 1]]
                // menjadi ['labels' => ['X'], 'data' => [1]]
                $restructuredValue = [
                    'labels' => array_column($filteredValue, 'label'),
                    'data' => array_column($filteredValue, 'data'),
                ];
                $value = json_encode($restructuredValue);
            }
            
            // Simpan atau perbarui data di database
            GtkSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.gtk.edit')->with('success', 'Data Statistik GTK & Siswa berhasil diperbarui!');
    }
}