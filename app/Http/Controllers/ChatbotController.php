<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        // Log incoming request
        Log::info('Chatbot request received', ['message' => $request->input('message')]);

        // Validate input
        try {
            $request->validate([
                'message' => 'required|string|max:1000',
            ]);
        } catch (\Exception $e) {
            Log::error('Validation error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Invalid input'], 400);
        }

        $message = $request->input('message');


        // Check if API key exists
        $apiKey = config('services.openai.api_key');
        if (!$apiKey) {
            Log::error('OpenAI API key not found');
            return response()->json([
                'error' => 'API key not configured',
            ], 500);
        }

        Log::info('API key found', ['key_length' => strlen($apiKey)]);

        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Kamu adalah asisten virtual SMKN 1 Bangil yang ramah dan membantu. Kamu membantu menjawab pertanyaan tentang sekolah, jurusan, pendaftaran (SPMB), ekstrakurikuler, dan informasi umum sekolah. Jawab dengan bahasa Indonesia yang sopan dan informatif.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $message
                        ],
                    ],
                    'max_tokens' => 500,
                    'temperature' => 0.7,
                ]);

            if ($response->failed()) {
                Log::error('OpenAI API Error', [
                    'status' => $response->status(),
                    'body' => $response->json(),
                ]);

                return response()->json([
                    'error' => 'Maaf, terjadi kesalahan. Silakan coba lagi.',
                ], 500);
            }

            $data = $response->json();

            return response()->json([
                'reply' => $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak bisa memproses pesan Anda.',
            ]);

        } catch (\Exception $e) {
            Log::error('Chatbot Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'error' => 'Maaf, terjadi kesalahan sistem. Silakan coba lagi nanti.',
            ], 500);
        }
    }
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $userMessage = $request->input('message');

            $resp = Http::withToken(env('OPENAI_API_KEY'))
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Anda adalah asisten virtual situs sekolah. Jawab singkat dan sopan.'],
                        ['role' => 'user', 'content' => $userMessage],
                    ],
                    'max_tokens' => 500,
                ]);

            if (! $resp->successful()) {
                Log::error('OpenAI request failed', ['status' => $resp->status(), 'body' => $resp->body()]);
                return response()->json(['error' => 'AI provider error'], 500);
            }

            $data = $resp->json();
            $reply = $data['choices'][0]['message']['content'] ?? ($data['error']['message'] ?? 'Tidak ada respons dari AI.');

            return response()->json(['reply' => trim($reply)]);
        } catch (\Throwable $e) {
            Log::error('Chatbot exception: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['error' => 'Server error', 'detail' => $e->getMessage()], 500);
        }
    }
}
