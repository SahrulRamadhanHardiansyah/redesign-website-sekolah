<?php

namespace App\Http\Controllers;

use App\Models\GuestBookEntry;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        $entries = GuestBookEntry::latest()->paginate(10); 

        return view('pages.guestbook', compact('entries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string|max:1000', 
        ]);

        GuestBookEntry::create($validated);

        return redirect()->route('guestbook.index')->with('success', 'Terima kasih, pesan Anda telah ditambahkan!');
    }
}