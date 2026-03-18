import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('myChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar'],
                datasets: [{
                    label: 'Penjualan',
                    data: [10, 20, 15],
                    backgroundColor: [
                        'rgba(74, 222, 128, 0.7)',  // #4ade80
                        'rgba(96, 165, 250, 0.7)',  // #60a5fa
                        'rgba(250, 204, 21, 0.7)'   // #facc15
                    ],
                    borderRadius: 8,
                    barThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: '#111827', // dark tooltip
                        titleColor: '#f9fafb',
                        bodyColor: '#f9fafb',
                    }
                }
            }
        });
    }
});
