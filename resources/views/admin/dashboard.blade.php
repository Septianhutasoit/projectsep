<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        body,
        h1,
        h2,
        h3,
        p,
        ul,
        li,
        a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Logo */
        .logo {
            width: 100px;
            height: 90px;
            border-radius: 45%;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .logo a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar nav ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar nav ul li a {
            display: block;
            padding: 12px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background-color: #495057;
            padding-left: 25px;
        }

        .sidebar .logout {
            margin-top: auto;
            width: 100%;
            padding: 0 20px;
        }

        .sidebar .logout button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .sidebar .logout button:hover {
            background-color: #c82333;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 20px;
        }

        .header {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        /* Dashboard Widgets (Cards) */
        .dashboard-widgets {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .widget {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: calc(30% - 10px);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }

        .widget:hover {
            transform: translateY(-5px);
        }

        .widget h2 {
            font-size: 1.2rem;
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
        }

        .widget p {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .widget.dokter {
            background-color: rgb(240, 50, 12);
            color: #00c853;
        }

        .widget.janji-temu {
            background-color: rgb(231, 144, 14);
            color: #ff5722;
        }

        .widget.pengguna {
            background-color: rgb(35, 198, 41);
            color: rgb(21, 222, 31);
        }

        .widget.testimoni {
            background-color: rgb(219, 54, 126);
            color: #6a1b9a;
        }

        /* Chart Section */
        .chart-container {
            background-color: #fff;
            margin-top: 30px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .chart-container h3 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .chart-container .filter-form {
            margin-bottom: 20px;
        }

        .chart-container .filter-form label,
        .chart-container .filter-form select,
        .chart-container .filter-form input {
            margin-right: 10px;
        }

        .chart-container #custom-dates {
            display: none;
        }

        canvas {
            max-width: 100%;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .dashboard-widgets {
                flex-direction: column;
                gap: 15px;
            }

            .widget {
                width: 100%;
            }

            .sidebar {
                width: 100%;
                height: auto;
            }

            .container {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <a href="{{ url('/admin/dashboard') }}">
                    <img src="{{ asset('images/logoAdmin.png') }}" alt="Logo Klinik Nauli Dental Care" class="h-8" />
                </a>
            </div>
            <nav>
                @include('admin.layouts.navbar')
            </nav>
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </aside>

        <main class="content">
            <header class="header">
                <h1>Welcome to Admin Klinik</h1>
            </header>

            <div class="dashboard-widgets">
                <div class="widget dokter">
                    <h2>Total Dokter</h2>
                    <p>{{ $totalDoctors }}</p>
                </div>
                <div class="widget janji-temu">
                    <h2>Total Janji Temu</h2>
                    <p>{{ $totalAppointments }}</p>
                </div>
                <div class="widget pengguna">
                    <h2>Total Pengguna</h2>
                    <p>{{ $totalUsers }}</p>
                </div>
                <div class="widget testimoni">
                    <h2>Total Testimoni</h2>
                    <p>{{ $totalTestimonials }}</p>
                </div>
            </div>

            <div class="chart-container">
                <h3>Grafik Janji Temu ({{ ucfirst($filter) }})</h3>
                <form class="filter-form" method="GET" action="{{ route('admin.dashboard') }}">
                    <label for="filter">Filter Waktu:</label>
                    <select name="filter" id="filter" onchange="toggleCustomDate(this.value)">
                        <option value="hari" {{ $filter == 'hari' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="minggu" {{ $filter == 'minggu' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="bulan" {{ $filter == 'bulan' ? 'selected' : '' }}>Bulan Ini</option>
                        <option value="tahun" {{ $filter == 'tahun' ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                    <div id="custom-dates" style="display: {{ $filter == 'custom' ? 'inline-block' : 'none' }};">
                        <input type="date" name="start_date" value="{{ $start }}">
                        <input type="date" name="end_date" value="{{ $end }}">
                    </div>
                    <button type="submit">Terapkan</button>
                </form>
                <canvas id="appointmentChart" height="100"></canvas>
            </div>

            <!-- Chart.js CDN -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                function toggleCustomDate(value) {
                    document.getElementById('custom-dates').style.display = (value === 'custom') ? 'inline-block' : 'none';
                }

                const ctx = document.getElementById('appointmentChart').getContext('2d');
                const appointmentChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'Jumlah Janji Temu',
                            data: @json($data),
                            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                            borderRadius: 10,
                            barThickness: 40
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            </script>
        </main>
    </div>
</body>

</html>