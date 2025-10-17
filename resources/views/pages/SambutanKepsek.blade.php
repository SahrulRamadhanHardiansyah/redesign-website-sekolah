@extends('layouts.main')
@section('title', 'Sambutan Kepala Sekolah')

@section('style')
    {{-- Pastikan nama file CSS sudah benar (case-sensitive) --}}
    <link rel="stylesheet" href="{{ asset('css/sambutan.css') }}">
@endsection

@section('content')
<div class="container my-5">
    <div class="sambutan-wrapper">
        <h2 class="sambutan-title">Sambutan Kepala Sekolah</h2>

        <div class="row g-5 align-items-center">

            {{-- KOLOM KIRI: TEKS SAMBUTAN --}}
            <div class="col-lg-7 sambutan-content-text">
                <p class="lead"><strong>Assalamualaikum Warahmatullahi Wabarakatuh,</strong></p>

                <p>Puji syukur kepada Alloh SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerahNya sehingga website SMK Negeri 1 Bangil ini dapat terbit. Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin. Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar SMK Negeri 1 Bangil.</p>

                <p>Besar harapan kami, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan pemerhati pendidikan secara khusus bagi SMK Negeri.</p>

                <p>Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya. Terima kasih atas kerjasamanya, maju terus untuk mencapai SMK Negeri 1 Bangil yang lebih baik lagi.</p>

                <div class="kepsek-ttd mt-5">
                    <p class="mb-1 fw-bold">Bapak A. Syamsul Hadi, S.Pd, M.Si</p>
                    <p class="text-muted">Kepala SMK Negeri 1 Bangil</p>
                    <p class="mt-4"><strong>Wassalamualaikum Warahmatullahi Wabarakatuh.</strong></p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
