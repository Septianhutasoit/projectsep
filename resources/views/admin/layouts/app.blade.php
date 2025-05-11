<!-- views/admin/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 220px;
            --primary-color: #f28c38;
            /* Orange accent */
            --sidebar-bg: #1a252f;
            /* Dark sidebar background */
            --sidebar-item-hover: #2c3845;
            /* Hover background */
            --sidebar-text: #adb5bd;
            /* Inactive text color */
            --sidebar-text-active: #fff;
            /* Active text color */
            --dashboard-bg: #e9ecef;
            /* Softer background for dashboard */
            --widget-bg: #ffffff;
            /* White background for widgets */
            --widget-shadow: rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
            --overall-padding: 20px;
            /* Added overall padding */
        }

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
            background-color: var(--dashboard-bg);
            color: #333;
            overflow-x: hidden;
            padding: var(--overall-padding);
        }

        .container {
            display: flex;
            min-height: calc(100vh - (2 * var(--overall-padding)));
            /* Adjust for padding */
            margin: 0;
            padding: 0;
            max-width: 100%;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: var(--overall-padding);
            left: var(--overall-padding);
            height: calc(100vh - (2 * var(--overall-padding)));
            /* Adjust for padding */
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            width: var(--sidebar-width);
            z-index: 1000;
            border-radius: 5px 0 0 5px;
        }

        /* Main menu sidebar */
        .sidebar-menu {
            flex: 1;
            padding: 15px;
        }

        .sidebar-header {
            padding-bottom: 10px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .logo-img {
            width: 80px;
            height: 80px;
            border-radius: 45%;
            object-fit: cover;
        }

        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            margin-bottom: 8px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 0 20px 20px 0;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .menu-link:hover {
            background-color: var(--sidebar-item-hover);
            color: var(--sidebar-text-active);
        }

        .menu-link.active {
            background-color: var(--primary-color);
            color: var(--sidebar-text-active);
        }

        .menu-icon-text {
            margin-right: 10px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .menu-text {
            white-space: nowrap;
        }

        .user-section {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            background: transparent;
            border: none;
            color: #ff6b6b;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s;
            width: 100%;
            text-align: left;
        }

        .logout-btn:hover {
            background-color: rgba(255, 107, 107, 0.1);
        }

        /* Content */
        .content {
            flex: 1;
            padding: 15px;
            margin-left: var(--sidebar-width);
            background-color: var(--dashboard-bg);
            border-radius: 0 5px 5px 0;
        }

        .header {
            background-color: var(--widget-bg);
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px var(--widget-shadow);
        }

        /* Dashboard Widgets */
        .dashboard-widgets {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .widget {
            background-color: var(--widget-bg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px var(--widget-shadow);
            text-align: center;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .widget:hover {
            transform: translateY(-5px);
        }

        .widget-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .widget h2 {
            font-size: 1.1rem;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        .widget p {
            font-size: 2rem;
            font-weight: bold;
        }

        .widget.dokter {
            background-color: #f9e1e1;
            color: #d32f2f;
        }

        .widget.janji-temu {
            background-color: #ffecd1;
            color: var(--primary-color);
        }

        .widget.pengguna {
            background-color: #e1f9e1;
            color: #388e3c;
        }

        .widget.testimoni {
            background-color: #f9e1f2;
            color: #c2185b;
        }

        /* Chart Section */
        .chart-container {
            background-color: var(--widget-bg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px var(--widget-shadow);
            margin-bottom: 20px;
        }

        .chart-container h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .chart-container .filter-form {
            margin-bottom: 15px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .chart-container #custom-dates {
            display: none;
            gap: 10px;
        }

        canvas {
            max-width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .sidebar-menu .menu-text,
            .sidebar-menu .sidebar-header,
            .sidebar-menu .user-section span {
                display: none;
            }

            .content {
                margin-left: 60px;
                padding: 10px;
            }

            .dashboard-widgets {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-menu">
                <div class="sidebar-header">
                    <img src="{{ asset('images/logoAdmin.png') }}" alt="Logo Klinik Nauli Dental Care"
                        class="logo-img" />
                </div>

                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                            <span class="menu-icon-text"><i class="bi bi-speedometer2"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.layanan.index') }}"
                            class="menu-link {{ Route::is('admin.layanan.*') ? 'active' : '' }}">
                            <span class="menu-icon-text"><i class="bi bi-grid"></i></span>
                            <span class="menu-text">Layanan</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link {{ Route::is('admin.dokter.*') ? 'active' : '' }}">
                            <span class="menu-icon-text"><i class="bi bi-person-badge"></i></span>
                            <span class="menu-text">Dokter</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="menu-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                            <span class="menu-icon-text"><i class="bi bi-people"></i></span>
                            <span class="menu-text">Users</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.appointments.index') }}"
                            class="menu-link {{ Route::is('admin.appointments.*') ? 'active' : '' }}">
                            <span class="menu-icon-text"><i class="bi bi-calendar-check"></i></span>
                            <span class="menu-text">Janji Temu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.testimoni.index') }}"
                            class="menu-link {{ Route::is('admin.testimoni.*') ? 'active' : '' }}">
                            <span class="menu-icon-text"><i class="bi bi-chat-quote"></i></span>
                            <span class="menu-text">Testimoni</span>
                        </a>
                    </li>
                </ul>

                <div class="user-section">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="content" id="mainContent">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleCustomDate(value) {
                const customDates = document.getElementById('custom-dates');
                if (customDates) {
                    customDates.style.display = (value === 'custom') ? 'flex' : 'none';
                }
            }

            // Make the toggleCustomDate function available globally
            window.toggleCustomDate = toggleCustomDate;
        });
    </script>
</body>

</html>

