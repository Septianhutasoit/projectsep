@extends('layouts.admin')

@section('content')
<div class="content">
    <header class="header">
        <h1>Daftar Layanan</h1>
        {{-- Breadcrumbs bisa ditambahkan di sini --}}
    </header>

    <div class="inner-content">
        {{-- Floating Add Button --}}
        <div class="mb-4">
            <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">
                + Tambah Layanan
            </a>
        </div>

        {{-- Notifikasi --}}
        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

        {{-- Tabel Layanan --}}
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanan as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/gambar_layanan/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" width="100">
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ Str::limit($item->deskripsi, 100, '...') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.layanan.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada layanan ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
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
</style>

@endpush