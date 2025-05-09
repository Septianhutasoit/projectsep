@extends('layouts.app')

@section('content')
<!-- External CDN -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* Reset margin dan padding global */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
margin: 0;
padding: 0;
width: 100vw;
overflow-x: hidden;
}

/* Header animasi */
.header-jadwal {
font-size: 28px;
font-weight: bold;
color: #333;
text-align: center;
opacity: 0;
transform: translateY(-20px) scale(0.8);
animation: fadeInScale 1s ease-out forwards;
width: 100%;
}

/* Animasi masuk */
@keyframes fadeInScale {
to {
opacity: 1;
transform: translateY(0) scale(1);
}
}

/* Container jadwal */
.jadwal-container {
background: #f4f4f4;
padding: 40px;
border-radius: 10px;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
color: #333;
width: 100%;
}

/* Tabel jadwal */
.table-jadwal {
width: 100%;
border-collapse: collapse;
margin-top: 20px;
background: #fff;
border-radius: 10px;
overflow: hidden;
animation: fadeIn 1.5s ease-in-out;
color: #333;
}

.table-jadwal th,
.table-jadwal td {
padding: 12px;
text-align: center;
border-bottom: 2px solid #ddd;
}

.table-jadwal th {
background: #333;
color: white;
}

.table-jadwal tr:nth-child(even) {
background-color: #f9f9f9;
}

/* Tombol pengingat */
.reminder-button {
margin-top: 20px;
display: inline-block;
padding: 10px 20px;
background: #333;
color: white;
border-radius: 5px;
font-weight: bold;
text-decoration: none;
transition: 0.3s ease;
text-align: center;
}

.reminder-button:hover {
background: #555;
}

/* Animasi tabel */
@keyframes fadeIn {
from {
opacity: 0;
transform: scale(0.95);
}

to {
opacity: 1;
transform: scale(1);
}
}

/* Footer */
.footer {
background-color: #2e2e2e;
color: white;
padding: 40px 20px;
display: flex;
justify-content: space-between;
align-items: flex-start;
flex-wrap: wrap;
width: 100%;
}

.footer-column {
flex: 1;
min-width: 200px;
margin: 10px;
}

.footer a {
text-decoration: none;
color: white;
display: block;
margin-top: 8px;
}

.footer-bottom {
width: 100%;
text-align: center;
padding: 10px;
background: #1c1c1c;
color: white;
font-size: 14px;
}
</style>

<div class="container mt-5">
    <!-- Jadwal Section -->
    <div class="jadwal-container" data-aos="fade-up">
        <h2 class="header-jadwal">🗓️ Jadwal Praktek Nauli Dental Care</h2>
        <table class="table-jadwal">
            <tr>
                <th>Hari</th>
                <th>Jam Praktek</th>
            </tr>
            <tr>
                <td>Senin - Jumat</td>
                <td>10:00 - 19:00 WIB</td>
            </tr>
            <tr>
                <td>Sabtu</td>
                <td>10:00 - 17:00 WIB</td>
            </tr>
            <tr>
                <td>Minggu & Hari Besar</td>
                <td>Tutup</td>
            </tr>
        </table>
        <a href="https://wa.me/628126530965?text=Halo%2C+saya+mau+booking+jadwal+kunjungan" target="_blank" class="reminder-button">
            📲 Booking via WhatsApp
        </a>
    </div>

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
        © 2025 | Nauli Dental Care - All Rights Reserved
    </div>
    @endsection