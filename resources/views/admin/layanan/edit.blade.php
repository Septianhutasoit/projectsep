@extends('layouts.admin')
@extends('admin.layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-8 text-blue-700">Edit Layanan</h1>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded-xl p-6">
        @csrf
        @method('PUT')

        <table class="w-full table-auto border-collapse">
            <tbody>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left w-1/4">Nama</td>
                    <td class="py-2">
                        <input type="text" name="nama" value="{{ $layanan->nama }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left align-top">Deskripsi</td>
                    <td class="py-2">
                        <textarea name="deskripsi" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $layanan->deskripsi }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left align-top">Gambar Saat Ini</td>
                    <td class="py-2">
                        <img src="{{ asset('storage/gambar_layanan/' . $layanan->gambar) }}"
                            class="w-32 h-32 object-cover rounded border">
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left align-top">Ganti Gambar</td>
                    <td class="py-2">
                        <input type="file" name="gambar"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <small class="text-gray-500">Opsional, hanya isi jika ingin mengganti gambar</small>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-end mt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.layanan.index') }}"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Batal
            </a>
        </div>
    </form>

    <div class="mt-8">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Aksi Lainnya</h2>
        <div class="flex justify-end">
            <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                @csrf
                @method('DELETE')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md mt-10 form-container">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Edit Layanan</h1>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                <p class="font-semibold">Terjadi Kesalahan!</p>
                <ul class="list-disc ml-5 mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama" class="block text-gray-700 font-medium mb-1 form-label">Nama Layanan</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $layanan->nama) }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-3 bg-gray-50 form-control"
                       required>
            </div>

            <div class="form-group">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-1 form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-3 bg-gray-50 resize-y form-control"
                          required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="gambar" class="block text-gray-700 font-medium mb-1 form-label">Ganti Gambar (Opsional)</label>
                <input type="file" id="gambar" name="gambar"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-3 bg-white form-control"
                       accept="image/jpeg,image/png" max="2097152"> <!-- Maks 2MB -->
                <p class="text-gray-500 text-sm mt-1 form-text">Format: JPG, PNG. Maksimal: 2MB</p>

                @if ($layanan->gambar && $layanan->gambar !== 'noimage.png' && Storage::disk('public')->exists('gambar_layanan/' . $layanan->gambar))
                    <div class="mt-3">
                        <p class="text-gray-500 text-sm mb-1 form-text">Gambar saat ini:</p>
                        <img src="{{ Storage::url('gambar_layanan/' . $layanan->gambar) }}" alt="{{ $layanan->nama }}"
                             class="img-thumbnail" width="80" onerror="this.onerror=null; this.src='https://via.placeholder.com/80?text=No+Image';">
                    </div>
                @elseif ($layanan->gambar === 'noimage.png')
                    <div class="mt-3">
                        <p class="text-gray-500 text-sm mb-1 form-text">Gambar saat ini:</p>
                        <img src="{{ asset('images/noimage.png') }}" alt="No Image" class="img-thumbnail" width="80"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/80?text=No+Image';">
                    </div>
                @endif
            </div>

            <div class="flex justify-center gap-4 mt-8">
                <a href="{{ route('admin.layanan.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-6 rounded-lg transition transform duration-200 hover:scale-105 hover:shadow btn-secondary">
                    Kembali
                </a>
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Hapus
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-lg transition transform duration-200 hover:scale-105 hover:shadow btn-primary">
                    Simpan Perubahan
                </button>
            </form>
        </div>
            </div>
        </form>
    </div>
</div>
@endsection
@endsection

@push('styles')
    <style>
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #f28c38;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(242, 140, 56, 0.25);
        }

        .btn-primary {
            background-color: #f28c38;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #e07b2f;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .img-thumbnail {
            border-radius: 4px;
            object-fit: cover;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush

