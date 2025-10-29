<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBookEntry extends Model
{
    use HasFactory;

    protected $table = 'guest_book_entries'; 

    protected $fillable = [
        'name',
        'message',
    ];
}