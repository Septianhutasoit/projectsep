<!-- views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <header class="header">
        <h1>Welcome to Admin Klinik</h1>
    </header>

    <div class="dashboard-widgets">
        <div class="widget dokter">
            <div class="widget-icon">
                <i class="bi bi-person-badge"></i>
            </div>
            <h2>Total Dokter</h2>
            <p>{{ $totalDoctors ?? 0 }}</p>
        </div>
        <div class="widget janji-temu">
            <div class="widget-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <h2>Total Janji Temu</h2>
            <p>{{ $totalAppointments ?? 0 }}</p>
        </div>
        <div class="widget pengguna">
            <div class="widget-icon">
                <i class="bi bi-people"></i>
            </div>
            <h2>Total Pengguna</h2>
            <p>{{ $totalUsers ?? 2 }}</p>
        </div>
        <div class="widget testimoni">
            <div class="widget-icon">
                <i class="bi bi-chat-quote"></i>
            </div>
            <h2>Total Testimoni</h2>
            <p>{{ $totalTestimonials ?? 0 }}</p>
        </div>
    </div>

    <div class="chart-container">
        <h3>Grafik Janji Temu ({{ ucfirst($filter ?? 'bulan') }})</h3>
        <form class="filter-form" method="GET" action="{{ route('admin.dashboard') }}">
            <label for="filter">Filter Waktu:</label>
            <select name="filter" id="filter" onchange="toggleCustomDate(this.value)" class="form-select form-select-sm" style="width: auto;">
                <option value="hari" {{ ($filter ?? 'bulan') == 'hari' ? 'selected' : '' }}>Hari Ini</option>
                <option value="minggu" {{ ($filter ?? 'bulan') == 'minggu' ? 'selected' : '' }}>Minggu Ini</option>
                <option value="bulan" {{ ($filter ?? 'bulan') == 'bulan' ? 'selected' : '' }}>Bulan Ini</option>
                <option value="tahun" {{ ($filter ?? 'bulan') == 'tahun' ? 'selected' : '' }}>Tahun Ini</option>
                <option value="custom" {{ ($filter ?? 'bulan') == 'custom' ? 'selected' : '' }}>Kustom</option>
            </select>
            <div id="custom-dates" style="display: {{ ($filter ?? 'bulan') == 'custom' ? 'flex' : 'none' }};">
                <input type="date" name="start_date" value="{{ $start ?? '' }}" class="form-control form-control-sm">
                <input type="date" name="end_date" value="{{ $end ?? '' }}" class="form-control form-control-sm">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Terapkan</button>
        </form>
        <canvas id="appointmentChart" height="300"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('appointmentChart').getContext('2d');
            const appointmentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels ?? []),
                    datasets: [{
                        label: 'Jumlah Janji Temu',
                        data: @json($data ?? []),
                        backgroundColor: '#f28c38',
                        borderRadius: 8,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                font: {
                                    weight: 'bold'
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
