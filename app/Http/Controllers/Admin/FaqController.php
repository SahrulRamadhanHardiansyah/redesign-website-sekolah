<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    private function getCategories() {
        return ['pendaftaran', 'jurusan', 'umum', 'fasilitas'];
    }

    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        $categories = $this->getCategories();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => ['required', Rule::in($this->getCategories())],
        ]);

        Faq::create($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        $categories = $this->getCategories();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => ['required', Rule::in($this->getCategories())],
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}