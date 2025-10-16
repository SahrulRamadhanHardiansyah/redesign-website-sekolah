<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ChatbotController extends Controller
{
    // Knowledge base untuk context AI
    private $schoolContext = "
SMKN 1 Bangil (SMK Nesaba) adalah sekolah menengah kejuruan di Bangil, Pasuruan, Jawa Timur.

Informasi Kontak:
- Alamat: Jl. Raya Rembang No.27, Bangil, Kab. Pasuruan, Jawa Timur 67153
- Telepon: (0343) 741027
- Email: smknesaba@yahoo.com
- Website: smkn1bangil.sch.id

Jurusan yang tersedia:
1. TKJ (Teknik Komputer Jaringan)
2. PPLG (Pengembangan Perangkat Lunak dan Gim)
3. DKV (Desain Komunikasi Visual)
4. TK (Teknik Kelistrikan)
5. TE (Teknik Elektro)
6. BP (Brodcasting dan Perfilman)
7. BB (Busana Batik)
8. MEKA (Mekatronika)
9. Ototronika (ototronika)

Program Unggulan:
- PKL/Prakerin 3-6 bulan di industri mitra
- Sertifikasi profesi
- BKK (Bursa Kerja Khusus)
- Ekstrakurikuler: Pramuka, Paskibra, PMR, Futsal, Basket, Robotika, dll

Biaya & Beasiswa:
- Bebas SPP (sekolah negeri)
- Program BOS
- Beasiswa PIP/KIP tersedia

Fasilitas:
- Lab Komputer & Multimedia
- Lab Akuntansi & Kuliner
- Perpustakaan, WiFi gratis, Kantin
- Lapangan olahraga, Masjid

SPMB (Pendaftaran):
- Dibuka bulan Mei-Juni setiap tahun
- Info lengkap di website bagian SPMB

Jam Operasional:
- Senin-Jumat: 07.00-15.00 WIB
- Sabtu: 07.00-12.00 WIB
";

    // FAQ Database untuk fallback
    private $faqData = [
        'pendaftaran' => [
            'keywords' => ['daftar', 'pendaftaran', 'spmb', 'masuk', 'bergabung', 'ppdb', 'penerimaan'],
            'response' => "📝 **Informasi Pendaftaran Siswa Baru (SPMB)**

Untuk pendaftaran siswa baru, Anda bisa:
• Kunjungi halaman SPMB di website kami
• Hubungi: (0343) 741027
• Email: smknesaba@yahoo.com

Pendaftaran biasanya dibuka bulan Mei-Juni setiap tahun. Pantau terus website kami untuk info terbaru!"
        ],
        'jurusan' => [
            'keywords' => ['jurusan', 'prodi', 'program', 'tkj', 'pplg', 'dkv', 'listrik', 'elektronika', 'broadcasting', 'busana', 'mekatronika', 'ototronika'],
            'response' => "🎓 **Jurusan di SMKN 1 Bangil**

Kami memiliki jurusan unggulan:
• TKJ (Teknik Komputer Jaringan)
• RPL (Rekayasa Perangkat Lunak)
• TK (Teknik Kelistrikan)
• TE (Teknik Elektro)


Kunjungi halaman Jurusan untuk info lengkap fasilitas dan prospek kerja!"
        ],
        'lokasi' => [
            'keywords' => ['alamat', 'lokasi', 'dimana', 'maps', 'tempat', 'letak', 'posisi'],
            'response' => "📍 **Lokasi SMKN 1 Bangil**

Alamat:
Jl. Raya Rembang No.27
Bangil, Kab. Pasuruan
Jawa Timur 67153

Cari di Google Maps: \"SMKN 1 Bangil\" atau \"SMK Nesaba Bangil\"

Akses mudah dari terminal Bangil, dekat dengan jalan utama."
        ],
        'kontak' => [
            'keywords' => ['kontak', 'telepon', 'email', 'hubungi', 'wa', 'whatsapp', 'telp', 'hp'],
            'response' => "📞 **Hubungi Kami**

Telepon: (0343) 741027
Email: smknesaba@yahoo.com
Website: smkn1bangil.sch.id

Jam Operasional:
Senin - Jumat: 07.00 - 15.00 WIB
Sabtu: 07.00 - 12.00 WIB

Kunjungi halaman Kontak untuk info lebih detail!"
        ],
    ];

    public function handle(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $message = $request->input('message');
        $lowerMessage = strtolower($message);

        // Handle greetings
        if (preg_match('/\b(halo|hai|hello|hi|hei|selamat|pagi|siang|sore|malam)\b/i', $lowerMessage)) {
            return response()->json([
                'reply' => 'Halo! 👋 Selamat datang di SMKN 1 Bangil. Saya asisten virtual yang siap membantu Anda. Ada yang bisa saya bantu hari ini?',
                'source' => 'greeting'
            ]);
        }

        // Handle thanks
        if (preg_match('/\b(terima kasih|thanks|makasih|thx|thank you)\b/i', $lowerMessage)) {
            return response()->json([
                'reply' => 'Sama-sama! 😊 Jika ada pertanyaan lain, jangan ragu untuk bertanya. Senang bisa membantu!',
                'source' => 'thanks'
            ]);
        }

        // Try AI first (OpenAI or Gemini)
        $aiResponse = $this->tryAIProviders($message);

        if ($aiResponse) {
            return response()->json([
                'reply' => $aiResponse['reply'],
                'source' => $aiResponse['source']
            ]);
        }

        // Fallback to FAQ offline
        return $this->handleWithFAQ($lowerMessage);
    }

    // Alias untuk compatibility
    public function chat(Request $request)
    {
        return $this->handle($request);
    }

    /**
     * Try multiple AI providers in order
     */
    private function tryAIProviders($message)
    {
        // Try OpenAI first
        if ($this->hasValidApiKey('OPENAI_API_KEY')) {
            $response = $this->callOpenAI($message);
            if ($response) {
                return [
                    'reply' => $response,
                    'source' => 'openai'
                ];
            }
        }

        // Try Gemini if OpenAI failed
        if ($this->hasValidApiKey('GEMINI_API_KEY')) {
            $response = $this->callGemini($message);
            if ($response) {
                return [
                    'reply' => $response,
                    'source' => 'gemini'
                ];
            }
        }

        // Try Claude (Anthropic) if available
        if ($this->hasValidApiKey('ANTHROPIC_API_KEY')) {
            $response = $this->callClaude($message);
            if ($response) {
                return [
                    'reply' => $response,
                    'source' => 'claude'
                ];
            }
        }

        return null;
    }

    /**
     * Check if API key is valid
     */
    private function hasValidApiKey($keyName)
    {
        $key = env($keyName);
        return !empty($key) && strlen($key) > 20;
    }

    /**
     * Call OpenAI API
     */
    private function callOpenAI($message)
    {
        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => "Kamu adalah asisten virtual SMKN 1 Bangil yang ramah dan membantu. Jawab dalam bahasa Indonesia dengan format markdown sederhana (**bold** untuk judul, • untuk list). Gunakan emoji yang relevan. Jawab singkat tapi informatif (maksimal 200 kata).\n\nKonteks Sekolah:\n" . $this->schoolContext
                        ],
                        [
                            'role' => 'user',
                            'content' => $message
                        ],
                    ],
                    'max_tokens' => 500,
                    'temperature' => 0.7,
                ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['choices'][0]['message']['content'] ?? null;
            }

            Log::warning('OpenAI request failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

        } catch (\Exception $e) {
            Log::error('OpenAI Error: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Call Google Gemini API
     */
    private function callGemini($message)
    {
        try {
            $apiKey = env('GEMINI_API_KEY');
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$apiKey}";

            $response = Http::timeout(30)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($url, [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => "Kamu adalah asisten virtual SMKN 1 Bangil yang ramah. Jawab dalam bahasa Indonesia dengan format markdown sederhana. Gunakan emoji relevan. Maksimal 200 kata.\n\nKonteks:\n" . $this->schoolContext . "\n\nPertanyaan: " . $message
                                ]
                            ]
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'maxOutputTokens' => 500,
                    ]
                ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
            }

            Log::warning('Gemini request failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

        } catch (\Exception $e) {
            Log::error('Gemini Error: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Call Anthropic Claude API
     */
    private function callClaude($message)
    {
        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'x-api-key' => env('ANTHROPIC_API_KEY'),
                    'Content-Type' => 'application/json',
                    'anthropic-version' => '2023-06-01'
                ])
                ->post('https://api.anthropic.com/v1/messages', [
                    'model' => 'claude-3-haiku-20240307',
                    'max_tokens' => 500,
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Kamu adalah asisten virtual SMKN 1 Bangil. Jawab dalam bahasa Indonesia dengan markdown sederhana. Gunakan emoji. Maksimal 200 kata.\n\nKonteks:\n" . $this->schoolContext . "\n\nPertanyaan: " . $message
                        ]
                    ]
                ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['content'][0]['text'] ?? null;
            }

            Log::warning('Claude request failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

        } catch (\Exception $e) {
            Log::error('Claude Error: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Fallback ke FAQ offline
     */
    private function handleWithFAQ($message)
    {
        $response = null;
        $maxMatch = 0;
        $matchedCategory = '';

        foreach ($this->faqData as $category => $data) {
            $matchCount = 0;

            foreach ($data['keywords'] as $keyword) {
                if (strpos($message, $keyword) !== false) {
                    $matchCount++;
                }
            }

            if ($matchCount > $maxMatch) {
                $maxMatch = $matchCount;
                $response = $data['response'];
                $matchedCategory = $category;
            }
        }

        if (!$response) {
            $response = "Maaf, saya belum bisa menjawab pertanyaan tersebut. 😅

Silakan hubungi kami di:

📞 (0343) 741027
📧 smknesaba@yahoo.com

Atau kunjungi halaman Kontak untuk informasi lebih lanjut.

**Topik yang bisa saya bantu:**
• Pendaftaran & SPMB
• Jurusan & Program Studi
• Lokasi & Alamat
• Kontak & Informasi Umum";
        }

        return response()->json([
            'reply' => $response,
            'source' => 'faq',
            'category' => $matchedCategory,
            'confidence' => $maxMatch
        ]);
    }
}
