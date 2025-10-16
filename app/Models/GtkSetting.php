<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GtkSetting extends Model
{
    use HasFactory;
    protected $table = 'gtk_settings';
    protected $fillable = ['key', 'value'];
}
