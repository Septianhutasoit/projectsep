@extends('layouts.app')

@section('content')
<section class="contact-section py-5 bg-light" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row text-center text-md-start g-5">
            <!-- Office Hours -->
            <div class="col-md-4">
                <h5 class="fw-bold text-dark border-bottom border-2 border-warning pb-2 mb-3">🕒 Office Hours</h5>
                <div class="small text-muted">
                    <p class="mb-2"><strong>Senin – Jumat:</strong><br>10.00 WIB – 19.00 WIB</p>
                    <p class="mb-2"><strong>Sabtu:</strong><br>10.00 WIB – 17.00 WIB</p>
                    <p class="mt-3 mb-4 fw-bold fs-6 text-dark text-uppercase">Khusus Hari Besar/Minggu Tutup</p>

                </div>
            </div>

            <!-- Get Social -->
            <div class="col-md-4">
                <h5 class="fw-bold text-dark border-bottom border-2 border-warning pb-2 mb-3">📱 Get Social</h5>
                <div class="d-flex justify-content-center justify-content-md-start gap-4 mb-3 fs-4">
                    <a href="https://www.instagram.com/@naulidentalcare" class="text-danger" target="_blank" rel="noopener">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/0812-6530-965" class="text-success" target="_blank" rel="noopener">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/NauliDentalCare" class="text-primary" target="_blank" rel="noopener">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
                <a href="https://www.instagram.com/namaklinik" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm rounded-pill px-4">
                    Tag us in your photos
                </a>
            </div>

            <!-- Book Appointment -->
            <div class="col-md-4">
                <h5 class="fw-bold text-dark border-bottom border-2 border-warning pb-2 mb-3">📅 Book Appointment</h5>
                <a href="https://wa.me/0812-6530-965" target="_blank" class="btn btn-success w-100 rounded-pill mb-3">
                    Whatsapp Smart Dental
                </a>
                <div class="text-muted small">
                    <strong>Email:</strong><br>
                    <a href="mailto:smartdentalcare@email.com" class="text-decoration-none text-dark">
                        smartdentalcare@email.com
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lokasi Klinik -->
<section class="maps-section py-5 bg-white">
    <div class="container">
        <h4 class="text-center fw-bold mb-4">📍 Lokasi Klinik Kami</h4>
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden mx-auto" style="max-width: 800px;">
            <div class="ratio ratio-4x3">
                <iframe
                    src=" https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11605.980412874049!2d99.06203621361506!3d2.329794112317861!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e04679a48b655%3A0x6075ca72ce2620ba!2sNauli%20Dental%20Care!5e0!3m2!1sid!2sid!4v1745347257416!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    width="600"
                    height="350"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
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
        <a href="{{ route('contact.address') }}" style="color: white; text-decoration: none; display: block;">Kontak</a>
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
            <a href="https://wa.me/08126530965" target="_blank" style="color: white; font-size: 20px;">
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