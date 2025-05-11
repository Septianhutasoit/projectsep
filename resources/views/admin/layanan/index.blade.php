@extends('admin.layouts.app')

@section('title', 'Daftar Layanan')

@section('content')
<div class="content">
    <header class="header">
        <h1>Daftar Layanan</h1>
        {{-- Breadcrumbs bisa ditambahkan di sini --}}
    </header>

    <div class="inner-content">
        {{-- Tombol Tambah --}}
        <div class="mb-4">
            <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Layanan
            </a>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Peringatan jika symbolic link belum dibuat --}}
        @if (!file_exists(public_path('storage')))
            <div class="alert alert-warning mb-4">
                Symbolic link belum dibuat. Jalankan perintah: <code>php artisan storage:link</code>
            </div>
        @endif

        {{-- Tabel Layanan --}}
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($layanan as $item)
                        <tr>
                            <td>
                                @php
                                    $imagePath = 'gambar_layanan/' . $item->gambar;
                                    $imageExists = $item->gambar && $item->gambar !== 'noimage.png' && Storage::disk('public')->exists($imagePath);
                                    $imageUrl = $imageExists ? Storage::url($imagePath) : asset('images/noimage.png');
                                @endphp

                                <img src="{{ $imageUrl }}" alt="{{ $item->nama }}" class="img-thumbnail" width="80" onerror="this.onerror=null; this.src='https://via.placeholder.com/80?text=No+Image';">
                                @if (!$imageExists && $item->gambar && $item->gambar !== 'noimage.png')
                                    <small class="text-danger">Gambar tidak ditemukan: {{ $item->gambar }}</small>
                                @endif
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ Str::limit($item->deskripsi, 100, '...') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.layanan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
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
    .table img {
        border-radius: 4px;
        object-fit: cover;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .alert-dismissible .btn-close {
        padding: 0.75rem;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f6f8;
        color: #333;
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
