<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Daftar Janji Temu</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Logo a:hover (Sudah ada di kode awal) */
        .logo a:hover {
            color: #007bff;
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

        /* Content (Sudah ada di kode awal) */
        .content {
            flex: 1;
            padding: 20px;
        }

        /* Header (Sudah ada di kode awal) */
        .header {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header h1 (Sudah ada di kode awal) */
        .header h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        /* Inner Content (Sudah ada di kode awal) */
        .inner-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            /* Membuat tabel responsif */
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-primary,
        .table-primary>th,
        .table-primary>td {
            background-color: #cfe2ff;
        }

        .table-primary th,
        .table-primary td,
        .table-primary thead th,
        .table-primary tbody+tbody {
            border-color: #b2d1ff;
        }

        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .bg-success {
            background-color: #28a745 !important;
            color: #fff;
        }

        .bg-warning {
            background-color: #ffc107 !important;
            color: #212529;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }

        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        .page-link {
            position: relative;
            display: block;
            color: #0d6efd;
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .page-link:hover {
            z-index: 2;
            color: #0a58ca;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
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
                <a href="#">Admin Klinik Nauli Dental care</a>
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
                <h1>Daftar Janji Temu</h1>
                {{-- Breadcrumbs bisa ditambahkan di sini --}}
            </header>

            <div class="inner-content">

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama</th>
                                <th>No. HP / WhatsApp</th>
                                <th>Tanggal & Jam</th>
                                <th>Alasan</th>
                                <th>Dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $a)
                            <tr>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($a->appointment_datetime)->format('d M Y') }} {{ $a->appointment_datetime->format('H:i') }}</td>
                                <td>{{ $a->reason ?? '-' }}</td>
                                <td>{{ $a->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($a->approved)
                                    <span class="badge bg-success">Disetujui</span>
                                    @else
                                    <span class="badge bg-warning">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        @if(!$a->approved)
                                        <!-- Tombol Approve -->
                                        <form action="{{ route('appointments.approve', $a->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                        </form>
                                        @endif

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('appointments.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus janji temu ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $appointments->links() }}
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>