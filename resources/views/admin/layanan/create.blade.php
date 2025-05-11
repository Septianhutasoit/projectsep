@extends('admin.layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
    <div class="form-container">
        <h1>Tambah Layanan</h1>
        <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Layanan</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                <small class="form-text">Format: JPG, PNG. Maksimal: 2MB</small>
            </div>

            <div class="form-group" style="display: flex; gap: 10px; margin-top: 20px;">
                <a href="{{ route('admin.layanan.index') }}" class="btn-secondary">Kembali</a>
                <button type="submit" class="btn-primary">Simpan</button>
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


