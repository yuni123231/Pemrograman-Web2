@extends('layouts.app')

@section('title', 'SPK WP | Welcome')

@section('contents')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="font-bold text-3xl text-gray-900">Dashboard Sistem Pendukung Keputusan</h1>
                <p class="mt-2 text-sm text-gray-600">Selamat datang di sistem pendukung keputusan pemilihan tempat les terbaik dengan metode WP.</p>
                
                <div class="mt-6 flex">
                    <!-- Informasi Sistem Pendukung Keputusan -->
                    <div class="w-1/2 bg-indigo-100 rounded-lg p-4 mr-4">
                        <h2 class="font-semibold text-lg text-indigo-800 mb-4">Tentang Sistem Pendukung Keputusan</h2>
                        <p class="text-sm text-indigo-700">Website ini membantu Anda dalam memilih tempat les terbaik dengan menggunakan metode Weighted Product (WP). Anda dapat melihat ringkasan hasil perhitungan dan pemilihan tempat les berdasarkan kriteria biaya, jarak, fasilitas, dan kurikulum.</p>
                    </div>
                    
                    <!-- Ringkasan dan Diagram Lingkaran untuk Bobot Kriteria -->
                    <div class="w-1/2 bg-indigo-100 rounded-lg p-4">
                        <h2 class="font-semibold text-lg text-indigo-800 mb-4">Diagram Kriteria</h2>
                        <!-- Diagram Lingkaran untuk Bobot Kriteria -->
                        <canvas id="criteriaPieChart" class="mt-4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data for Pie Chart
        var criteriaData = {
            labels: ['Biaya', 'Jarak', 'Fasilitas', 'Kurikulum', 'Kurikulum'],
            datasets: [{
                label: 'Bobot Kriteria',
                data: [5, 4, 3, 5, 3], // Replace with your actual data
                backgroundColor: ['#6366F1', '#60A5FA', '#34D399', '#FBBF24', '#F075AA']
            }]
        };


        // Create Pie Chart
        var ctxPie = document.getElementById('criteriaPieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: criteriaData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Create Performance Chart
        var ctxBar = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: performanceData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
