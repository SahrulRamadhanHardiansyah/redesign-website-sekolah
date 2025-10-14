<?php

namespace App\Data;

class EkstrakurikulerData
{
    public static function getAll()
    {
        return [
            [
                'id' => 1,
                'nama' => 'Palang Merah Remaja (PMR)',
                'slug' => 'palang-merah-remaja-pmr',
                'kategori' => 'Kesehatan',
                'gambar' => 'img/ekstrakurikuler/PMR.jpg',
                'logo' => 'img/ekstrakurikuler/logo-pmr.png',
                'deskripsi_singkat' => 'PMR adalah wadah pembinaan dan pengembangan anggota remaja yang dilaksanakan oleh Palang Merah Indonesia.',
                'deskripsi_lengkap' => 'Palang Merah Remaja (PMR) adalah wadah pembinaan dan pengembangan anggota remaja yang dilaksanakan oleh Palang Merah Indonesia. Terdapat di tiap tingkatan PMI di seluruh Indonesia dengan anggota lebih dari 5 juta orang. Anggota PMR melaksanakan salah satu kekuatan PMI dalam melaksanakan kegiatan-kegiatan kemanusiaan di bidang kesehatan dan siaga bencana, mempromosikan Prinsip-Prinsip Dasar Gerakan Palang Merah dan Bulan Sabit Merah Internasional, serta mengembangkan kapasitas organisasi PMI di wilayah yang bersangkutan.',
                'tujuan' => [
                    'Penguatan kualitas remaja dan pembentukan karakter',
                    'Anggota PMR sebagai contoh dalam berperilaku hidup sehat bagi teman sebaya',
                    'Anggota PMR dapat memberikan motivasi bagi teman sebaya untuk berperilaku hidup sehat',
                    'Anggota PMR sebagai pendidik remaja sebaya',
                    'Anggota PMR adalah calon relawan masa depan'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Jumbara',
                        'deskripsi' => 'Jumbara atau Jumpa Bhakti Gembira adalah salah satu kegiatan besar organisasi PMI disetiap tingkatan untuk pembinaan dan pengembangan PMR seperti halnya jambore pada organisasi Pramuka. Jumbara diadakan dalam setiap tingkat PMI. Ada jumbara tingkat kecamatan, kabupaten/kota, provinsi dan Jumbara Nasional, di mana pelaksanaannya disesuaikan dengan kemampuan PMI di wilayah yang bersangkutan.'
                    ],
                    [
                        'judul' => 'Tribakti PMR',
                        'deskripsi' => 'Setiap anggota PMR memiliki tugas yang harus dilaksanakan. dalam PMR dikenal tri bakti yang harus diketahui, dipahami dan dilaksanakan oleh semua anggota. TRIBAKTI PMR (2009) tersebut adalah: Meningkatkan nilai keterampilan dalam kebersihan dan kesehatan. Berkarya dan berbakti kepada masyarakat. Mempererat tali persahabatan nasional dan internasional.'
                    ]
                ],
                'pembina' => 'Ibu Siti Nurhaliza, S.Pd',
                'jadwal' => 'Setiap hari Jumat, 15:00 - 17:00 WIB',
                'tempat' => 'Ruang PMR & UKS'
            ],
            [
                'id' => 2,
                'nama' => 'Pecinta Alam',
                'slug' => 'pecinta-alam',
                'kategori' => 'Alam',
                'gambar' => 'img/ekstrakurikuler/Pecinta-alam.jpg',
                'logo' => 'img/ekstrakurikuler/logo-pecinta-alam.png',
                'deskripsi_singkat' => 'Organisasi yang bergerak dalam kegiatan alam terbuka, pendakian gunung, dan pelestarian lingkungan.',
                'deskripsi_lengkap' => 'Pecinta Alam SMKN 1 Bangil adalah organisasi siswa yang fokus pada kegiatan kepecintaalaman, pendakian gunung, penelusuran gua, susur sungai, dan berbagai aktivitas alam terbuka lainnya. Ekstrakurikuler ini tidak hanya mengajarkan teknik survival dan petualangan, tetapi juga menanamkan nilai-nilai kepedulian terhadap kelestarian lingkungan, kerjasama tim, kemandirian, dan tanggung jawab.',
                'tujuan' => [
                    'Menumbuhkan rasa cinta terhadap alam dan lingkungan',
                    'Melatih mental, fisik, dan spiritual siswa',
                    'Mengembangkan jiwa petualang dan keberanian',
                    'Membangun karakter kepemimpinan dan kerjasama tim',
                    'Meningkatkan kepedulian terhadap pelestarian lingkungan'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Pendakian Gunung',
                        'deskripsi' => 'Kegiatan pendakian ke berbagai gunung di Jawa Timur seperti Gunung Bromo, Semeru, Arjuno, dan lainnya. Anggota dilatih teknik pendakian yang aman, navigasi, dan survival di alam terbuka.'
                    ],
                    [
                        'judul' => 'Latihan Rutin',
                        'deskripsi' => 'Latihan fisik, teknik tali-temali, packing carrier, navigasi darat, P3K, dan materi kepecintaalaman lainnya dilaksanakan setiap minggu untuk mempersiapkan anggota dalam setiap kegiatan.'
                    ],
                    [
                        'judul' => 'Aksi Lingkungan',
                        'deskripsi' => 'Kegiatan bersih-bersih lingkungan, penanaman pohon, dan kampanye pelestarian alam sebagai wujud kepedulian terhadap lingkungan.'
                    ]
                ],
                'pembina' => 'Bapak Eko Prasetyo, S.Pd',
                'jadwal' => 'Setiap hari Sabtu, 14:00 - 17:00 WIB',
                'tempat' => 'Lapangan Sekolah & Alam Terbuka'
            ],
            [
                'id' => 3,
                'nama' => 'Pramuka',
                'slug' => 'pramuka',
                'kategori' => 'Kepanduan',
                'gambar' => 'img/ekstrakurikuler/Pramuka.jpg',
                'logo' => 'img/ekstrakurikuler/logo-pramuka.png',
                'deskripsi_singkat' => 'Gerakan Pramuka adalah organisasi pendidikan kepanduan yang membentuk karakter dan keterampilan generasi muda.',
                'deskripsi_lengkap' => 'Pramuka SMKN 1 Bangil adalah wadah pembinaan dan pengembangan generasi muda melalui kegiatan kepramukaan. Anggota pramuka dilatih untuk memiliki karakter yang kuat, keterampilan hidup, jiwa kepemimpinan, dan semangat kebangsaan. Kegiatan pramuka mencakup pembelajaran outdoor, keterampilan survival, pertolongan pertama, pioneering, dan berbagai kegiatan yang mengembangkan fisik, mental, dan spiritual.',
                'tujuan' => [
                    'Membentuk karakter dan kepribadian yang berakhlak mulia',
                    'Menanamkan semangat kebangsaan dan cinta tanah air',
                    'Mengembangkan keterampilan dan kemandirian',
                    'Melatih jiwa kepemimpinan dan kerjasama',
                    'Membina kesegaran jasmani dan daya kreasi'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Latihan Rutin',
                        'deskripsi' => 'Setiap minggu anggota pramuka mengikuti latihan rutin yang meliputi PBB, sandi, morse, tali-temali, pioneering, tracking, P3K, dan materi kepramukaan lainnya.'
                    ],
                    [
                        'judul' => 'Perkemahan',
                        'deskripsi' => 'Kegiatan perkemahan seperti Perkemahan Sabtu Minggu (PERSAMI), Perkemahan Bakti, dan Jambore yang melatih kemandirian dan kerjasama anggota.'
                    ],
                    [
                        'judul' => 'Bakti Sosial',
                        'deskripsi' => 'Kegiatan pengabdian kepada masyarakat seperti kerja bakti, membantu korban bencana, dan berbagai kegiatan sosial lainnya.'
                    ]
                ],
                'pembina' => 'Bapak Agus Salim, S.Pd & Ibu Ratna Dewi, S.Pd',
                'jadwal' => 'Setiap hari Jumat, 14:00 - 17:00 WIB',
                'tempat' => 'Lapangan Upacara & Area Sekolah'
            ],
            [
                'id' => 4,
                'nama' => 'Paskibra',
                'slug' => 'paskibra',
                'kategori' => 'Baris-Berbaris',
                'gambar' => 'img/ekstrakurikuler/Paskibraka.webp',
                'logo' => 'img/ekstrakurikuler/logo-paskibra.png',
                'deskripsi_singkat' => 'Pasukan Pengibar Bendera Pusaka adalah wadah pembinaan siswa dalam baris-berbaris dan kedisiplinan.',
                'deskripsi_lengkap' => 'Paskibra SMKN 1 Bangil adalah ekstrakurikuler yang melatih siswa dalam kemampuan baris-berbaris, kedisiplinan tinggi, dan jiwa nasionalisme. Anggota Paskibra adalah perwakilan sekolah dalam upacara-upacara resmi dan kompetisi LBB (Lomba Baris-Berbaris). Kegiatan ini membentuk karakter siswa yang disiplin, tegas, tanggung jawab, dan memiliki jiwa kepemimpinan.',
                'tujuan' => [
                    'Membentuk kedisiplinan dan tanggung jawab tinggi',
                    'Melatih kekompakan dan kerjasama tim',
                    'Menanamkan jiwa nasionalisme dan patriotisme',
                    'Mengembangkan kemampuan kepemimpinan',
                    'Melatih ketahanan fisik dan mental'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Latihan PBB',
                        'deskripsi' => 'Latihan Peraturan Baris-Berbaris secara intensif meliputi dasar PBB, formasi kelompok, dan gerakan khusus dengan ketepatan dan kekompakan tinggi.'
                    ],
                    [
                        'judul' => 'Upacara Bendera',
                        'deskripsi' => 'Anggota Paskibra menjadi petugas inti dalam setiap upacara bendera di sekolah dan mewakili sekolah dalam upacara resmi tingkat kabupaten/kota.'
                    ],
                    [
                        'judul' => 'Lomba Baris-Berbaris',
                        'deskripsi' => 'Mengikuti kompetisi LBB tingkat kabupaten, provinsi, hingga nasional untuk mengharumkan nama sekolah.'
                    ]
                ],
                'pembina' => 'Bapak Bambang Sutrisno, S.Pd',
                'jadwal' => 'Setiap hari Rabu & Sabtu, 15:00 - 17:30 WIB',
                'tempat' => 'Lapangan Upacara'
            ],
            [
                'id' => 5,
                'nama' => 'Futsal',
                'slug' => 'futsal',
                'kategori' => 'Olahraga',
                'gambar' => 'img/ekstrakurikuler/Futsal.jpg',
                'logo' => 'img/ekstrakurikuler/logo-futsal.png',
                'deskripsi_singkat' => 'Ekstrakurikuler futsal melatih keterampilan bermain sepak bola dalam ruangan dan membentuk sportivitas.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Futsal SMKN 1 Bangil adalah wadah bagi siswa yang memiliki passion dalam olahraga futsal. Kegiatan ini tidak hanya melatih teknik dan strategi bermain futsal, tetapi juga membentuk karakter sportif, kerjasama tim, dan jiwa kompetitif yang sehat. Tim futsal sekolah rutin mengikuti berbagai kompetisi dan turnamen antar sekolah.',
                'tujuan' => [
                    'Mengembangkan kemampuan teknik dan taktik bermain futsal',
                    'Meningkatkan kebugaran jasmani dan kesehatan',
                    'Membentuk karakter sportif dan jiwa kompetitif',
                    'Melatih kerjasama dan kekompakan tim',
                    'Mencetak atlet futsal berprestasi'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Latihan Rutin',
                        'deskripsi' => 'Latihan teknik dasar seperti passing, dribbling, shooting, dan strategi permainan dilakukan secara rutin dan terstruktur.'
                    ],
                    [
                        'judul' => 'Friendly Match',
                        'deskripsi' => 'Pertandingan persahabatan dengan sekolah lain untuk mengasah kemampuan dan strategi tim.'
                    ],
                    [
                        'judul' => 'Turnamen & Kompetisi',
                        'deskripsi' => 'Mengikuti berbagai turnamen futsal antar pelajar di tingkat kabupaten hingga provinsi.'
                    ]
                ],
                'pembina' => 'Bapak Denny Firmansyah, S.Pd',
                'jadwal' => 'Setiap hari Selasa & Kamis, 15:30 - 17:30 WIB',
                'tempat' => 'Lapangan Futsal Sekolah'
            ],
            [
                'id' => 6,
                'nama' => 'Musik',
                'slug' => 'musik',
                'kategori' => 'Seni',
                'gambar' => 'img/ekstrakurikuler/Musik.jpg',
                'logo' => 'img/ekstrakurikuler/logo-musik.png',
                'deskripsi_singkat' => 'Ekstrakurikuler musik mengembangkan bakat seni musik siswa dalam berbagai alat musik dan vokal.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Musik SMKN 1 Bangil adalah wadah bagi siswa yang memiliki minat dan bakat dalam bidang musik. Siswa dilatih bermain berbagai alat musik seperti gitar, bass, drum, keyboard, dan vokal. Band sekolah sering tampil dalam berbagai acara sekolah dan kompetisi band antar pelajar.',
                'tujuan' => [
                    'Mengembangkan bakat dan minat siswa di bidang musik',
                    'Melatih keterampilan bermain alat musik dan vokal',
                    'Membentuk kepercayaan diri dalam berpenampilan',
                    'Melatih kreativitas dan kemampuan berkolaborasi',
                    'Melestarikan dan mengembangkan seni musik'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Latihan Band',
                        'deskripsi' => 'Latihan bersama untuk melatih kekompakan, harmonisasi, dan aransemen lagu yang akan dibawakan.'
                    ],
                    [
                        'judul' => 'Pentas Seni',
                        'deskripsi' => 'Penampilan dalam berbagai acara sekolah seperti pensi, perayaan hari besar, dan acara kelulusan.'
                    ],
                    [
                        'judul' => 'Kompetisi Musik',
                        'deskripsi' => 'Mengikuti festival band dan kompetisi musik antar pelajar untuk mengasah kemampuan dan mental panggung.'
                    ]
                ],
                'pembina' => 'Bapak Arief Budiman, S.Sn',
                'jadwal' => 'Setiap hari Rabu & Sabtu, 15:00 - 17:00 WIB',
                'tempat' => 'Studio Musik'
            ],
            [
                'id' => 7,
                'nama' => 'Bola Voli',
                'slug' => 'bola-voli',
                'kategori' => 'Olahraga',
                'gambar' => 'img/ekstrakurikuler/Voli.jpg',
                'logo' => 'img/ekstrakurikuler/logo-voli.png',
                'deskripsi_singkat' => 'Ekstrakurikuler bola voli melatih teknik permainan voli dan membangun kerjasama tim yang solid.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Bola Voli SMKN 1 Bangil membina siswa yang memiliki minat dalam olahraga voli. Kegiatan ini melatih teknik dasar seperti passing, servis, smash, dan blocking, serta strategi permainan tim. Tim voli sekolah aktif mengikuti kompetisi dan menjadi kebanggaan sekolah dengan berbagai prestasi yang diraih.',
                'tujuan' => [
                    'Mengembangkan keterampilan teknik bermain bola voli',
                    'Meningkatkan kebugaran dan koordinasi tubuh',
                    'Membentuk sportivitas dan jiwa kompetitif',
                    'Melatih kerjasama dan komunikasi dalam tim',
                    'Mencetak atlet voli berprestasi'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Latihan Teknik',
                        'deskripsi' => 'Latihan passing bawah, passing atas, servis, smash, blocking, dan teknik-teknik khusus lainnya secara intensif.'
                    ],
                    [
                        'judul' => 'Game Simulation',
                        'deskripsi' => 'Simulasi pertandingan untuk melatih strategi, rotasi pemain, dan mental bertanding.'
                    ],
                    [
                        'judul' => 'Turnamen Voli',
                        'deskripsi' => 'Mengikuti kompetisi bola voli antar pelajar di berbagai tingkatan untuk mengharumkan nama sekolah.'
                    ]
                ],
                'pembina' => 'Bapak Hendro Purnomo, S.Pd',
                'jadwal' => 'Setiap hari Senin & Kamis, 15:30 - 17:30 WIB',
                'tempat' => 'Lapangan Voli Sekolah'
            ],
            [
                'id' => 8,
                'nama' => 'Basket',
                'slug' => 'basket',
                'kategori' => 'Olahraga',
                'gambar' => 'img/ekstrakurikuler/Basket.jpg',
                'logo' => 'img/ekstrakurikuler/logo-basket.png',
                'deskripsi_singkat' => 'Ekstrakurikuler basket mengembangkan kemampuan bermain bola basket dengan teknik dan strategi yang baik.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Basket SMKN 1 Bangil adalah wadah bagi siswa pecinta olahraga basket. Siswa dilatih teknik dasar seperti dribbling, shooting, passing, dan defense, serta strategi permainan tim. Tim basket sekolah memiliki prestasi yang membanggakan di berbagai kompetisi basket antar pelajar.',
                'tujuan' => [
                    'Mengembangkan keterampilan bermain bola basket',
                    'Meningkatkan kebugaran dan kelincahan tubuh',
                    'Membentuk mental juara dan sportivitas',
                    'Melatih strategi dan kerjasama tim',
                    'Mencetak atlet basket berprestasi'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Fundamental Training',
                        'deskripsi' => 'Latihan teknik dasar seperti dribbling, shooting, lay up, dan defense secara intensif dan berulang.'
                    ],
                    [
                        'judul' => 'Team Practice',
                        'deskripsi' => 'Latihan strategi tim, offensive dan defensive play, serta scrimmage untuk meningkatkan chemistry tim.'
                    ],
                    [
                        'judul' => 'Kompetisi Basket',
                        'deskripsi' => 'Mengikuti liga dan turnamen basket antar pelajar tingkat kabupaten dan provinsi.'
                    ]
                ],
                'pembina' => 'Bapak Rizki Ananda, S.Pd',
                'jadwal' => 'Setiap hari Selasa & Jumat, 15:30 - 17:30 WIB',
                'tempat' => 'Lapangan Basket Sekolah'
            ],
            [
                'id' => 9,
                'nama' => 'Pickleball',
                'slug' => 'pickleball',
                'kategori' => 'Olahraga',
                'gambar' => 'img/ekstrakurikuler/ekskul-pickleball.png',
                'logo' => 'img/ekstrakurikuler/logo-pickleball.png',
                'deskripsi_singkat' => 'Pickleball adalah olahraga raket modern yang menggabungkan elemen tenis, badminton, dan tenis meja.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Pickleball SMKN 1 Bangil adalah salah satu ekstrakurikuler olahraga terbaru yang berkembang pesat. Pickleball menggabungkan elemen dari tenis, badminton, dan tenis meja. Olahraga ini mudah dipelajari, menyenangkan, dan cocok untuk semua tingkat kemampuan. Siswa dilatih teknik dasar, strategi permainan, dan nilai-nilai sportivitas.',
                'tujuan' => [
                    'Memperkenalkan dan mengembangkan olahraga pickleball',
                    'Melatih koordinasi mata-tangan dan kelincahan',
                    'Meningkatkan kebugaran jasmani',
                    'Membentuk sportivitas dan fair play',
                    'Menyiapkan atlet untuk kompetisi tingkat nasional'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Basic Training',
                        'deskripsi' => 'Latihan teknik dasar seperti serve, groundstroke, volley, dan dink shot dengan panduan pelatih berpengalaman.'
                    ],
                    [
                        'judul' => 'Match Play',
                        'deskripsi' => 'Permainan simulasi untuk melatih strategi doubles dan singles, serta mental bertanding.'
                    ],
                    [
                        'judul' => 'Tournament',
                        'deskripsi' => 'Mengikuti turnamen pickleball tingkat pelajar untuk meraih prestasi dan pengalaman bertanding.'
                    ]
                ],
                'pembina' => 'Bapak Fadli Rahman, S.Pd',
                'jadwal' => 'Setiap hari Rabu & Sabtu, 15:00 - 17:00 WIB',
                'tempat' => 'Lapangan Pickleball'
            ],
            [
                'id' => 10,
                'nama' => 'Banjari',
                'slug' => 'banjari',
                'kategori' => 'Seni & Religius',
                'gambar' => 'img/ekstrakurikuler/Albanjari.jpeg',
                'logo' => 'img/ekstrakurikuler/logo-banjari.png',
                'deskripsi_singkat' => 'Seni musik tradisional Islam yang memadukan sholawat dengan iringan alat musik rebana.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Banjari atau Al-Banjari SMKN 1 Bangil adalah wadah untuk mengembangkan seni musik Islam yang memadukan sholawat dan dzikir dengan iringan alat musik rebana dan marawis. Kegiatan ini tidak hanya melatih keterampilan seni musik, tetapi juga memperdalam nilai-nilai religius dan keislaman siswa. Grup Banjari sekolah sering tampil dalam acara-acara keagamaan di sekolah maupun masyarakat.',
                'tujuan' => [
                    'Melestarikan seni musik tradisional Islam',
                    'Meningkatkan kecintaan pada sholawat Nabi',
                    'Mengembangkan bakat seni musik religius',
                    'Memupuk nilai-nilai keislaman dan akhlak mulia',
                    'Membentuk kekompakan dan harmonisasi kelompok'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Latihan Vokal & Irama',
                        'deskripsi' => 'Latihan vokal sholawat dan irama rebana secara teratur untuk menciptakan harmonisasi yang indah.'
                    ],
                    [
                        'judul' => 'Penampilan Rutin',
                        'deskripsi' => 'Penampilan dalam acara keagamaan sekolah seperti Maulid Nabi, Isra Mi\'raj, dan acara-acara peringatan hari besar Islam.'
                    ],
                    [
                        'judul' => 'Festival Banjari',
                        'deskripsi' => 'Mengikuti festival dan lomba banjari antar pelajar untuk mengharumkan nama sekolah.'
                    ]
                ],
                'pembina' => 'Ustadz Muhammad Fauzi, S.Pd.I',
                'jadwal' => 'Setiap hari Kamis, 15:00 - 17:00 WIB',
                'tempat' => 'Musholla Sekolah'
            ],
            [
                'id' => 11,
                'nama' => 'Gateball',
                'slug' => 'gateball',
                'kategori' => 'Olahraga',
                'gambar' => 'img/ekstrakurikuler/Gateball.jpeg',
                'logo' => 'img/ekstrakurikuler/logo-gateball.png',
                'deskripsi_singkat' => 'Olahraga beregu yang dimainkan menggunakan stick dan bola, melatih strategi dan kerjasama tim.',
                'deskripsi_lengkap' => 'Ekstrakurikuler Gateball SMKN 1 Bangil adalah salah satu ekstrakurikuler olahraga unik yang berasal dari Jepang. Gateball adalah permainan tim yang dimainkan di lapangan dengan menggunakan stick untuk memukul bola melewati gawang-gawang kecil. Olahraga ini melatih strategi, ketepatan, kerjasama tim, dan konsentrasi tinggi. Mudah dipelajari namun menantang untuk dikuasai.',
                'tujuan' => [
                    'Memperkenalkan dan mengembangkan olahraga gateball',
                    'Melatih strategi dan kemampuan berpikir taktis',
                    'Meningkatkan kerjasama dan koordinasi tim',
                    'Mengembangkan fokus dan konsentrasi',
                    'Menyiapkan atlet untuk kompetisi tingkat nasional'
                ],
                'kegiatan' => [
                    [
                        'judul' => 'Teknik Dasar',
                        'deskripsi' => 'Latihan teknik memukul bola, passing gate, strategi positioning, dan aturan permainan gateball.'
                    ],
                    [
                        'judul' => 'Team Strategy',
                        'deskripsi' => 'Pembahasan dan latihan strategi tim, urutan pukulan, dan taktik untuk memenangkan pertandingan.'
                    ],
                    [
                        'judul' => 'Turnamen Gateball',
                        'deskripsi' => 'Mengikuti kejuaraan gateball tingkat pelajar di kabupaten, provinsi, hingga nasional.'
                    ]
                ],
                'pembina' => 'Bapak Sugeng Riyadi, S.Pd',
                'jadwal' => 'Setiap hari Senin & Jumat, 15:00 - 17:00 WIB',
                'tempat' => 'Lapangan Gateball'
            ]
        ];
    }

    public static function getBySlug($slug)
    {
        $allEkskul = self::getAll();
        
        foreach ($allEkskul as $item) {
            if ($item['slug'] == $slug) {
                return $item;
            }
        }
        
        return null;
    }

    public static function getById($id)
    {
        $allEkskul = self::getAll();
        
        foreach ($allEkskul as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        
        return null;
    }
}