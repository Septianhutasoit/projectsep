<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <a href="#">Admin Panel</a>
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
                <h1>Admin Dashboard</h1>
                {{-- You can add breadcrumbs here --}}
            </header>

            <div class="main-content">
                @yield('content')
            </div>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                AOS.init({
                    once: true,
                    duration: 800
                });
            </script>

        </main>
    </div>
</body>

</html>