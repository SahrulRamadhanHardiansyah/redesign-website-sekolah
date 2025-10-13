<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Data berita lengkap
    private function getAllBerita()
    {
        return [
            [
                'id' => 1,
                'judul' => 'SIMULASI UJIAN TKA DI SMKN 1 BANGIL',
                'slug' => 'simulasi-ujian-tka-di-smkn-1-bangil',
                'kategori' => 'Kegiatan Sekolah',
                'tanggal' => '8 Oktober 2025',
                'gambar' => 'img/berita/ujian-tka.jpg',
                'excerpt' => 'SMKN 1 Bangil melaksanakan kegiatan Simulasi Ujian Tes Kompetensi Akademik (TKA) selama dua hari, yaitu pada tanggal 8 hingga 9 Oktober 2025...',
                'konten' => 'SMKN 1 Bangil melaksanakan kegiatan Simulasi Ujian Tes Kompetensi Akademik (TKA) selama dua hari, yaitu pada tanggal 8 hingga 9 Oktober 2025. Kegiatan ini dilaksanakan di tiga laboratorium, yaitu Lab DKV, Lab PPLG, dan Lab TJKT, dengan diikuti oleh seluruh peserta didik kelas XII dari berbagai kompetensi keahlian.

Simulasi ini bertujuan untuk memberikan pengalaman langsung kepada peserta didik dalam menghadapi ujian berbasis komputer yang akan mereka jalani pada ujian sebenarnya. Melalui kegiatan ini, siswa diharapkan dapat lebih terbiasa dengan sistem ujian digital, manajemen waktu, serta memahami jenis-jenis soal yang akan diujikan.

Kegiatan ini mendapat sambutan positif dari para peserta didik. Mereka merasa lebih siap dan percaya diri dalam menghadapi ujian yang sebenarnya. Para guru pengawas juga memberikan dukungan penuh dengan memberikan arahan dan tips-tips menghadapi ujian.

Kepala Sekolah SMKN 1 Bangil menyampaikan bahwa kegiatan simulasi ini merupakan bagian dari upaya sekolah dalam mempersiapkan peserta didik menghadapi ujian akhir. Diharapkan dengan adanya simulasi ini, tingkat kelulusan dan prestasi siswa dapat meningkat.'
            ],
            [
                'id' => 2,
                'judul' => 'SOSIALISASI SPMB SMKN 1 Bangil kepada Guru SMP/Sederajat',
                'slug' => 'sosialisasi-spmb-smkn-1-bangil',
                'kategori' => 'Akademik',
                'tanggal' => '16 Januari 2025',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'SMK Negeri 1 Bangil mengadakan sosialisasi SPMB kepada guru-guru SMP dan sederajat di wilayah Pasuruan untuk memberikan informasi lengkap...',
                'konten' => 'SMK Negeri 1 Bangil mengadakan sosialisasi Seleksi Penerimaan Mahasiswa Baru (SPMB) kepada guru-guru SMP dan sederajat di wilayah Pasuruan. Kegiatan ini bertujuan untuk memberikan informasi lengkap mengenai sistem penerimaan siswa baru di SMKN 1 Bangil.

Dalam kegiatan ini, tim sosialisasi SMKN 1 Bangil menjelaskan berbagai program keahlian yang tersedia, proses pendaftaran, persyaratan, dan jadwal pelaksanaan SPMB. Para guru BK dari berbagai SMP antusias mengikuti sosialisasi ini dan mengajukan berbagai pertanyaan terkait penerimaan siswa baru.

Kepala SMKN 1 Bangil menekankan bahwa sekolah membuka kesempatan seluas-luasnya bagi siswa berprestasi untuk bergabung. Tersedia berbagai program keahlian unggulan seperti Teknik Komputer dan Jaringan, Rekayasa Perangkat Lunak, dan Desain Komunikasi Visual.

Diharapkan dengan adanya sosialisasi ini, guru-guru BK dapat memberikan informasi yang akurat kepada siswa-siswi SMP yang akan melanjutkan ke jenjang SMK.'
            ],
            [
                'id' => 3,
                'judul' => 'Workshop Pembuatan Media Pembelajaran Digital',
                'slug' => 'workshop-media-pembelajaran-digital',
                'kategori' => 'Akademik',
                'tanggal' => '12 Januari 2025',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'SMKN 1 Bangil mengadakan workshop pembuatan media pembelajaran digital untuk meningkatkan kompetensi guru dalam mengajar...',
                'konten' => 'SMKN 1 Bangil mengadakan workshop pembuatan media pembelajaran digital yang diikuti oleh seluruh guru. Workshop ini bertujuan untuk meningkatkan kompetensi guru dalam mengembangkan media pembelajaran yang menarik dan interaktif.

Narasumber workshop adalah praktisi media pembelajaran dari Universitas Negeri Malang yang memiliki pengalaman luas dalam pengembangan konten digital. Para guru dilatih menggunakan berbagai aplikasi seperti Canva, Powtoon, dan Google Sites untuk membuat media pembelajaran yang engaging.

Peserta workshop sangat antusias dalam mengikuti setiap sesi. Mereka langsung mempraktikkan pembuatan media pembelajaran sesuai dengan mata pelajaran masing-masing. Hasil karya terbaik akan dipamerkan dalam pameran pendidikan tingkat kabupaten.

Kepala Sekolah berharap dengan adanya workshop ini, kualitas pembelajaran di SMKN 1 Bangil semakin meningkat dan siswa lebih termotivasi dalam belajar.'
            ],
            [
                'id' => 4,
                'judul' => 'Pengumuman Libur Semester Genap 2024/2025',
                'slug' => 'pengumuman-libur-semester-genap-2024-2025',
                'kategori' => 'Pengumuman',
                'tanggal' => '15 Januari 2025',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'Sekolah mengumumkan jadwal libur semester genap tahun ajaran 2024/2025 yang akan dimulai pada bulan Juni 2025...',
                'konten' => 'Sekolah mengumumkan jadwal libur semester genap tahun ajaran 2024/2025 yang akan dimulai pada tanggal 20 Juni 2025. Libur semester berlangsung selama 2 minggu dan siswa akan masuk kembali pada tanggal 6 Juli 2025.

Selama masa libur, sekolah tetap buka untuk kegiatan administrasi dan pelayanan. Namun, kegiatan pembelajaran dihentikan sementara. Peserta didik diharapkan memanfaatkan waktu libur untuk beristirahat dan mempersiapkan diri untuk semester baru.

Bagi peserta didik kelas XII, masa libur ini dapat digunakan untuk mempersiapkan ujian kelulusan dan menentukan pilihan melanjutkan pendidikan atau memasuki dunia kerja. Sekolah menyediakan layanan konseling yang tetap bisa diakses melalui WhatsApp sekolah.

Informasi lebih lanjut dapat menghubungi bagian tata usaha sekolah. Terima kasih atas perhatiannya.'
            ],
            [
                'id' => 5,
                'judul' => 'Pendaftaran Beasiswa Prestasi Semester Genap',
                'slug' => 'pendaftaran-beasiswa-prestasi-semester-genap',
                'kategori' => 'Pengumuman',
                'tanggal' => '10 Januari 2025',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'Dibuka pendaftaran beasiswa prestasi untuk siswa berprestasi semester genap tahun ajaran 2024/2025...',
                'konten' => 'SMKN 1 Bangil membuka pendaftaran beasiswa prestasi untuk semester genap tahun ajaran 2024/2025. Beasiswa ini diperuntukkan bagi siswa yang memiliki prestasi akademik maupun non-akademik yang membanggakan.

Persyaratan beasiswa meliputi: nilai rata-rata minimal 85, tidak memiliki catatan pelanggaran, dan aktif dalam kegiatan ekstrakurikuler. Peserta didik harus mengumpulkan berkas pendaftaran paling lambat tanggal 31 Januari 2025.

Beasiswa yang diberikan berupa pembebasan biaya pendidikan selama satu semester dan uang pembinaan sebesar Rp 500.000 per bulan. Total penerima beasiswa adalah 20 siswa yang akan dipilih melalui seleksi ketat.

Informasi lengkap dan formulir pendaftaran dapat diunduh melalui website sekolah atau mengambil langsung di ruang BK. Jangan lewatkan kesempatan emas ini!'
            ],
            [
                'id' => 6,
                'judul' => 'Penerimaan Anggota OSIS Periode 2025/2026',
                'slug' => 'penerimaan-anggota-osis-2025-2026',
                'kategori' => 'Pengumuman',
                'tanggal' => '5 Januari 2025',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'OSIS SMKN 1 Bangil membuka pendaftaran anggota baru untuk periode 2025/2026. Terbuka untuk siswa kelas X dan XI...',
                'konten' => 'OSIS SMKN 1 Bangil membuka pendaftaran anggota baru untuk periode kepengurusan 2025/2026. Pendaftaran terbuka untuk seluruh siswa kelas X dan XI yang memiliki jiwa kepemimpinan dan ingin berkontribusi untuk sekolah.

Calon anggota OSIS akan melalui beberapa tahap seleksi, yaitu: seleksi administrasi, wawancara, dan uji kemampuan. Pendaftaran dibuka mulai tanggal 5 hingga 20 Januari 2025 dengan mengisi formulir yang tersedia di sekretariat OSIS.

Anggota OSIS terpilih akan mengikuti Latihan Dasar Kepemimpinan Siswa (LDKS) pada bulan Februari 2025. Setelah itu, mereka akan dilantik dan resmi menjabat untuk periode satu tahun kedepan.

Menjadi pengurus OSIS adalah kesempatan untuk mengembangkan soft skill, membangun networking, dan berkontribusi positif bagi sekolah. Ayo daftarkan dirimu sekarang!'
            ],
            [
                'id' => 7,
                'judul' => 'Peringatan Hari Pendidikan Nasional 2025',
                'slug' => 'peringatan-hardiknas-2025',
                'kategori' => 'Kegiatan Sekolah',
                'tanggal' => '2 Mei 2025',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'SMKN 1 Bangil memperingati Hari Pendidikan Nasional dengan berbagai kegiatan edukatif dan menyenangkan...',
                'konten' => 'SMKN 1 Bangil memperingati Hari Pendidikan Nasional (Hardiknas) 2025 dengan menggelar berbagai kegiatan edukatif dan menyenangkan. Tema peringatan tahun ini adalah "Bergerak Bersama, Rayakan Merdeka Belajar".

Rangkaian acara dimulai dengan upacara bendera yang diikuti oleh seluruh warga sekolah. Kepala Sekolah dalam amanatnya menekankan pentingnya pendidikan karakter di era digital. Dilanjutkan dengan lomba-lomba seperti cerdas cermat, menulis esai, dan pidato bahasa Indonesia.

Puncak acara adalah pentas seni yang menampilkan berbagai penampilan dari siswa, mulai dari tari tradisional, band, drama, hingga fashion show. Antusiasme peserta didik sangat tinggi dan acara berlangsung meriah.

Peringatan Hardiknas ini menjadi momentum untuk merenungkan kembali makna pendidikan dan peran kita dalam memajukan pendidikan Indonesia.'
            ],
            [
                'id' => 8,
                'judul' => 'Kegiatan Bakti Sosial di Panti Asuhan',
                'slug' => 'bakti-sosial-panti-asuhan',
                'kategori' => 'Kegiatan Sekolah',
                'tanggal' => '28 Desember 2024',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'Siswa SMKN 1 Bangil mengadakan bakti sosial ke panti asuhan sebagai wujud kepedulian terhadap sesama...',
                'konten' => 'Siswa SMKN 1 Bangil mengadakan kegiatan bakti sosial ke Panti Asuhan Harapan Bangsa di Pasuruan. Kegiatan ini diikuti oleh 50 siswa perwakilan dari berbagai kelas dan didampingi oleh beberapa guru pembina.

Siswa membawa berbagai bantuan seperti sembako, alat tulis, buku bacaan, dan mainan anak-anak. Selain menyerahkan bantuan, siswa juga mengadakan kegiatan bersama dengan anak-anak panti seperti permainan tradisional, menggambar, dan bernyanyi bersama.

Ketua OSIS menyampaikan bahwa kegiatan ini bertujuan untuk menumbuhkan rasa empati dan kepedulian sosial di kalangan siswa. Anak-anak panti sangat senang dengan kedatangan rombongan dari SMKN 1 Bangil.

Kegiatan bakti sosial ini direncanakan akan menjadi program rutin setiap semester sebagai bentuk tanggung jawab sosial sekolah kepada masyarakat.'
            ],
            [
                'id' => 9,
                'judul' => 'Class Meeting Semester Ganjil 2024/2025',
                'slug' => 'class-meeting-semester-ganjil-2024-2025',
                'kategori' => 'Kegiatan Sekolah',
                'tanggal' => '15 Desember 2024',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'SMKN 1 Bangil menggelar class meeting sebagai ajang kompetisi antar kelas sekaligus refreshing setelah ujian semester...',
                'konten' => 'SMKN 1 Bangil menggelar class meeting semester ganjil tahun ajaran 2024/2025 selama tiga hari, mulai tanggal 15 hingga 17 Desember 2024. Kegiatan ini diikuti oleh seluruh siswa dari kelas X, XI, dan XII.

Berbagai cabang lomba dipertandingkan, antara lain: futsal, basket, voli, badminton, tenis meja, catur, mobile legends, dan free fire. Setiap kelas mengirimkan perwakilannya untuk bertanding memperebutkan gelar juara.

Pertandingan berlangsung sengit dan sportif. Para siswa menunjukkan semangat juang yang tinggi untuk mengharumkan nama kelasnya. Panitia dari OSIS berhasil menyelenggarakan acara dengan lancar dan meriah.

Puncak acara adalah malam penutupan yang diisi dengan pengumuman pemenang dan penampilan hiburan dari siswa. Class meeting tahun ini sukses menjadi ajang silaturahmi dan mempererat tali persaudaraan antar siswa.'
            ]
        ];
    }

    public function index()
    {
        $allBerita = $this->getAllBerita();

        // Berita Unggulan (2 berita pertama)
        $beritaUnggulan = array_slice($allBerita, 0, 2);

        // Berita Akademik (id 2, 3, 4)
        $beritaAkademik = array_filter($allBerita, function($berita) {
            return $berita['kategori'] == 'Akademik';
        });
        $beritaAkademik = array_slice(array_values($beritaAkademik), 0, 3);

        // Pengumuman (id 4, 5, 6)
        $beritaPengumuman = array_filter($allBerita, function($berita) {
            return $berita['kategori'] == 'Pengumuman';
        });
        $beritaPengumuman = array_slice(array_values($beritaPengumuman), 0, 3);

        // Kegiatan Sekolah (id 7, 8, 9)
        $beritaKegiatan = array_filter($allBerita, function($berita) {
            return $berita['kategori'] == 'Kegiatan Sekolah';
        });
        $beritaKegiatan = array_slice(array_values($beritaKegiatan), 0, 3);

        return view('berita.index', compact('beritaUnggulan', 'beritaAkademik', 'beritaPengumuman', 'beritaKegiatan'));
    }

    public function show($slug)
    {
        $allBerita = $this->getAllBerita();

        // Cari berita berdasarkan slug
        $berita = null;
        foreach ($allBerita as $item) {
            if ($item['slug'] == $slug) {
                $berita = $item;
                break;
            }
        }

        if (!$berita) {
            abort(404);
        }

        return view('berita.show', ['berita' => $berita]);
    }
}
