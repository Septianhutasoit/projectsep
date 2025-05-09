<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Styles -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init();
        });
    </script>

    <style>
        .navbar-nav {
            display: flex;
            gap: 20px;
        }

        .navbar-nav .nav-link {
            transition: transform 0.2s ease, color 0.3s ease;
            position: relative;
            padding: 10px 15px;
        }

        .navbar-nav .nav-link:hover {
            transform: scale(1.1);
            color: rgb(245, 242, 242);
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: rgb(62, 39, 236);
            transition: width 0.4s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /*Latar*/
        body {
            background: linear-gradient(to right, rgb(127, 169, 238), rgb(107, 156, 179));
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo Klinik" height="45" class="me-2 rounded">
                </a>

                <!-- Toggler for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/welcome') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('jadwal') }}">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tim-spesialis') }}">Dokter Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact.address') }}">Kontak</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                    </ul>

                    <!-- Login/Register or User Info -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-light me-3" href="{{ url('/login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="{{ url('/register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" role="button"
                                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Konten Utama -->
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>