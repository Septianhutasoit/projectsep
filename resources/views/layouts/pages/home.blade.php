@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
  /* Style untuk memperpanjang halaman beranda */
  .home-page {
    min-height: 100vh; /* Setiap halaman minimal setinggi layar */
    padding: 50px 0; /* Tambahan padding agar tampilan tidak terlalu mepet */
    background-color: #f9f9f9; /* Warna background bisa disesuaikan */
  }
</style>

<div class="home-page">
  <!-- Konten halaman beranda Anda -->
  <h1 class="text-center">Selamat Datang di Klinik Dental Care</h1>
  <p class="text-center">Kami siap membantu Anda mendapatkan senyuman terbaik!</p>
  <!-- Konten lainnya -->
</div>
@endsection
