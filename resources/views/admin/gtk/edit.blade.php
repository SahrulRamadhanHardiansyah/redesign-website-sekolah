@extends('layouts.admin')
@section('title', 'Kelola Data GTK & Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kelola Data Statistik GTK & Siswa</h1>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.gtk.update') }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Data Pendidik --}}
        <div class="card shadow mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Data Pendidik</h6></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Total Pendidik</label>
                    <input type="number" name="pendidik_total" class="form-control" value="{{ $settings['pendidik_total'] ?? 0 }}">
                </div>
                <hr>
                <h6 class="fw-bold">Komposisi Gender Pendidik</h6>
                @foreach($settings['pendidik_gender']['labels'] as $index => $label)
                <div class="row mb-2">
                    <div class="col-6"><input type="text" class="form-control" name="pendidik_gender[{{$index}}][label]" value="{{$label}}"></div>
                    <div class="col-6"><input type="number" class="form-control" name="pendidik_gender[{{$index}}][data]" value="{{ $settings['pendidik_gender']['data'][$index] ?? 0 }}"></div>
                </div>
                @endforeach
                <hr>
                <h6 class="fw-bold">Tingkat Pendidikan</h6>
                <div id="pendidik-pendidikan-container">
                    @foreach($settings['pendidik_pendidikan']['labels'] as $index => $label)
                    <div class="row mb-2 align-items-center repeater-row">
                        <div class="col-5"><input type="text" class="form-control" name="pendidik_pendidikan[{{$index}}][label]" value="{{$label}}" placeholder="Label (e.g., S1)"></div>
                        <div class="col-5"><input type="number" class="form-control" name="pendidik_pendidikan[{{$index}}][data]" value="{{ $settings['pendidik_pendidikan']['data'][$index] ?? 0 }}" placeholder="Jumlah"></div>
                        <div class="col-2"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-success btn-sm mt-2" id="add-pendidik-pendidikan">Tambah Tingkat</button>
            </div>
        </div>
        
        {{-- Data Tenaga Kependidikan --}}
        <div class="card shadow mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Data Tenaga Kependidikan</h6></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Total Tenaga Kependidikan</label>
                    <input type="number" name="tendik_total" class="form-control" value="{{ $settings['tendik_total'] ?? 0 }}">
                </div>
                 <hr>
                <h6 class="fw-bold">Distribusi Posisi</h6>
                <div id="tendik-posisi-container">
                    @foreach($settings['tendik_posisi']['labels'] as $index => $label)
                    <div class="row mb-2 align-items-center repeater-row">
                        <div class="col-5"><input type="text" class="form-control" name="tendik_posisi[{{$index}}][label]" value="{{$label}}" placeholder="Label (e.g., Administrasi)"></div>
                        <div class="col-5"><input type="number" class="form-control" name="tendik_posisi[{{$index}}][data]" value="{{ $settings['tendik_posisi']['data'][$index] ?? 0 }}" placeholder="Jumlah"></div>
                        <div class="col-2"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-success btn-sm mt-2" id="add-tendik-posisi">Tambah Posisi</button>
            </div>
        </div>

        {{-- Data Siswa --}}
        <div class="card shadow mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Total Siswa</label>
                    <input type="number" name="siswa_total" class="form-control" value="{{ $settings['siswa_total'] ?? 0 }}">
                </div>
                <hr>
                <h6 class="fw-bold">Jumlah Siswa per Jurusan</h6>
                <div id="siswa-jurusan-container">
                     @foreach($settings['siswa_per_jurusan']['labels'] as $index => $label)
                    <div class="row mb-2 align-items-center repeater-row">
                        <div class="col-5"><input type="text" class="form-control" name="siswa_per_jurusan[{{$index}}][label]" value="{{$label}}" placeholder="Nama Jurusan"></div>
                        <div class="col-5"><input type="number" class="form-control" name="siswa_per_jurusan[{{$index}}][data]" value="{{ $settings['siswa_per_jurusan']['data'][$index] ?? 0 }}" placeholder="Jumlah"></div>
                        <div class="col-2"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
                    </div>
                    @endforeach
                </div>
                 <button type="button" class="btn btn-success btn-sm mt-2" id="add-siswa-jurusan">Tambah Jurusan</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
    </form>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function setupRepeater(containerId, buttonId, name) {
        let index = document.querySelectorAll(`#${containerId} .repeater-row`).length;
        document.getElementById(buttonId).addEventListener('click', function() {
            const container = document.getElementById(containerId);
            const newRow = document.createElement('div');
            newRow.className = 'row mb-2 align-items-center repeater-row';
            newRow.innerHTML = `
                <div class="col-5"><input type="text" class="form-control" name="${name}[${index}][label]" placeholder="Label"></div>
                <div class="col-5"><input type="number" class="form-control" name="${name}[${index}][data]" placeholder="Jumlah" value="0"></div>
                <div class="col-2"><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></div>
            `;
            container.appendChild(newRow);
            index++;
        });
    }

    setupRepeater('pendidik-pendidikan-container', 'add-pendidik-pendidikan', 'pendidik_pendidikan');
    setupRepeater('tendik-posisi-container', 'add-tendik-posisi', 'tendik_posisi');
    setupRepeater('siswa-jurusan-container', 'add-siswa-jurusan', 'siswa_per_jurusan');

    document.addEventListener('click', function(e) {
        if (e.target && e.target.closest('.remove-row')) {
            e.target.closest('.repeater-row').remove();
        }
    });
});
</script>
@endsection