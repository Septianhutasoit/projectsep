@extends('admin.layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md mt-10">
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

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-gray-700 font-medium mb-1">Nama Layanan</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $layanan->nama) }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-3 bg-gray-50"
                required>
        </div>

        <div>
            <label for="deskripsi" class="block text-gray-700 font-medium mb-1">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-3 bg-gray-50 resize-y"
                required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>

        <div>
            <label for="gambar" class="block text-gray-700 font-medium mb-1">Ganti Gambar (Opsional)</label>
            <input type="file" id="gambar" name="gambar"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-3 bg-white">
            <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG. Maksimal: 2MB</p>

            @if ($layanan->gambar)
            <div class="mt-3">
                <p class="text-gray-500 text-sm mb-1">Gambar saat ini:</p>
                <img src="{{ asset('storage/layanan/' . $layanan->gambar) }}" alt="Gambar Layanan" class="h-32 rounded-lg border border-gray-200 shadow-sm">
            </div>
            @endif
        </div>

        <div class="flex justify-center gap-4 mt-8">
            <a href="{{ route('admin.layanan.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-6 rounded-lg transition transform duration-200 hover:scale-105 hover:shadow">
                Kembali
            </a>
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-lg transition transform duration-200 hover:scale-105 hover:shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
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
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
@endpush
