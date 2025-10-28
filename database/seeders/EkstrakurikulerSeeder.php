<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Str;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekstrakurikuler::truncate();

        // 1. MikroTik Akademi
        $mikrotik_description = <<<MARKDOWN
Program MikroTik Akademi adalah program khusus untuk Institusi Pendidikan, seperti Universitas, STMIK, AMIK, Institut Teknik, SMK dan sekolah berbasis semester. Program ini memungkinkan sekolah untuk membuka kelas MikroTik sebagai bagian dari kurikulum pembelajaran dan memberikan uji sertifikasi kompetensi bagi siswanya di akhir kelas.

Sebagai bagian dari program edukasi MikroTik, SMKN 1 BANGIL khususnya pada jurusan Teknik Komputer dan Jaringan (TKJ) merupakan salah satu dari Training Partner Akademi untuk MikroTik yang ditunjuk untuk melaksanakan program kelas MikroTik Akademi bagi siswa kami. Program ini digabungkan ke dalam kurikulum pada semester 3 dan 4, dan di akhir masa pembelajaran akan diadakan ujian sertifikasi untuk memperoleh Sertifikat MikroTik yang bersifat internasional.

Sertifikat yang dikeluarkan merupakan sertifikat bertaraf Internasional (bila siswa lulus ujian dengan nilai > 60%) dan siswa akan mendapatkan gelar sebagai **MikroTik Certified Network Associate (MTCNA)**.

### Topik Pembelajaran
SMKN 1 BANGIL mengajarkan topik berikut dalam kelas MikroTik Academy:
* Pengenalan MikroTik
* Manajemen Jaringan Lokal
* Bridge, DHCP, ARP, DNS
* Routing Statis & Dinamis (OSPF)
* Firewall (Filter & NAT)
* Quality of Service (QOS)
* Tunnel
* Tools di RouterBoard
* Project MikroTik sebagai internet gateway

MikroTik Academy di SMKN 1 BANGIL didukung sepenuhnya oleh **BelajarMikroTik** sebagai koordinator MikroTik Academy di Indonesia.

### Informasi Lebih Lanjut
* **Instruktur:** Ika Wiyanti Unitari Wida, S.Kom
* **Telp Sekolah:** 0343-744144
* **Email Sekolah:** smknesaba@yahoo.com
MARKDOWN;

        // 2. Pecinta Alam
        $pecinta_alam_description = <<<MARKDOWN
Wadah ini merupakan bentuk pendidikan kecakapan hidup dan rasa cinta kepada lingkungan hidup. Kegiatan dalam wadah yang diberi nama **Pecinta Alam Dewanata** ini berupa pelestarian lingkungan hidup, konservasi tanah dan air, pengelolaan sampah, menanamkan kebersihan lingkungan baik internal maupun eksternal sekolah dan sebagainya.

Guna meningkatkan hubungan masyarakat dengan sekolah seringkali wadah ini memberikan pengabdian masyarakat berupa membersihkan sungai dari sampah, mengadakan penghijauan dan berperan serta dalam kegiatan yang dilakukan oleh organisasi semacamnya.

### Karakter yang Ditanamkan
* Mencintai lingkungan hidup
* Disiplin
* Kesadaran terhadap kebersihan diri dan lingkungan
* Tanggap terhadap bencana alam
* Kecakapan hidup dan mandiri
* Kemampuan bertahan hidup dalam segala kondisi
* Terampil dan mampu berkomunikasi verbal/non verbal
MARKDOWN;

        // 3. Pramuka
        $pramuka_description = <<<MARKDOWN
Pramuka merupakan ekstrakurikuler wajib sesuai dengan Permendikbud Nomor 63 Tahun 2013 tentang Pendidikan Kepramukaan Sebagai Ekstrakurikuler Wajib.

Kepramukaan adalah proses pendidikan di luar lingkungan sekolah dan di luar lingkungan keluarga dalam bentuk kegiatan menarik, menyenangkan, sehat, teratur, terarah, praktis yang dilakukan di alam terbuka dengan Prinsip Dasar Kepramukaan dan Metode Kepramukaan, yang sasaran akhirnya pembentukan watak, akhlak, dan budi pekerti luhur.
MARKDOWN;

        // 4. Paskibra
        $paskibra_description = <<<MARKDOWN
Paskibra adalah Pasukan Pengibar Bendera. Tugas utama Paskibra ini adalah untuk mengibarkan bendera pada saat Upacara hari besar Nasional. Wadah ini bertujuan untuk mengembangkan dan meningkatkan rasa cinta tanah air, bangsa dan negara.

### Pendidikan Karakter
Selain cinta terhadap tanah air, bangsa dan negara Indonesia, karakter yang dikembangkan juga meliputi:
* Sikap disiplin
* Menjaga persatuan dan kesatuan
* Kekeluargaan
* Kerja keras, ulet, dan dinamis
* Saling menghargai
* Mampu mandiri dan berprestasi
MARKDOWN;

        // 5. Cinematografi
        $cinematografi_description = <<<MARKDOWN
Berbeda dengan fotografi yang memiliki output berupa gambar atau foto, sinematografi lebih menitikberatkan pada rekaman momen yang kemudian menghasilkan objek bergerak. Secara definisi, sinematografi adalah bidang ilmu yang membahas teknik penangkapan dan atau penggabungan gambar sehingga rangkaiannya memiliki gagasan ide yang ingin tersampaikan.

### Hal-hal yang Perlu Diperhatikan
Komposisi, posisi dan sudut kamera merupakan tiga hal yang berperan dalam pengambilan gambar. Untuk memunculkan ide dalam sebuah gambar atau rangkaian gambar, beberapa teknik ini perlu dipelajari.

Setelah resmi di-launching ekskul Sinematografi di SMK 1 Bangil ini, maka diharapkan ke depannya akan lahir karya-karya sinema dari SMKN 1 Bangil yang kreatif dan mandiri. Materi diambil dari beberapa literatur di internet dan hasil dari workshop film pendek yang pernah diikuti dari para praktisi film. Kami akan intensifkan produksi film pendek walau tidak sedang diikutkan ke dalam lomba.
MARKDOWN;

        // 6. Fotografi
        $fotografi_description = <<<MARKDOWN
Fotografi (dari bahasa Yunani: “Photos”: cahaya dan “Grafo”: Melukis) adalah proses melukis/menulis dengan menggunakan media cahaya. Fotografi berarti proses atau metode untuk menghasilkan gambar atau foto dari suatu obyek dengan merekam pantulan cahaya yang mengenai obyek tersebut pada media yang peka cahaya.

Untuk menghasilkan intensitas cahaya yang tepat, digunakan bantuan alat ukur berupa lightmeter. Seorang fotografer bisa mengatur intensitas cahaya tersebut dengan mengubah kombinasi **ISO/ASA (ISO Speed)**, **Diafragma (Aperture)**, dan **Kecepatan Rana (Speed)**. Kombinasi ini disebut sebagai pajanan (Exposure).

Ekskul fotografi SMK Negeri 1 Bangil yang terhimpun dalam **Colour Photografy** sudah berjalan beberapa tahun ini, di bawah bimbingan fotografer profesional Pak Damanhuri, ST.
MARKDOWN;
        
        // 7. Sepak Bola
        $sepak_bola_description = <<<MARKDOWN
SMK Negeri 1 Bangil sebagai lembaga pendidikan berupaya mengembangkan berbagai potensi siswa dalam satu wadah ”Kegiatan Ekstrakurikuler”. Sepak Bola merupakan cabang olahraga yang sangat populer di masyarakat, termasuk di kalangan siswa SMK Negeri 1 Bangil.

Dengan melihat keadaan ini maka kegiatan Extrakurikuler Sepak Bola dibentuk dan dikembangkan dengan harapan mampu mengembangkan talenta siswa, agar dapat berperan aktif dalam kehidupan bermasyarakat maupun untuk lebih berprestasi di masa yang akan datang.
MARKDOWN;
        
        // 8. Futsal
        $futsal_description = <<<MARKDOWN
Futsal berasal dari Bahasa Spanyol dari kata Futbol (sepak bola) dan Sala (ruangan), yang berarti Sepak Bola dalam ruangan. Olahraga ini pertama dipopulerkan di Montevideo, Uruguay tahun 1930.

Ekstrakurikuler ini merupakan salah satu ekstrakurikuler yang sudah lama di SMK Negeri 1 Bangil dan cukup digemari, tercatat lebih dari 40 siswa ikut serta dalam ekskul ini.

Latihan rutin dilaksanakan setiap hari Kamis sore dengan pelatih pembina Bapak Bahrul Ulum, S.Pd. Ekstrakurikuler futsal diadakan dengan tujuan menyediakan wadah untuk siswa menyalurkan hobinya, menanamkan sifat-sifat sportifitas, serta mencetak bibit-bibit baru olahragawan yang berprestasi.
MARKDOWN;
        
        // 9. Pencak Silat
        $pencak_silat_description = <<<MARKDOWN
Tujuan pengembangan kebijakan dan manajemen olah raga pencak silat prestasi adalah untuk mengembangkan dan menyelaraskan berbagai kebijakan pembangunan olah raga, serta memperkuat kelembagaan olah raga pencak silat.

Menurut Presiden IPSI (Ikatan Pencak Silat Indonesia), Pencak Silat didefinisikan sebagai ketrampilan dan ilmu tentang pola gerak bertenaga yang efektif, indah dan menyehatkan tubuh, yang dijiwai budi pekerti luhur berdasar ketaqwaan kepada Tuhan YME.

### Empat Aspek Pencak Silat
1. Sarana pembinaan mental spiritual
2. Bela diri (self-defense)
3. Olahraga
4. Seni yang tidak dapat dipisahkan
MARKDOWN;
        
        // 10. Bola Voli
        $bola_voli_description = <<<MARKDOWN
Permainan Bola Voli termasuk salah satu olahraga yang diminati oleh banyak orang, termasuk masyarakat Indonesia. Di Indonesia sendiri sudah terbentuk organisasi Persatuan Bola Voli Seluruh Indonesia (PBVSI).

Kegiatan ekstrakurikuler bola voli SMK Negeri 1 Bangil merupakan salah satu kegiatan ekskul olahraga yang sangat di minati oleh peserta didik. Ekstrakurikuler ini terbagi menjadi dua bagian, yaitu voli putra dan voli putri. Sejauh ini Bola Voli SMK Negeri 1 Bangil memiliki kualitas yang baik serta aktif dalam keikutsertaan di berbagai kompetisi dan telah banyak menyumbangkan prestasi.
MARKDOWN;
        
        // 11. Basket
        $basket_description = <<<MARKDOWN
Pengertian Bola Basket adalah olahraga yang dilakukan secara berkelompok dan dimainkan oleh dua tim yang berlawanan. Masing-masing tim memiliki 5 orang anggota. Setiap tim harus berusaha mencetak poin sebanyak-banyaknya dengan cara memasukkan bola ke dalam ring lawan.

Untuk mengembangkan minat dan bakat olahraga supaya berprestasi, sekolah memberikan kegiatan ekstrakurikuler. Melalui kegiatan inilah siswa dapat mengembangkan dan menyalurkan minat bakatnya. Olahraga permainan bola basket merupakan jenis olahraga modern yang begitu cepat perkembangannya dan banyak menarik perhatian.

SMK Negeri 1 Bangil mewadahi bakat-bakat muda yang dimiliki siswa dalam bermain olahraga Basket, dengan memiliki dua tim yaitu Tim Basket Putra dan Tim Basket Putri.
MARKDOWN;

        $ekskulData = [
            ['nama' => 'MikroTik Akademi', 'deskripsi' => $mikrotik_description, 'gambar' => 'img/ekstrakurikuler/mikrotik.png'],
            ['nama' => 'Pecinta Alam', 'deskripsi' => $pecinta_alam_description, 'gambar' => 'img/ekstrakurikuler/Pecinta-Alam.jpg'],
            ['nama' => 'Pramuka', 'deskripsi' => $pramuka_description, 'gambar' => 'img/ekstrakurikuler/Pramuka.jpg'],
            ['nama' => 'Paskibra', 'deskripsi' => $paskibra_description, 'gambar' => 'img/ekstrakurikuler/Paskibraka.jpg'],
            ['nama' => 'Cinematografi', 'deskripsi' => $cinematografi_description, 'gambar' => 'img/ekstrakurikuler/Pecinta-Alam.jpg'],
            ['nama' => 'Fotografi', 'deskripsi' => $fotografi_description, 'gambar' => 'img/ekstrakurikuler/Pecinta-Alam.jpg'],
            ['nama' => 'Sepak Bola', 'deskripsi' => $sepak_bola_description, 'gambar' => 'img/ekstrakurikuler/Pecinta-Alam.jpg'],
            ['nama' => 'Futsal', 'deskripsi' => $futsal_description, 'gambar' => 'img/ekstrakurikuler/Futsal.jpg'],
            ['nama' => 'Pencak Silat', 'deskripsi' => $pencak_silat_description, 'gambar' => 'img/ekstrakurikuler/Voli.jpg'],
            ['nama' => 'Bola Voli', 'deskripsi' => $bola_voli_description, 'gambar' => 'img/ekstrakurikuler/Voli.jpg'],
            ['nama' => 'Basket', 'deskripsi' => $basket_description, 'gambar' => 'img/ekstrakurikuler/Basket.jpg'],
        ];

        foreach ($ekskulData as $data) {
            Ekstrakurikuler::create([
                'nama' => $data['nama'],
                'slug' => Str::slug($data['nama']),
                'gambar' => $data['gambar'],
                'deskripsi' => trim($data['deskripsi']),
            ]);
        }
    }
}