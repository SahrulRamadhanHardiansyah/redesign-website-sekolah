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
                'judul' => 'Semangat Pagi Ceria, Wujudkan Siswa Sehat dan Berkarakter di SMKN 1 Bangil',
                'kategori' => 'Berita Sekolah',
                'tanggal' => '2 Oktober 2025',
                'penulis' => 'Achmad Nafi',
                'gambar' => 'img/berita/pagiceria.png',
                'excerpt' => 'Semangat Pagi Ceria, Wujudkan Siswa Sehat dan Berkarakter di SMKN 1 Bangil',
                'konten' => [
                    'Bangil – Dalam rangka menumbuhkan semangat belajar, membentuk karakter siswa, serta membiasakan pola hidup sehat dan disiplin, SMKN 1 Bangil melaksanakan program rutin bertajuk “Pagi Ceria”. Kegiatan ini dilaksanakan setiap pagi sebelum masuk kelas, mulai hari Senin hingga Jumat.

“Pagi Ceria” terbagi menjadi lima jenis kegiatan, yaitu:

1.Kebugaran – Senam pagi dan aktivitas fisik ringan untuk menjaga kesehatan tubuh siswa.

2.Kedisiplinan – Penanaman nilai tertib, tepat waktu, dan kepatuhan terhadap tata tertib sekolah.

3.Imtaq (Iman dan Taqwa) – Pembiasaan doa bersama, kultum, dan pembinaan rohani sesuai agama masing-masing.

4.Pembinaan Wali Kelas (Walas) – Ruang pembinaan karakter, komunikasi, dan arahan langsung dari wali kelas kepada peserta didik.

5.PLH (Pendidikan Lingkungan Hidup) – Kegiatan peduli lingkungan seperti kerja bakti, penghijauan, dan menjaga kebersihan sekolah.

Kegiatan ini berlangsung secara bergantian setiap harinya dengan jadwal yang telah diatur sekolah. Dengan adanya program ini, diharapkan suasana sekolah semakin kondusif, siswa menjadi lebih bersemangat, dan nilai-nilai profil pelajar Pancasila dapat terwujud dalam keseharian.',

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
