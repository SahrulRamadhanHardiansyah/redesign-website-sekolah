@extends('layouts.main')

@section('title', 'Data Tenaga Kependidikan')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/data-visual.css') }}">
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title">Data <span>Tenaga Kependidikan</span></h1>
        <p>Statistik Staf Non-Pengajar di SMKN 1 Bangil.</p>
    </div>
</div>
<section class="section-padding">
    <div class="container">
        
        <div class="row mb-4" style="margin-bottom: 2rem;">
            <div class="col-12">
                <div class="stat-card">
                    <h4>Total Tenaga Kependidikan</h4>
                    <p>{{ $data['totalTendik'] }} Orang</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6" style="margin-bottom: 2rem;">
                <div class="chart-card">
                    <h5 class="chart-title">Komposisi Gender</h5>
                    <div class="chart-container"><canvas id="genderTendikChart"></canvas></div>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 2rem;">
                <div class="chart-card">
                   <h5 class="chart-title">Distribusi Posisi/Jabatan</h5>
                   <div class="chart-container"><canvas id="posisiChart"></canvas></div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chartColors = {
        primary: 'rgba(0, 217, 184, 0.7)',
        secondary: 'rgba(54, 162, 235, 0.7)',
        warning: 'rgba(255, 206, 86, 0.7)',
        danger: 'rgba(255, 99, 132, 0.7)',
        info: 'rgba(75, 192, 192, 0.7)',
    };
    const genderData = @json($data['gender']);
    const posisiData = @json($data['posisi']);
    // 1. Chart Gender (Doughnut)
    new Chart(document.getElementById('genderTendikChart'), {
        type: 'doughnut',
        data: {
        labels: genderData.labels,
        datasets: [{
            data: genderData.data,
            backgroundColor: [chartColors.primary, chartColors.secondary],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
})
// 2. Chart Posisi (Bar)
new Chart(document.getElementById('posisiChart'), {
    type: 'bar',
    data: {
        labels: posisiData.labels,
        datasets: [{
            label: 'Jumlah Staf',
            data: posisiData.data,
            backgroundColor: [chartColors.primary, chartColors.secondary, chartColors.warning, chartColors.danger, chartColors.info],
        }]
    },
    options: {
        indexAxis: 'y', // Membuat bar chart menjadi horizontal
        responsive: true,
        maintainAspectRatio: false,
        scales: { x: { beginAtZero: true } },
        plugins: { legend: { display: false } }
    }
});
});
</script>
@endsection