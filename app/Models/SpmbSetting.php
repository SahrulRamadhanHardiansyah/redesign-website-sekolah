<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpmbSetting extends Model
{
    use HasFactory;

    protected $table = 'spmb_settings';

    protected $fillable = ['key', 'value'];
}