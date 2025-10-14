<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan; 

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusans')->delete();

        $jurusans = [
            ['nama_jurusan' => 'Teknik Elektronika', 'kode_jurusan' => 'TE'],
            ['nama_jurusan' => 'Teknik Ketenagalistrikan', 'kode_jurusan' => 'TKL'],
            ['nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'kode_jurusan' => 'TJKT'],
            ['nama_jurusan' => 'Desain dan Produksi Busana', 'kode_jurusan' => 'DPB'],
            ['nama_jurusan' => 'Desain Komunikasi Visual', 'kode_jurusan' => 'DKV'],
            ['nama_jurusan' => 'Broadcasting dan Perfilman', 'kode_jurusan' => 'BP'],
            ['nama_jurusan' => 'Pengembangan Perangkat Lunak dan GIM', 'kode_jurusan' => 'PPLG'],
            ['nama_jurusan' => 'Ototronika', 'kode_jurusan' => 'OTO'],
            ['nama_jurusan' => 'Mekatronika', 'kode_jurusan' => 'MEKA'],
        ];

        // Masukkan data ke dalam tabel
        DB::table('jurusans')->insert($jurusans);


        // Opsi 2: Menggunakan Eloquent Model (Lebih disarankan)
        // Keuntungannya adalah otomatis mengisi `created_at` dan `updated_at`
        // dan menjalankan event/mutator jika ada.
        /*
        Jurusan::truncate(); // Hapus semua data lama

        $jurusansEloquent = [
            ['nama_jurusan' => 'Teknik Elektronika', 'kode_jurusan' => 'TE'],
            ['nama_jurusan' => 'Teknik Ketenagalistrikan', 'kode_jurusan' => 'TKL'],
            ['nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'kode_jurusan' => 'TJKT'],
            ['nama_jurusan' => 'Desain dan Produksi Busana', 'kode_jurusan' => 'DPB'],
            ['nama_jurusan' => 'Desain Komunikasi Visual', 'kode_jurusan' => 'DKV'],
            ['nama_jurusan' => 'Broadcasting dan Perfilman', 'kode_jurusan' => 'BP'],
            ['nama_jurusan' => 'Pengembangan Perangkat Lunak dan GIM', 'kode_jurusan' => 'PPLG'],
            ['nama_jurusan' => 'Ototronika', 'kode_jurusan' => 'OTO'],
            ['nama_jurusan' => 'Mekatronika', 'kode_jurusan' => 'MEKA'],
        ];

        foreach ($jurusansEloquent as $jurusan) {
            Jurusan::create($jurusan);
        }
        */
    }
}