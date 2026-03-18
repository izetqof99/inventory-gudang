@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
    <p class="mb-6 text-gray-600">Selamat datang, {{ auth()->user()->name }}!</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">Barang Masuk & Keluar per Bulan</h2>
            <div class="h-72">
                <canvas id="lineChartBarang"></canvas>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">Stok Barang</h2>
            <div class="h-72">
                <canvas id="barChartStok"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1"></script>
<script>
const chartColors = {
    blue: 'rgba(37,99,235,0.7)',
    red: 'rgba(220,38,38,0.7)',
    green: 'rgba(16,185,129,0.7)',
    yellow: 'rgba(234,179,8,0.7)',
    purple: 'rgba(147,51,234,0.7)',
    teal: 'rgba(20,184,166,0.7)'
};

document.addEventListener('DOMContentLoaded', () => {
    // LINE CHART MULTI DATASET
    new Chart(document.getElementById('lineChartBarang'), {
        type: 'line',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [
                {
                    label: 'Barang Masuk',
                    data: {!! json_encode($barangMasukTotals) !!},
                    borderColor: chartColors.blue,
                    backgroundColor: 'rgba(37,99,235,0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointBackgroundColor: chartColors.blue
                },
                {
                    label: 'Barang Keluar',
                    data: {!! json_encode($barangKeluarTotals) !!},
                    borderColor: chartColors.red,
                    backgroundColor: 'rgba(220,38,38,0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointBackgroundColor: chartColors.red
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    backgroundColor: '#1f2937',
                    titleColor: '#fff',
                    bodyColor: '#fff'
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });

    // BAR CHART STOK
    new Chart(document.getElementById('barChartStok'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($stokBarang->keys()) !!},
            datasets: [{
                label: 'Stok',
                data: {!! json_encode($stokBarang->values()) !!},
                backgroundColor: chartColors.green,
                borderRadius: 8,
                barThickness: 30
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1f2937',
                    titleColor: '#fff',
                    bodyColor: '#fff'
                }
            },
            animation: {
                duration: 800,
                easing: 'easeOutBounce'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
});
</script>
@endsection
