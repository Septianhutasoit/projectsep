@extends('layouts.app')

@section('content')
<style>
    /* Animasi untuk header jadwal */
    .header-jadwal {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        opacity: 0;
        transform: translateY(-20px) scale(0.8);
        animation: fadeInScale 1s ease-out forwards;
    }

    @keyframes fadeInScale {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Background dengan gradient */
    .jadwal-container {
        background: linear-gradient(135deg, #28a745, #218838);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Style tabel */
    .table-jadwal {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        animation: fadeIn 1.5s ease-in-out;
    }

    .table-jadwal th,
    .table-jadwal td {
        padding: 12px;
        text-align: center;
        border-bottom: 2px solid #ddd;
    }

    .table-jadwal th {
        background: #218838;
        color: white;
    }

    .table-jadwal tr {
        opacity: 0;
        transform: translateY(20px);
        animation: rowFadeIn 1s ease-out forwards;
    }

    /* Animasi fade-in untuk setiap baris tabel */
    @keyframes rowFadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Delay animasi untuk setiap baris */
    .table-jadwal tr:nth-child(1) {
        animation-delay: 0.3s;
    }

    .table-jadwal tr:nth-child(2) {
        animation-delay: 0.6s;
    }

    .table-jadwal tr:nth-child(3) {
        animation-delay: 0.9s;
    }

    .table-jadwal tr:nth-child(4) {
        animation-delay: 1.2s;
    }

    /* --- Footer Section --- */
    .footer {
        background-color: rgb(40, 26, 228);
        color: white;
        padding: 40px 20px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .footer-column {
        flex: 1;
        min-width: 200px;
        margin: 10px;
    }

    .footer h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .footer a {
        text-decoration: none;
        color: white;
        display: block;
        margin-top: 8px;
    }

    .footer-logo {
        display: flex;
        align-items: center;
    }

    .footer-logo img {
        width: 50px;
        margin-right: 10px;
    }

    .social-icons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .social-icons i {
        font-size: 24px;
    }

    .footer-bottom {
        width: 100%;
        text-align: center;
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #ccc;
        font-size: 14px;
        color: white;
        background: hsl(249, 88.50%, 47.80%);
    }
</style>

<div class="container mt-4">
    <div class="jadwal-container">
        <h2 class="header-jadwal">Jadwal Praktek Nauli Dental Care</h2>
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
    </div>
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
        <a href="{{ route('doctors') }}" style="color: white; text-decoration: none; display: block;">Dokter</a>
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