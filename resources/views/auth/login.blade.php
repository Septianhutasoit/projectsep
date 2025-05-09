@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card w-50 shadow-lg p-4">
        <div class="card-body">
            <h2 class="text-center mb-4">Login</h2>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>

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

                <head>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                </head>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

             
            </form>
        </div>
    </div>
</div>
@endsection