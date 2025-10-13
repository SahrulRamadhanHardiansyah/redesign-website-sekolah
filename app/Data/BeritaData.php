<?php

namespace App\Data;

class BeritaData
{
    public static function getAll()
    {
        return [
            1 => (object) [
                'id' => 1,
                'judul' => 'SIMULASI UJIAN TKA DI SMKN 1 BANGIL',
                'kategori' => 'Berita Sekolah',
                'tanggal' => '8 Oktober 2025',
                'penulis' => 'Ahmad Rafi',
                'gambar' => 'img/berita/ujian-tka.jpg',
                'excerpt' => 'SMKN 1 Bangil melaksanakan kegiatan Simulasi Ujian Tes Kompetensi Akademik (TKA) selama dua hari...',
                'konten' => [
                    'SMKN 1 Bangil melaksanakan kegiatan Simulasi Ujian Tes Kompetensi Akademik (TKA) selama dua hari, yaitu pada tanggal 8 hingga 9 Oktober 2025. Kegiatan ini dilaksanakan di tiga laboratorium, yaitu Lab DKV, Lab PPLG, dan Lab TJKT, dengan diikuti oleh seluruh peserta didik kelas XII dari berbagai kompetensi keahlian.',
                    'Simulasi ujian ini bertujuan untuk mempersiapkan siswa menghadapi ujian sesungguhnya dan memberikan gambaran tentang format soal yang akan diujikan. Kepala Sekolah, Bapak Drs. H. Moch. Bachri, M.Pd., menyampaikan harapannya agar siswa dapat memanfaatkan kesempatan ini dengan sebaik-baiknya.',
                    'Para siswa tampak antusias mengikuti simulasi ujian ini. Mereka berharap dapat memperoleh hasil yang memuaskan pada ujian yang sesungguhnya nanti. Sekolah juga menyediakan pendampingan dari guru-guru untuk membantu siswa yang mengalami kesulitan dalam mengerjakan soal.',


                    'Selama pelaksanaan, peserta tampak antusias dan serius mengerjakan soal pada masing-masing komputer. Guru pengawas dari tiap jurusan turut mendampingi dan memastikan kegiatan berjalan lancar. Selain itu, tim teknis dari masing-masing laboratorium juga siaga membantu jika terjadi kendala teknis selama simulasi berlangsung.',

                    'Kegiatan simulasi TKA ini menjadi salah satu langkah strategis SMKN 1 Bangil dalam mempersiapkan siswanya agar siap menghadapi ujian sebenarnya dengan percaya diri dan hasil yang optimal.'

                ]
            ],
            2 => (object) [
                'id' => 2,
                'judul' => 'SOSIALISASI SPMB TAHUN AJARAN 2025/2026',
                'kategori' => 'Berita Sekolah',
                'tanggal' => '12 Oktober 2025',
                'penulis' => 'Siti Aminah',
                'gambar' => 'img/detail-berita.png',
                'excerpt' => 'SMKN 1 Bangil mengadakan sosialisasi Sistem Penerimaan Murid Baru (SPMB) untuk tahun ajaran 2025/2026...',
                'konten' => [
                    'Selasa, 6 Mei 2025 – SMKN 1 Bangil sukses menggelar sosialisasi Sistem Penerimaan Murid Baru (SPMB) kepada guru SMP/sederajat se-Kecamatan Bangil dan sekitarnya.
                     Acara ini dihadiri langsung oleh Kepala SMKN 1 Bangil dan tim panitia SPMB. Dalam sosialisasi ini, para guru diberi pemahaman lengkap tentang alur pendaftaran, jalur masuk, hingga pemilihan jurusan untuk tahun ajaran 2025 – 2026.
                     Tujuannya? Memastikan informasi PPDB tersampaikan dengan tepat ke siswa dan orang tua melalui peran guru SMP sebagai jembatan utama!',

                     'Terima kasih atas partisipasi seluruh guru SMP yang hadir. Mari bersama wujudkan proses penerimaan peserta didik baru yang lebih transparan, informatif, dan ramah siswa! 🎓'

                ]
            ],
            3 => (object) [
                'id' => 3,
                'judul' => 'Sosialisasi SPMB kepada Guru SMP/Sederajat',
                'kategori' => 'Akademik',
                'tanggal' => '16 Januari 2025',
                'penulis' => 'Budi Santoso',
                'gambar' => 'img/berita-sample.png',
                'excerpt' => 'SMK Negeri 1 Bangil mengadakan sosialisasi SPMB kepada guru-guru SMP dan sederajat...',
                'konten' => [
                    'SMK Negeri 1 Bangil mengadakan sosialisasi Sistem Penerimaan Murid Baru (SPMB) kepada guru-guru SMP dan sederajat di wilayah Kabupaten Pasuruan. Kegiatan ini bertujuan untuk memberikan informasi lengkap tentang program pendidikan yang ditawarkan.',
                    'Dalam sosialisasi ini, dijelaskan mengenai kompetensi keahlian yang tersedia, fasilitas sekolah, prestasi siswa, dan peluang kerja bagi lulusan. Para guru BK dari berbagai SMP antusias mendengarkan penjelasan dan mengajukan berbagai pertanyaan.',
                    'Kepala Sekolah berharap melalui sosialisasi ini, informasi tentang SMKN 1 Bangil dapat tersampaikan dengan baik kepada siswa-siswa SMP yang akan melanjutkan pendidikan ke jenjang SMK.'
                ]
            ],
        ];
    }

    public static function getById($id)
    {
        $allBerita = self::getAll();
        return $allBerita[$id] ?? null;
    }

    public static function getLatest($limit = 3)
    {
        return array_slice(self::getAll(), 0, $limit, true);
    }
}
