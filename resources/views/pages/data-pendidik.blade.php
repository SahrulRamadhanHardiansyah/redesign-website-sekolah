@extends('layouts.main')

@section('title', 'Data Pendidik')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/data-visual.css') }}">
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title">Data <span>Pendidik</span></h1>
        <p>Statistik Guru dan Tenaga Pendidik di SMKN 1 Bangil.</p>
    </div>
</div>
<section class="section-padding">
    <div class="container">
        <div class="row g-4" style="margin-bottom: 2rem;">
            <div class="col-12">
                <div class="stat-card">
                    <h4>Total Pendidik</h4>
                    <p>{{ $data['totalPendidik'] }} Orang</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6" style="margin-bottom: 2rem;">
                <div class="chart-card">
                    <h5 class="chart-title">Komposisi Gender Pendidik</h5>
                    <div class="chart-container"><canvas id="genderChart"></canvas></div>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 2rem;">
                <div class="chart-card">
                    <h5 class="chart-title">Tingkat Pendidikan Terakhir</h5>
                    <div class="chart-container"><canvas id="pendidikanChart"></canvas></div>
                </div>
            </div>
        </div>

        <div class="row g-4" style="margin-bottom: 2rem;"> 
            <div class="col-12">
                <div class="chart-card">
                    <h5 class="chart-title">Status Sertifikasi Guru</h5>
                    <div class="chart-container"><canvas id="sertifikasiChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
{{-- Memuat library Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {const chartColors = {primary: 'rgba(0, 217, 184, 0.7)',secondary: 'rgba(54, 162, 235, 0.7)',grey: 'rgba(201, 203, 207, 0.7)',primaryBorder: 'rgb(0, 217, 184)',secondaryBorder: 'rgb(54, 162, 235)',greyBorder: 'rgb(201, 203, 207)',};        

// Data dari Controller
const genderData = @json($data['gender']);
const pendidikanData = @json($data['pendidikan']);
const sertifikasiData = @json($data['statusSertifikasi'])
// 1. Chart Gender (Pie)
new Chart(document.getElementById('genderChart'), {
    type: 'pie',
    data: {
        labels: genderData.labels,
        datasets: [{
            data: genderData.data,
            backgroundColor: [chartColors.primary, chartColors.secondary],
            borderColor: ['#fff', '#fff'],
            borderWidth: 2
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
})
// 2. Chart Pendidikan (Bar)
new Chart(document.getElementById('pendidikanChart'), {
    type: 'bar',
    data: {
        labels: pendidikanData.labels,
        datasets: [{
            label: 'Jumlah Pendidik',
            data: pendidikanData.data,
            backgroundColor: [chartColors.primary, chartColors.secondary, chartColors.grey],
            borderColor: [chartColors.primaryBorder, chartColors.secondaryBorder, chartColors.greyBorder],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true } },
        plugins: { legend: { display: false } }
    }
})
// 3. Chart Sertifikasi (Doughnut)
new Chart(document.getElementById('sertifikasiChart'), {
    type: 'doughnut',
    data: {
        labels: sertifikasiData.labels,
        datasets: [{
            data: sertifikasiData.data,
            backgroundColor: [chartColors.primary, chartColors.grey],
            borderColor: ['#fff', '#fff'],
            borderWidth: 2
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});
    });
</script>
@endsection