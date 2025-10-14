<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    protected $fillable = ['nama_jurusan', 'kode_jurusan'];

    /**
     * Mendapatkan semua kelas yang dimiliki oleh Jurusan ini.
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}