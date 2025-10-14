<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'beritas';

    // Kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'penulis',
        'tanggal',
        'status',
    ];

    // Kolom yang harus diubah menjadi tipe data tertentu
    protected $casts = [
        'tanggal' => 'date',
    ];
}
