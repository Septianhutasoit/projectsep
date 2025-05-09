@extends('layouts.app')

@section('content')

<!-- Visi Misi Section -->
<section class="visi-misi-section py-5" style="background-color: #f4f7fa;">
    <h2 class="judul text-center mb-5">Visi & Misi Nauli Dental Care</h2>
    <div class="visi-misi-wrapper d-flex flex-column flex-md-row gap-4 justify-content-center align-items-stretch px-3">
        <div class="card-visi custom-card" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
                <i class="fas fa-eye fa-2x text-primary"></i>
            </div>
            <h3 class="mt-3">Visi</h3>
            <p class="text-muted">
                Menjadi klinik kesehatan terintegrasi (One stop solution) yang tersebar di seluruh Indonesia.
            </p>
        </div>

        <div class="card-misi custom-card" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
                <i class="fas fa-bullseye fa-2x text-success"></i>
            </div>
            <h3 class="mt-3">Misi</h3>
            <ul class="text-muted">
                <li>Membentuk pelayanan jasa kesehatan klinik swasta yang ramah, ringkas, dan solutif.</li>
                <li>Mengembangkan pelayanan spesialistik terintegrasi (interdisiplin) dalam skala klinik rawat jalan.</li>
                <li>Mengembangkan pelayanan kesehatan sederhana berbasis home service dan home care.</li>
            </ul>
        </div>
    </div>
</section>


<!-- Keunggulan Kami Section -->
<section class="keunggulan-section" style="padding: 60px 20px; background-color: #fff;">
    <div class="container" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between;">
        <!-- Text Content -->
        <div class="text-content" style="flex: 1; min-width: 300px; padding-right: 30px;">
            <h2 style="font-size: 32px; font-weight: 700; margin-bottom: 20px;">
                <span style="color: #009688;">Keunggulan</span> <span style="color: #2c2c5c;">Kami</span>
            </h2>
            <p style="font-size: 16px; color: #555;">
                Nauli Dental Care berupaya memberikan pelayanan kesehatan gigi yang
                <strong style="color: #009688;">berkualitas sekaligus terintegrasi (terpadu)</strong> dengan pendekatan profesional dan empatik.
                Kami hadir sebagai solusi menyeluruh untuk kebutuhan perawatan gigi, mulai dari pelayanan dokter gigi umum dan spesialis,
                teknologi modern dalam prosedur perawatan, hingga pendekatan homecare yang ramah pasien.
                Kami juga mengedepankan upaya edukasi serta pencegahan (preventif) disamping pengobatan (kuratif).
            </p>
        </div>

        <!-- Image Content -->
        <div class="image-content" style="flex: 1; min-width: 300px; text-align: center;">
            <img src="{{ asset('images/keunggulan.png') }}" alt="Dokter Gigi Nauli"
                style="max-width: 100%; border-radius: 50%; background: linear-gradient(180deg, #0fa0a0, #006e6e); padding: 10px;">
        </div>
    </div>
</section>


<!-- Footer Section -->
<footer style="background: #444; color: white; padding: 40px 20px; display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap;">
    <div style="flex: 1; min-width: 250px; margin: 10px;">
        <h3 style="color: white;">Nauli Dental Care</h3>
        <p>Nauli Dental Care adalah jaringan klinik gigi dengan misi menciptakan kehidupan yang lebih baik dengan perawatan gigi yang jujur, transparan, dan etis.</p>
    </div>

    <div style="flex: 1; min-width: 200px; margin: 10px;">
        <h3 style="color: white;">About</h3>
        <a href="{{ route('home') }}" style="color: white; text-decoration: none; display: block;">Beranda</a>
        <a href="{{ route('about') }}" style="color: white; text-decoration: none; display: block;">Tentang</a>
        <a href="{{ route('jadwal') }}" style="color: white; text-decoration: none; display: block;">Jadwal</a>
        <a href="{{ route('tim-spesialis') }}" style="color: white; text-decoration: none; display: block;">Dokter</a>
        <a href="{{ route('contact.address') }}" style="color: white; text-decoration: none; display: block;">Dokter</a>
        <a href="{{ route('visi-misi') }}" style="color: white; text-decoration: none; display: block;">Visi & Misi</a>

    </div>

    <div style="flex: 1; min-width: 200px; margin: 10px;">
        <h3 style="color: white;">Services</h3>
        <a href="{{ route('about') }}" style="color: white; text-decoration: none; display: block;">Scaling</a>
        <a href="{{ route('about') }}" style="color: white; text-decoration: none; display: block;">Tambal Gigi</a>
        <a href="{{ route('about') }}" style="color: white; text-decoration: none; display: block;">Bleaching Gigi</a>
        <a href="{{ route('about') }}" style="color: white; text-decoration: none; display: block;">Behel Gigi</a>
        <a href="{{ route('about') }}" style="color: white; text-decoration: none; display: block;">Gigi Palsu</a>

    </div>

    <div style="flex: 1; min-width: 200px; margin: 10px;">
        <h3 style="color: white;">Our Location</h3>
        <p>Jl. Raja Paindoan No.20A, Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara 22314</p>

        <h3 style="color: white;">Contact Us</h3>
        <p>Email: contact@naulidentalcare.com</p>

        <div style="display: flex; gap: 10px; margin-top: 10px;">
            <a href="https://www.instagram.com/naulidentalcare" target="_blank" style="color: white; font-size: 20px;">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.tiktok.com/@naulidentalcare" target="_blank" style="color: white; font-size: 20px;">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://wa.me/628126530965?text=Halo%2C+saya+mau+booking+jadwal+kunjungan" target="_blank" style="color: white; font-size: 20px;">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://www.facebook.com/NauliDentalCare" target="_blank" style="color: white; font-size: 20px;">
                <i class="fab fa-facebook"></i>
            </a>
        </div>
    </div>
</footer>

<div style="width: 100%; text-align: center; padding: 10px; background: #333; color: white; font-size: 14px;">
    © 2023-2025 | Nauli Dental Care - All Rights Reserved
</div>
@endsection