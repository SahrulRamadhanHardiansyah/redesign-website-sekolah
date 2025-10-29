<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestBookEntry;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        $entries = GuestBookEntry::latest()->paginate(15); 

        return view('admin.guestbook.index', compact('entries'));
    }


    public function destroy(GuestBookEntry $entry) 
    {
        $entry->delete();

        return redirect()->route('admin.guestbook.index')
                         ->with('success', 'Pesan buku tamu berhasil dihapus.');
    }
}