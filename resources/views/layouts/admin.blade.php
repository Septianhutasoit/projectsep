<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            justify-content: space-between;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .logo a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li a {
            display: block;
            padding: 10px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background-color: #495057;
        }

        .sidebar .logout {
            margin-top: 20px;
        }

        .sidebar .logout button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
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
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .inner-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Dashboard Widgets */
        .dashboard-widgets {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .widget {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .widget h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .widget p {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
        }

        /* Recent Activity */
        .recent-activity ul {
            list-style: none;
        }

        .recent-activity ul li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .recent-activity ul li:last-child {
            border-bottom: none;
        }
    </style>
    @yield('custom_head')
</head>

<body>

    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <a href="{{ route('admin.dashboard') }}"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.layanan') }}" class="{{ request()->is('admin/layanan') ? 'active' : '' }}">Layanan</a></li>
                    <li><a href="{{ route('admin.users') }}" class="{{ request()->is('admin/users') ? 'active' : '' }}">Users</a></li>
                    <li><a href="{{ route('admin.testimonis') }}" class="{{ request()->is('admin/testimonis') ? 'active' : '' }}">Testimoni</a></li>
                    <li><a href="{{ route('admin.appointments') }}" class="{{ request()->is('admin/appointments') ? 'active' : '' }}">Janji Temu</a></li>
                </ul>
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
                <h1>@yield('header')</h1>
                {{-- Breadcrumbs bisa ditambahkan di sini --}}
            </header>

            <div class="inner-content">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>