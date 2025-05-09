<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Daftar Pengguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <style>
        /* Reset (Sudah ada di kode awal) */
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

        /* Body (Sudah ada di kode awal) */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }

        /* Container (Sudah ada di kode awal) */
        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar (Sudah ada di kode awal) */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Logo (Sudah ada di kode awal) */
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        /* Logo a (Sudah ada di kode awal) */
        .logo a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        

        /* Sidebar nav ul (Sudah ada di kode awal) */
        .sidebar nav ul {
            list-style: none;
            padding-left: 0;
        }

        /* Sidebar nav ul li a (Sudah ada di kode awal) */
        .sidebar nav ul li a {
            display: block;
            padding: 12px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        /* Sidebar nav ul li a:hover, .sidebar nav ul li a.active (Sudah ada di kode awal) */
        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background-color: #495057;
            padding-left: 25px;
        }

        /* Sidebar .logout (Sudah ada di kode awal) */
        .sidebar .logout {
            margin-top: 40px;
        }

        /* Sidebar .logout button (Sudah ada di kode awal) */
        .sidebar .logout button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Sidebar .logout button:hover (Sudah ada di kode awal) */
        .sidebar .logout button:hover {
            background-color: #c82333;
        }


        /* Current Time */
        .current-time {
            font-size: 1rem;
            /* Mengurangi ukuran font */
            margin-top: 10px;
            color: #495057;
            text-align: right;
            /* Posisikan ke kanan */
        }

        /* Mobile Responsive (Sudah ada di kode awal, sesuaikan jika perlu) */
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
                <a href="#">Admin Klinik Nauli Dental Care</a>
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
                <h1>Daftar Pengguna</h1>
            </header>

            <div class="inner-content">
                <div class="current-time" id="current-time">
                    <strong>Waktu Sekarang:</strong> <span id="time"></span>
                </div>

                <div class="table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->where('role', 'user') as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->last_login_at)
                                    <span class="login-time" data-time="{{ $user->last_login_at->toDateTimeString() }}">
                                        {{ $user->last_login_at->timezone('Asia/Jakarta')->translatedFormat('d M Y H:i') }}
                                    </span>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        moment.locale('id'); // Gunakan bahasa Indonesia

        // Fungsi untuk memperbarui waktu real-time sesuai jam laptop
        function updateCurrentTime() {
            const timeElement = document.getElementById('time');
            setInterval(() => {
                timeElement.textContent = moment().format('dddd, D MMMM YYYY HH:mm:ss');
            }, 1000); // Update setiap detik
        }

        // Fungsi untuk mengonversi waktu login ke waktu lokal
        function updateLoginTimes() {
            const elements = document.querySelectorAll('.login-time');
            elements.forEach(el => {
                const serverTime = el.getAttribute('data-time');
                if (serverTime) {
                    const localTime = moment(serverTime).local(); // Konversi ke waktu lokal laptop
                    el.textContent = localTime.format('dddd, D MMMM YYYY HH:mm:ss');
                } else {
                    el.textContent = 'Belum Pernah Login';
                }
            });
        }

        // Panggil fungsi saat halaman dimuat
        updateCurrentTime();
        updateLoginTimes();
    </script>

</body>

</html>