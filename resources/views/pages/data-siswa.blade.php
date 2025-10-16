@extends('layouts.main')

@section('title', 'Data Siswa')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/data-visual.css') }}">
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="page-title">Data <span>Siswa</span></h1>
        <p>Statistik Siswa Aktif di SMKN 1 Bangil.</p>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        
        <div class="row g-4 mb-4" >
            <div class="col-lg-6" style="margin-bottom: 2rem;">
                <div class="stat-card">
                    <h4>Total Siswa Aktif</h4>
                    <p>{{ number_format($data['totalSiswa']) }} Siswa</p>
                </div>
            </div>
            <div class="col-lg-6" style="margin-bottom: 2rem;">
                <div class="chart-card">
                    <h5 class="chart-title">Gender Siswa</h5>
                    <div class="chart-container">
                        <canvas id="genderSiswaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4" style="margin-bottom: 2rem;">
            <div class="col-12">
                <div class="chart-card">
                    <h5 class="chart-title">Jumlah Siswa per Jurusan</h5>
                    <div class="chart-container">
                        <canvas id="jurusanChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 2rem;">
            <div class="col-12">
                <div class="chart-card">
                     <h5 class="chart-title">Jumlah Siswa per Tingkat Kelas</h5>
                    <div class="chart-container">
                        <canvas id="tingkatChart"></canvas>
                    </div>
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
                primary: 'rgba(0, 217, 184, 0.8)',
                primaryBorder: 'rgb(0, 217, 184)',
                secondary: 'rgba(54, 162, 235, 0.8)',
                secondaryBorder: 'rgb(54, 162, 235)',
            };    

            const jurusanData = @json($data['perJurusan']);
            const tingkatData = @json($data['perTingkat']);
            const genderData = @json($data['gender']);

            // 1. Chart Gender (doughnut)
            new Chart(document.getElementById('genderSiswaChart'), {
                type: 'doughnut',
                data: {
                    labels: genderData.labels,
                    datasets: [{
                        data: genderData.data,
                        backgroundColor: [chartColors.secondary, chartColors.primary],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'top' }}}
            });

            // 2. Chart Jurusan (Bar)
            new Chart(document.getElementById('jurusanChart'), {
                type: 'bar',
                data: {
                    labels: jurusanData.labels,
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: jurusanData.data,
                        backgroundColor: chartColors.primary,
                        borderColor: chartColors.primaryBorder,
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } },
                    plugins: { legend: { display: false } }
                }
            });

            // 3. Chart Tingkat (Line)
            new Chart(document.getElementById('tingkatChart'), {
                type: 'line',
                data: {
                    labels: tingkatData.labels,
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: tingkatData.data,
                        backgroundColor: chartColors.secondary,
                        borderColor: chartColors.secondaryBorder,
                        borderWidth: 2,
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } },
                    plugins: { legend: { display: false } }
                }
            });
        });
    </script>
@endsection