<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Str;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        Ekstrakurikuler::truncate();

        $pmr_description = "
            Palang Merah Remaja (disingkat PMR) adalah wadah pembinaan dan pengembangan anggota remaja yang dilaksanakan oleh Palang Merah Indonesia. Terdapat di tiap tingkatan PMI di seluruh Indonesia dengan anggota lebih dari 5 juta orang. Anggota PMR merupakan salah satu kekuatan PMI dalam melaksanakan kegiatan-kegiatan kemanusiaan di bidang kesehatan dan siaga bencana, mempromosikan Prinsip-Prinsip Dasar Gerakan Palang Merah dan Bulan Sabit Merah Internasional, serta mengembangkan kapasitas organisasi PMI.

            ### Tujuan Pembinaan dan Pengembangan
            1.  Penguatan kualitas remaja dan pembentukan karakter.
            2.  Anggota PMR sebagai contoh dalam berperilaku hidup sehat bagi teman sebaya.
            3.  Anggota PMR dapat memberikan motivasi bagi teman sebaya untuk berperilaku hidup sehat.
            4.  Anggota PMR sebagai pendidik remaja sebaya.
            5.  Anggota PMR adalah calon relawan masa depan.

            ### Kegiatan Utama
            **Jumbara**
            Jumbara atau Jumpa Bhakti Gembira adalah salah satu kegiatan besar organisasi PMI disetiap tingkatan untuk pembinaan dan pengembangan PMR seperti halnya jambore pada organisasi Pramuka.

            **Tribakti PMR**
            Setiap anggota PMR memiliki tugas yang harus dilaksanakan, dalam PMR dikenal tri bakti yang harus diketahui, dipahami dan dilaksanakan oleh semua anggota. TRIBAKTI PMR (2009) tersebut adalah:
            1.  Meningkatkan nilai keterampilan dalam kebersihan dan kesehatan.
            2.  Berkarya dan berbakti kepada masyarakat.
            3.  Mempererat tali persahabatan nasional dan internasional.
            ";

        $pramuka_description = "
            Gerakan Pramuka Indonesia adalah nama organisasi pendidikan nonformal yang menyelenggarakan pendidikan kepanduan di Indonesia. Kata 'Pramuka' merupakan singkatan dari Praja Muda Karana, yang memiliki arti Jiwa Muda yang Suka Berkarya.

            ### Dasadarma Pramuka
            1. Takwa kepada Tuhan Yang Maha Esa.
            2. Cinta alam dan kasih sayang sesama manusia.
            3. Patriot yang sopan dan kesatria.
            4. Patuh dan suka bermusyawarah.
            5. Rela menolong dan tabah.
            6. Rajin, terampil, dan gembira.
            7. Hemat, cermat, dan bersahaja.
            8. Disiplin, berani, dan setia.
            9. Bertanggung jawab dan dapat dipercaya.
            10. Suci dalam pikiran, perkataan, dan perbuatan.
            ";

        Ekstrakurikuler::create([
            'nama' => 'Palang Merah Remaja (PMR)',
            'slug' => Str::slug('Palang Merah Remaja (PMR)'),
            'gambar' => 'img/ekskul/pmr.png', // Pastikan gambar ini ada di public/img/ekskul/
            'deskripsi' => trim($pmr_description),
        ]);

        Ekstrakurikuler::create([
            'nama' => 'Pramuka',
            'slug' => Str::slug('Pramuka'),
            'gambar' => 'img/ekskul/pramuka.png', // Pastikan gambar ini ada di public/img/ekskul/
            'deskripsi' => trim($pramuka_description),
        ]);
    }
}