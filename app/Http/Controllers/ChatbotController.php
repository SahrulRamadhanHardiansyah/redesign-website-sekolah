<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Data\JurusanData;
use App\Data\EkstrakurikulerData;
use App\Data\BeritaData;
use App\Models\Setting;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = $request->input('message');

        try {
            $apiKey = config('services.gemini.api_key');
            if (!$apiKey) {
                return response()->json(['reply' => 'Konfigurasi GEMINI_API_KEY tidak ditemukan.'], 500);
            }

            $context = $this->buildWebsiteContext();
            $prompt = "Anda adalah asisten virtual untuk website SMKN 1 Bangil. Gunakan informasi berikut untuk menjawab pertanyaan pengguna secara relevan dan akurat. Jawaban harus dalam format Markdown.\n\n"
                    . "--- Konteks Website ---\n"
                    . $context
                    . "\n--- Pertanyaan Pengguna ---\n"
                    . $message;

            $response = Http::withoutVerifying()
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
                        'contents' => [['parts' => [['text' => $prompt]]]]
                    ]);

            if ($response->successful()) {
                $reply = $response->json('candidates.0.content.parts.0.text', 'Maaf, saya tidak dapat memproses respons dari AI saat ini.');
                return response()->json(['reply' => $reply]);
            }

            Log::error('Gemini API Error: ' . $response->body());
            return response()->json(['reply' => 'Gagal mendapatkan respons dari layanan AI. Detail: ' . $response->body()], 500);

        } catch (\Exception $e) {
            Log::error('Chatbot Exception: ' . $e->getMessage());

            $errorMessage = 'Maaf, terjadi kesalahan pada server chatbot.';
            if (config('app.debug')) {
                $errorMessage .= ' Detail: ' . $e->getMessage();
            }

            return response()->json(['reply' => $errorMessage], 500);
        }
    }

    public function chat(Request $request)
    {
        return $this->handle($request);
    }

    private function buildWebsiteContext(): string
    {
        $jumlahSiswa = Setting::getValue('jumlah_siswa', 1054);

        $infoDasar = "Informasi dasar sekolah: Total siswa saat ini adalah {$jumlahSiswa} orang.";

        $jurusan = "Jurusan yang tersedia: " . implode(', ', array_column(JurusanData::all(), 'nama')) . ".";
        $ekskul = "Ekstrakurikuler yang tersedia: " . implode(', ', array_column(EkstrakurikulerData::getAll(), 'nama')) . ".";

        $beritaTitles = array_map(function($berita) {
            return "- " . $berita->judul;
        }, BeritaData::getLatest(5));
        $berita = "Berita terbaru:\n" . implode("\n", $beritaTitles);

        return "$infoDasar\n$jurusan\n$ekskul\n$berita";
    }
}
