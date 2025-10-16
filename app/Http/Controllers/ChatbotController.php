<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    // FAQ Database
    private $faqData = [
        'pendaftaran' => [
            'keywords' => ['daftar', 'pendaftaran', 'spmb', 'masuk', 'bergabung', 'ppdb', 'penerimaan'],
            'response' => '📝 **Informasi Pendaftaran Siswa Baru (SPMB)**\n\nUntuk pendaftaran siswa baru, Anda bisa:\n• Kunjungi halaman SPMB di website kami\n• Hubungi: (0343) 741027\n• Email: smknesaba@yahoo.com\n\nPendaftaran biasanya dibuka bulan Mei-Juni setiap tahun. Pantau terus website kami untuk info terbaru!'
        ],
        'jurusan' => [
            'keywords' => ['jurusan', 'prodi', 'program', 'tkj', 'rpl', 'multimedia', 'akuntansi', 'akl', 'bdp', 'kuliner'],
            'response' => '🎓 **Jurusan di SMKN 1 Bangil**\n\nKami memiliki jurusan unggulan:\n• TKJ (Teknik Komputer Jaringan)\n• RPL (Rekayasa Perangkat Lunak)\n• Multimedia\n• Akuntansi (AKL)\n• Bisnis Digital (BDP)\n• Kuliner\n\nKunjungi halaman Jurusan untuk info lengkap fasilitas dan prospek kerja!'
        ],
        'lokasi' => [
            'keywords' => ['alamat', 'lokasi', 'dimana', 'maps', 'tempat', 'letak', 'posisi'],
            'response' => '📍 **Lokasi SMKN 1 Bangil**\n\nAlamat:\nJl. Raya Rembang No.27\nBangil, Kab. Pasuruan\nJawa Timur 67153\n\nCari di Google Maps: "SMKN 1 Bangil" atau "SMK Nesaba Bangil"\n\nAkses mudah dari terminal Bangil, dekat dengan jalan utama.'
        ],
        'kontak' => [
            'keywords' => ['kontak', 'telepon', 'email', 'hubungi', 'wa', 'whatsapp', 'telp', 'hp'],
            'response' => '📞 **Hubungi Kami**\n\nTelepon: (0343) 741027\nEmail: smknesaba@yahoo.com\nWebsite: smkn1bangil.sch.id\n\nJam Operasional:\nSenin - Jumat: 07.00 - 15.00 WIB\nSabtu: 07.00 - 12.00 WIB\n\nKunjungi halaman Kontak untuk info lebih detail!'
        ],
        'ekstrakurikuler' => [
            'keywords' => ['ekskul', 'ekstrakurikuler', 'kegiatan', 'organisasi', 'osis', 'pramuka', 'olahraga'],
            'response' => '🏆 **Ekstrakurikuler SMKN 1 Bangil**\n\nKami punya banyak ekskul menarik:\n• Pramuka\n• Paskibra\n• PMR (Palang Merah Remaja)\n• Futsal & Basket\n• Volley & Badminton\n• Teater & Seni\n• Robotika & IT Club\n\nLihat halaman Ekstrakurikuler untuk jadwal dan info lengkap!'
        ],
        'prestasi' => [
            'keywords' => ['prestasi', 'penghargaan', 'juara', 'lomba', 'kompetisi', 'achievement'],
            'response' => '🏅 **Prestasi SMKN 1 Bangil**\n\nSekolah kami bangga dengan prestasi siswa di berbagai bidang:\n• Tingkat Kabupaten/Kota\n• Tingkat Provinsi\n• Tingkat Nasional\n\nKami berprestasi di:\n✓ LKS (Lomba Kompetensi Siswa)\n✓ Olahraga\n✓ Seni & Budaya\n✓ Akademik\n\nKunjungi halaman Prestasi untuk lihat daftar lengkapnya!'
        ],
        'biaya' => [
            'keywords' => ['biaya', 'spp', 'uang', 'bayar', 'gratis', 'mahal', 'murah', 'bos'],
            'response' => '💰 **Informasi Biaya**\n\nSMKN 1 Bangil adalah sekolah negeri dengan:\n✓ Bebas SPP (Gratis)\n✓ Program BOS (Bantuan Operasional Sekolah)\n\nBiaya tambahan hanya untuk:\n• Seragam sekolah\n• Kegiatan ekstrakurikuler tertentu\n• Study tour (opsional)\n\nHubungi (0343) 741027 untuk info detail.'
        ],
        'fasilitas' => [
            'keywords' => ['fasilitas', 'lab', 'perpustakaan', 'wifi', 'kantin', 'ruangan', 'sarana'],
            'response' => '🏫 **Fasilitas SMKN 1 Bangil**\n\nFasilitas modern yang kami miliki:\n• Lab Komputer & Multimedia\n• Lab Akuntansi\n• Lab Kuliner\n• Perpustakaan lengkap\n• WiFi gratis\n• Kantin nyaman\n• Lapangan olahraga\n• Masjid\n• Ruang praktek industri\n\nSemua untuk mendukung pembelajaran berkualitas!'
        ],
        'guru' => [
            'keywords' => ['guru', 'pengajar', 'dosen', 'tenaga', 'pendidik', 'staff', 'karyawan'],
            'response' => '👨‍🏫 **Tenaga Pendidik**\n\nSMKN 1 Bangil memiliki:\n• Guru bersertifikat & berpengalaman\n• Lulusan S1 & S2\n• Instruktur profesional di bidangnya\n\nKunjungi halaman "GTK & Siswa" → "Data Pendidik" untuk info lengkap!'
        ],
        'prakerin' => [
            'keywords' => ['prakerin', 'pkl', 'magang', 'industri', 'kerja', 'praktek'],
            'response' => '🏭 **Program Prakerin/PKL**\n\nSiswa kelas 11 akan mengikuti:\n• PKL/Prakerin selama 3-6 bulan\n• Di perusahaan/industri mitra\n• Mendapat sertifikat\n\nMitra industri kami:\n✓ Perusahaan IT\n✓ Hotel & Restoran\n✓ Kantor Akuntan\n✓ Dan banyak lagi!\n\nHubungi BKK kami untuk info lebih lanjut.'
        ]
    ];

    public function handle(Request $request)
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $message = $request->input('message');

        // Gunakan FAQ offline (lebih stabil)
        return $this->handleWithFAQ(strtolower($message));
    }

    // Alias untuk compatibility dengan route 'chat'
    public function chat(Request $request)
    {
        return $this->handle($request);
    }

    /**
     * Handle dengan OpenAI API
     */
    private function handleWithOpenAI($message)
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
                            'content' => 'Kamu adalah asisten AI untuk website SMKN 1 Bangil. Jawab dengan ramah dan informatif dalam bahasa Indonesia. Kamu dapat membantu menjawab pertanyaan tentang profil sekolah, jurusan, ekstrakurikuler, SPMB (Seleksi Penerimaan Murid Baru), dan informasi umum sekolah.'
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
                return response()->json($response->json());
            }

            // Jika OpenAI gagal, fallback ke FAQ
            return $this->handleWithFAQ($message);

        } catch (\Exception $e) {
            Log::error('OpenAI Error: ' . $e->getMessage());
            // Fallback ke FAQ
            return $this->handleWithFAQ($message);
        }
    }

    /**
     * Handle dengan FAQ offline (tanpa API)
     */
    private function handleWithFAQ($message)
    {
        // Tambahkan respons untuk sapaan
        if (preg_match('/\b(halo|hai|hello|hi|hei|selamat|pagi|siang|sore|malam)\b/i', $message)) {
            return response()->json([
                'reply' => 'Halo! Selamat datang di SMKN 1 Bangil. Ada yang bisa saya bantu hari ini? 😊'
            ]);
        }

        // Tambahkan respons untuk terima kasih
        if (preg_match('/\b(terima kasih|thanks|makasih|thx)\b/i', $message)) {
            return response()->json([
                'reply' => 'Sama-sama! Jika ada pertanyaan lain, jangan ragu untuk bertanya. Senang bisa membantu! 😊'
            ]);
        }

        // Cari jawaban dari FAQ
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

        // Jika tidak ada yang cocok, berikan respons default
        if (!$response) {
            $response = "Maaf, saya belum bisa menjawab pertanyaan tersebut. 😅\n\nSilakan hubungi kami di:\n\n📞 (0343) 741027\n📧 smknesaba@yahoo.com\n\nAtau kunjungi halaman Kontak untuk informasi lebih lanjut.\n\nAnda bisa bertanya tentang: pendaftaran, jurusan, lokasi, kontak, ekstrakurikuler, prestasi, biaya, atau fasilitas.";
        }

        // Format response untuk JavaScript
        return response()->json([
            'reply' => $response,
            'category' => $matchedCategory,
            'confidence' => $maxMatch
        ]);
    }
}
