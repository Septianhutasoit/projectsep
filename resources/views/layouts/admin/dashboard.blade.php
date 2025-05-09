@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('admin-content')
<h1 class="text-3xl font-bold">Dashboard Admin</h1>
<p class="mt-2">Selamat datang, Admin!</p>
<div class="container">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
</div>
<div class="mt-6 grid grid-cols-2 gap-4">
    <div class="p-6 bg-white shadow-md rounded">
        <h2 class="text-xl font-bold">Total Pengguna</h2>
        <p class="text-gray-600 text-lg">1,250</p>
    </div>
    <div class="p-6 bg-white shadow-md rounded">
        <h2 class="text-xl font-bold">Janji Temu Hari Ini</h2>
        <p class="text-gray-600 text-lg">34</p>
    </div>
</div>
@endsection