@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card w-50 shadow-lg p-4">
        <div class="card-body">
            <h2 class="text-center mb-4">Registrasi</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ url('/register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" 
                    class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                    required value="{{ old('tanggal_lahir') }}">
           
                    @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="daerah" class="form-label">Daerah</label>
                    <input id="daerah" type="text" name="daerah" class="form-control @error('daerah') is-invalid @enderror" required value="{{ old('daerah') }}">
                    @error('daerah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">Daftar</button>

                <div class="text-center mt-3">
                    <a href="{{ url('/login') }}">Sudah punya akun? Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
