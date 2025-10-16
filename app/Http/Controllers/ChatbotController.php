<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function handleChat(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        // Konfigurasi sistem
        $systemMessage = [
            'role' => 'system',
            'content' => 'Anda adalah asisten virtual SMKN 1 Bangil. Berikan jawaban informatif tentang: '
                . '- Jurusan sekolah '
                . '- Pendaftaran siswa (SPMB) '
                . '- Ekstrakurikuler '
                . '- Informasi umum sekolah '
                . '- Berita terbaru '
                . 'Gunakan bahasa Indonesia yang sopan dan santun. '
                . 'Jika pertanyaan di luar topik, jawab "Maaf, saya hanya bisa membantu informasi seputar SMKN 1 Bangil"'
        ];

        try {
            // Ambil API key dari config
            $apiKey = config('services.openai.api_key');

            if (!$apiKey) {
                throw new \Exception('API key tidak terkonfigurasi');
            }

            // Request ke OpenAI API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(25)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    $systemMessage,
                    ['role' => 'user', 'content' => $request->message]
                ],
                'temperature' => 0.7,
                'max_tokens' => 600,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ]);

            // Handle error response
            if ($response->failed()) {
                Log::error('OpenAI API Error', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);

                return response()->json([
                    'error' => 'Maaf, sedang ada gangguan. Silakan coba lagi nanti.'
                ], 500);
            }

            $data = $response->json();

            return response()->json([
                'reply' => $data['choices'][0]['message']['content'] ?? 'Tidak dapat memproses permintaan Anda'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Input tidak valid: ' . $e->getMessage()
            ], 400);

        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan sistem: ' . ($this->isDebug() ? $e->getMessage() : 'Silakan coba lagi')
            ], 500);
        }
    }

    private function isDebug()
    {
        return config('app.debug');
    }
}
