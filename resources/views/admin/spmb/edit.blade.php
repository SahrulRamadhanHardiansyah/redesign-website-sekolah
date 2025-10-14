@extends('layouts.admin')
@section('title', 'Kelola Halaman SPMB')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kelola Halaman SPMB</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.spmb.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card shadow mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Bagian Utama (Hero)</h6></div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="hero_title" class="form-label">Judul Utama</label>
                    <input type="text" name="hero_title" id="hero_title" class="form-control" value="{{ $settings['hero_title'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="hero_subtitle" class="form-label">Sub Judul (Tahun Ajaran)</label>
                    <input type="text" name="hero_subtitle" id="hero_subtitle" class="form-control" value="{{ $settings['hero_subtitle'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="hero_image" class="form-label">Gambar Banner</label>
                    <input type="file" name="hero_image" id="hero_image" class="form-control">
                    @if(isset($settings['hero_image']))
                        <img src="{{ asset($settings['hero_image']) }}" alt="Hero Image" class="img-thumbnail mt-2" width="300">
                    @endif
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Jadwal Penting</h6></div>
            <div class="card-body">
                <div id="jadwal-container">
                    @foreach($settings['jadwal_penting'] as $index => $jadwal)
                    <div class="row align-items-center mb-2 jadwal-row">
                        <div class="col-md-5"><label class="d-none">Kegiatan</label><input type="text" name="jadwal_penting[{{$index}}][kegiatan]" class="form-control" value="{{ $jadwal['kegiatan'] }}"></div>
                        <div class="col-md-3"><label class="d-none">Tanggal Mulai</label><input type="date" name="jadwal_penting[{{$index}}][mulai]" class="form-control" value="{{ $jadwal['mulai'] }}"></div>
                        <div class="col-md-3"><label class="d-none">Tanggal Selesai</label><input type="date" name="jadwal_penting[{{$index}}][selesai]" class="form-control" value="{{ $jadwal['selesai'] }}"></div>
                        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="add-jadwal" class="btn btn-success btn-sm mt-2">Tambah Jadwal</button>
            </div>
        </div>

        <div class="card shadow mb-4">
             <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Syarat & Berkas</h6></div>
             <div class="card-body">
                 <div class="mb-4">
                     <h5>Syarat Umum</h5>
                     <div id="syarat-container">
                        @foreach($settings['syarat_umum'] as $index => $syarat)
                        <div class="row align-items-center mb-2 syarat-row">
                            <div class="col-md-11">
                                <input type="hidden" name="syarat_umum[{{$index}}][icon]" value="fas fa-check-circle">
                                <input type="text" name="syarat_umum[{{$index}}][text]" class="form-control" value="{{ $syarat['text'] }}">
                            </div>
                            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                        </div>
                        @endforeach
                     </div>
                     <button type="button" id="add-syarat" class="btn btn-success btn-sm mt-2">Tambah Syarat</button>
                 </div>
                 <hr>
                 <div class="mt-4">
                     <h5>Berkas Wajib</h5>
                     <div id="berkas-container">
                        @foreach($settings['berkas_wajib'] as $index => $berkas)
                        <div class="row align-items-center mb-2 berkas-row">
                            <div class="col-md-11">
                                <input type="hidden" name="berkas_wajib[{{$index}}][icon]" value="fas fa-upload">
                                <input type="text" name="berkas_wajib[{{$index}}][text]" class="form-control" value="{{ $berkas['text'] }}">
                            </div>
                            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                        </div>
                        @endforeach
                     </div>
                     <button type="button" id="add-berkas" class="btn btn-success btn-sm mt-2">Tambah Berkas</button>
                 </div>
             </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">FAQ (Tanya Jawab)</h6></div>
            <div class="card-body">
                <div id="faq-container">
                    @foreach($settings['faq'] as $index => $faq)
                    <div class="row align-items-center mb-2 faq-row">
                        <div class="col-md-5"><label class="d-none">Pertanyaan</label><input type="text" name="faq[{{$index}}][tanya]" class="form-control" value="{{ $faq['tanya'] }}"></div>
                        <div class="col-md-6"><label class="d-none">Jawaban</label><textarea name="faq[{{$index}}][jawab]" class="form-control" rows="2">{{ $faq['jawab'] }}</textarea></div>
                        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="add-faq" class="btn btn-success btn-sm mt-2">Tambah FAQ</button>
            </div>
        </div>

        <div class="card shadow mb-4">
             <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Kontak Bantuan</h6></div>
             <div class="card-body">
                  <div class="mb-3">
                    <label for="kontak_wa" class="form-label">Nomor WhatsApp (Contoh: +6281...)</label>
                    <input type="text" name="kontak_wa" id="kontak_wa" class="form-control" value="{{ $settings['kontak_wa'] ?? '' }}">
                </div>
                 <div class="mb-3">
                    <label for="kontak_email" class="form-label">Email</label>
                    <input type="email" name="kontak_email" id="kontak_email" class="form-control" value="{{ $settings['kontak_email'] ?? '' }}">
                </div>
                 <div class="mb-3">
                    <label for="kontak_lokasi" class="form-label">URL Google Maps Lokasi</label>
                    <input type="url" name="kontak_lokasi" id="kontak_lokasi" class="form-control" value="{{ $settings['kontak_lokasi'] ?? '' }}">
                </div>
             </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hapus baris dinamis (generik untuk semua tombol hapus)
        document.addEventListener('click', function(e) {
            if (e.target && e.target.closest('.remove-row')) {
                e.target.closest('.row').remove();
            }
        });

        // Tambah Jadwal
        let jadwalIndex = {{ count($settings['jadwal_penting']) }};
        document.getElementById('add-jadwal').addEventListener('click', function() {
            const container = document.getElementById('jadwal-container');
            const newRow = document.createElement('div');
            newRow.className = 'row align-items-center mb-2 jadwal-row';
            newRow.innerHTML = `
                <div class="col-md-5"><input type="text" name="jadwal_penting[${jadwalIndex}][kegiatan]" class="form-control" placeholder="Kegiatan"></div>
                <div class="col-md-3"><input type="date" name="jadwal_penting[${jadwalIndex}][mulai]" class="form-control"></div>
                <div class="col-md-3"><input type="date" name="jadwal_penting[${jadwalIndex}][selesai]" class="form-control"></div>
                <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
            `;
            container.appendChild(newRow);
            jadwalIndex++;
        });

        // Tambah Syarat
        let syaratIndex = {{ count($settings['syarat_umum']) }};
        document.getElementById('add-syarat').addEventListener('click', function() {
            const container = document.getElementById('syarat-container');
            const newRow = document.createElement('div');
            newRow.className = 'row align-items-center mb-2 syarat-row';
            newRow.innerHTML = `
                <div class="col-md-11">
                    <input type="hidden" name="syarat_umum[${syaratIndex}][icon]" value="fas fa-check-circle">
                    <input type="text" name="syarat_umum[${syaratIndex}][text]" class="form-control" placeholder="Tulis syarat baru...">
                </div>
                <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
            `;
            container.appendChild(newRow);
            syaratIndex++;
        });

        // Tambah Berkas
        let berkasIndex = {{ count($settings['berkas_wajib']) }};
        document.getElementById('add-berkas').addEventListener('click', function() {
            const container = document.getElementById('berkas-container');
            const newRow = document.createElement('div');
            newRow.className = 'row align-items-center mb-2 berkas-row';
            newRow.innerHTML = `
                <div class="col-md-11">
                    <input type="hidden" name="berkas_wajib[${berkasIndex}][icon]" value="fas fa-upload">
                    <input type="text" name="berkas_wajib[${berkasIndex}][text]" class="form-control" placeholder="Tulis berkas baru...">
                </div>
                <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
            `;
            container.appendChild(newRow);
            berkasIndex++;
        });

        // Tambah FAQ
        let faqIndex = {{ count($settings['faq']) }};
        document.getElementById('add-faq').addEventListener('click', function() {
            const container = document.getElementById('faq-container');
            const newRow = document.createElement('div');
            newRow.className = 'row align-items-center mb-2 faq-row';
            newRow.innerHTML = `
                <div class="col-md-5"><input type="text" name="faq[${faqIndex}][tanya]" class="form-control" placeholder="Pertanyaan"></div>
                <div class="col-md-6"><textarea name="faq[${faqIndex}][jawab]" class="form-control" rows="2" placeholder="Jawaban"></textarea></div>
                <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
            `;
            container.appendChild(newRow);
            faqIndex++;
        });
    });
</script>
@endsection