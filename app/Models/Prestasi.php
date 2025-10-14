<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasis';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tahun',
        'tanggal',
        'gambar',
        'is_unggulan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'is_unggulan' => 'boolean',
    ];
}