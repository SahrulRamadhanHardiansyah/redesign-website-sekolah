<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::truncate();

        $faqs = [
            [
                'category' => 'pendaftaran',
                'question' => 'Kapan pendaftaran PPDB dibuka?',
                'answer' => 'Pendaftaran PPDB SMK Negeri 1 Bangil biasanya dibuka pada bulan Mei setiap tahunnya. Untuk informasi lebih detail mengenai jadwal pendaftaran, silakan pantau website resmi sekolah atau media sosial kami.'
            ],
            [
                'category' => 'pendaftaran',
                'question' => 'Dokumen apa saja yang diperlukan untuk pendaftaran?',
                'answer' => "Dokumen yang diperlukan meliputi:\n* Fotokopi akta kelahiran\n* Fotokopi kartu keluarga\n* Fotokopi ijazah SMP/sederajat\n* Pas foto 3x4 (latar belakang merah)\n* Fotokopi rapor SMP kelas 7-9"
            ],
            [
                'category' => 'jurusan',
                'question' => 'Berapa banyak program keahlian yang tersedia?',
                'answer' => 'SMK Negeri 1 Bangil menyediakan 9 program keahlian unggulan yang relevan dengan kebutuhan industri saat ini. Setiap program keahlian dirancang untuk membekali siswa dengan keterampilan dan pengetahuan yang dibutuhkan di dunia kerja.'
            ],
            [
                'category' => 'jurusan',
                'question' => 'Apakah ada tes khusus untuk memilih jurusan?',
                'answer' => 'Ya, terdapat tes minat dan bakat untuk membantu siswa memilih program keahlian yang sesuai dengan potensi dan minat mereka. Tes ini bertujuan untuk memastikan siswa berada di jurusan yang tepat.'
            ],
            [
                'category' => 'umum',
                'question' => 'Berapa biaya pendidikan di SMK Negeri 1 Bangil?',
                'answer' => 'SMK Negeri 1 Bangil merupakan sekolah negeri sehingga tidak memungut biaya SPP. Hanya ada beberapa komponen biaya seperti uang praktik, seragam, dan kegiatan pembelajaran yang besarnya telah ditetapkan sesuai peraturan.'
            ],
            [
                'category' => 'umum',
                'question' => 'Apakah tersedia asrama untuk siswa?',
                'answer' => 'Saat ini SMK Negeri 1 Bangil belum menyediakan asrama untuk siswa. Namun, sekolah dapat membantu memberikan informasi mengenai tempat tinggal di sekitar sekolah bagi siswa yang berasal dari luar kota.'
            ],
            [
                'category' => 'fasilitas',
                'question' => 'Fasilitas apa saja yang tersedia di sekolah?',
                'answer' => "SMK Negeri 1 Bangil dilengkapi dengan berbagai fasilitas modern seperti:\n* Laboratorium komputer dan praktik\n* Perpustakaan digital\n* Ruang kelas ber-AC\n* Wi-Fi area\n* Lapangan olahraga\n* Mushola\n* Kantin sehat"
            ],
            [
                'category' => 'fasilitas',
                'question' => 'Apakah sekolah menyediakan akses internet untuk siswa?',
                'answer' => 'Ya, sekolah menyediakan akses Wi-Fi gratis untuk siswa yang dapat digunakan untuk keperluan pembelajaran. Akses internet diatur dan diawasi untuk memastikan digunakan secara bertanggung jawab.'
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}