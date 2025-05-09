@extends('layouts.app')

@section('content')
@php
use Illuminate\Support\Str;
@endphp
d
<div class="container-sm">
    <h2 class="text-center my-4 text-dark fade-in">Tentang Klinik Gigi Nauli Dental Care</h2>
    <h2 class="text-center mb-4 text-primary fade-in">Layanan Perawatan Gigi</h2>

    <!-- Data Statis -->
    <div class="row g-3 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/perawatan anak.png') }}" class="card-img-top" alt="Perawatan Gigi Anak">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Perawatan Gigi Anak</h5>
                    <p class="card-text text-center">Saat mengalami gangguan kesehatan pada gigi yang cukup serius,
                        ada baiknya Anda melakukan konsultasi dan pemeriksaan ke dokter gigi. Bahkan, Anda juga
                        disarankan untuk melakukan pemeriksaan gigi secara rutin setiap 6 bulan sekali. </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Gigi palsu.png') }}" class="card-img-top" alt="Gigi Palsu/Tiruan">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Gigi Palsu/Tiruan</h5>
                    <p class="card-text text-center">Perawatan yang menggantikan gigi yang hilang dari soketnya,
                        satu atau lebih gigi asli yang hilang serta jaringan sekitar agar fungsi, penampilan,
                        rasa nyaman, dan kesehatan yang terganggu dapat digunakan kembali sesuai fungsinya</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Whitening gigi.png') }}" class="card-img-top" alt="Bleaching">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Bleaching / Pemutihan Gigi</h5>
                    <p class="card-text text-center">Bleaching gigi adalah perawatan yang bertujuan untuk memutihkan
                        atau mencerahkan gigi menggunakan bahan kimia berupa hidrogen peroksida dan karbamid peroksida </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 justify-content-center mt-3">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Behel Gigi.png') }}" class="card-img-top" alt="Behel">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Behel/Kawat Gigi</h5>
                    <p class="card-text text-center">Memperbaiki posisi gigi agar gigitan lebih baik dan menghasilkan senyum indah,
                        selain itu juga Behel memperbaiki posisi gigi atau rahang agar gigitan menjadi baik dan menghasilkan
                        senyum yang indah dan warnanya juga menarik perhatian orang.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Perawatan Akar.png') }}" class="card-img-top" alt="Perawatan Saluran Akar">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Perawatan Saluran Akar</h5>
                    <p class="card-text text-center">Perawatan Saluran Akar (PSA) adalah perawatan medis yang dilakukan
                        untuk mengatasi infeksi atau peradangan di dalam saluran akar gigi, dimana terdapat jaringan
                        saraf dan juga pembuluh-pembuluh darah </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Operasi.png') }}" class="card-img-top" alt="Operasi Impaksi">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Operasi Impaksi</h5>
                    <p class="card-text text-center">Operasi Impaksi merupakan operasi pencabutan gigi geraham
                        atau gigi bungsu yang tidak tumbuh sempurna. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 justify-content-center mt-3">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Scalling.png') }}" class="card-img-top" alt="Scaling">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Scaling</h5>
                    <p class="card-text text-center">Scaling atau pembersihan karang gigi adalah tindakan
                        untuk membersihkan lapisan keras (karang gigi) yang menempel pada gigi maupun jaringan lunak rongga mulut
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Cabut gigi.png') }}" class="card-img-top" alt="Cabut gigi">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Cabut gigi</h5>
                    <p class="card-text text-center">Pencabutan gigi adalah tindakan bedah minor pada kedokteran gigi yang
                        melibatkan jaringan keras dan jaringan lunak pada rongga mulut yang bertujuan untuk mengambil gigi
                        beserta akarnya dari dalam soket tulang, dan jangan coba untuk cabut gigi tanpa didampingi oleh
                        orang profesional seperti kami.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('images/Tambal gigi.png') }}" class="card-img-top" alt="Tambal gigi">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Tambal gigi</h5>
                    <p class="card-text text-center">Tindakan untuk menutup kavitas (lubang pada gigi) dengan menggunakan
                        bahan komposit yang bertujuan untuk mengembalikan bentuk gigi sesuai anatomisnya dan mengembalikan
                        fungsi gigi seperti semula </p>
                </div>
            </div>
        </div>
        <div class="row g-3 justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100">
                    <img src="{{ asset('images/Tambal gigi.png') }}" class="card-img-top" alt="Pit">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center">Fissure sealant</h5>
                        <p class="card-text text-center">Pit dan fissure sealant merupakan suatu tindakan pencegahan karies
                            pada gigi yang secara anatomis mempunyai pit dan fissure yang dalam yang karenaanya lebih mudah mengalami karies . </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100">
                    <img src="{{ asset('images/Implant gigi.png') }}" class="card-img-top" alt="Penanaman Gigi">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center">Implant Gigi</h5>
                        <p class="card-text text-center">Implant gigi adalah prosedur penanaman akar gigi buatan yang berbentuk
                            seperti baut yang biasanya terbuat dari logam khusus seperti titanium pada rahang. Prosedur perawatan
                            ini dilakukan untuk menopang mahkota gigi buatan (crown gigi) </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100">
                    <img src="{{ asset('images/Crown gigi.png') }}" class="card-img-top" alt="Mahkota Gigi">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center">Crown Gigi</h5>
                        <p class="card-text text-center">Crown gigi atau mahkota gigi adalah salah satu bentuk restorasi gigi
                            yang menutupi seluruh gigi (selubung), gigi dengan pasak, atau implant. Tujuan perawatan crown gigi
                            adalah untuk mengembalikan fungsi gigi, mencakup mastikasi, estetik, fonetik, dan melindungi jaringan periodontal </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Dinamis dari Database -->
    <h2 class="text-center my-4 text-dark fade-in">Layanan Lainnya</h2>
    <div class="row g-3 justify-content-center">
        @forelse($layanan as $item)
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="{{ asset('storage/gambar_layanan/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">{{ $item->nama }}</h5>
                    <p class="card-text text-center">{{ Str::limit($item->deskripsi, 150, '...') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">Tidak ada layanan lain yang tersedia.</div>
        @endforelse
    </div>

    <h2 class="text-center my-4 text-dark fade-in">Daftar Harga Perawatan Gigi</h2>

    <div class="table-responsive fade-in-up">
        <table class="table table-bordered shadow-lg">
            <tbody class="bg-light">
                <tr>
                    <td colspan="2" class="fw-bold bg-secondary text-white">Pemasangan Behel</td>
                </tr>
                <tr>
                    <td>Bahan Behel - 3 Juta</td>
                    <td>3.000.000</td>
                </tr>
                <tr>
                    <td>Bahan Behel - 4 Juta</td>
                    <td>4.000.000</td>
                </tr>
                <tr>
                    <td>Bahan Behel - 5 Juta</td>
                    <td>5.000.000</td>
                </tr>
                <tr>
                    <td>Bahan Behel - 6 Juta</td>
                    <td>6.000.000</td>
                </tr>
                <tr>
                    <td>Kontrol Behel (Atas & Bawah)</td>
                    <td>100.000/bulan</td>
                </tr>
                <tr>
                    <td>Kontrol Behel (Atas atau Bawah)</td>
                    <td>50.000/bulan</td>
                </tr>

                <tr>
                    <td colspan="2" class="fw-bold bg-secondary text-white">Pemasangan Gigi Palsu</td>
                </tr>
                <tr>
                    <td>PFM (Lapisan Logam + Porselen)</td>
                    <td>1.600.000/gigi</td>
                </tr>
                <tr>
                    <td>Zirconia (Lebih Kuat & Tahan Retak)</td>
                    <td>3.500.000/gigi</td>
                </tr>
                <tr>
                    <td>Akrilik (Bahan Kasar)</td>
                    <td>400.000/gigi</td>
                </tr>
                <tr>
                    <td>Valplast (Lentur & Elastis)</td>
                    <td>800.000/gigi</td>
                </tr>

                <tr>
                    <td colspan="2" class="fw-bold bg-secondary text-white">Perawatan Gigi</td>
                </tr>
                <tr>
                    <td>Penambalan Gigi</td>
                    <td>200.000 - 300.000/gigi</td>
                </tr>
                <tr>
                    <td>Scaling</td>
                    <td>200.000 - 400.000</td>
                </tr>
                <tr>
                    <td>Saluran Akar (5x Kontrol)</td>
                    <td>1.200.000</td>
                </tr>
                <tr>
                    <td>Bleaching</td>
                    <td>3.000.000</td>
                </tr>
                <tr>
                    <td>Pencabutan Gigi</td>
                    <td>200.000/gigi</td>
                </tr>
            </tbody>
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
        <a href="#" style="color: white; text-decoration: none; display: block;">Beranda</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Layanan</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Jadwal</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Dokter</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Kontak</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Visi & Misi</a>
    </div>
    <div style="flex: 1; min-width: 200px; margin: 10px;">
        <h3 style="color: white;">Services</h3>
        <a href="#" style="color: white; text-decoration: none; display: block;">Scaling</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Tambal Gigi</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Bleaching Gigi</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Behel Gigi</a>
        <a href="#" style="color: white; text-decoration: none; display: block;">Gigi Palsu</a>
    </div>
    <div style="flex: 1; min-width: 200px; margin: 10px;">
        <h3 style="color: white;">Our Location</h3>
        <p>Jl. Raja Paindoan No.20A, Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara 22314</p>
        <h3 style="color: white;">Contact Us</h3>
        <p>Email: contact@naulidentalcare.com</p>
        <!-- Tambahkan Ikon Media Sosial di sini -->
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
    </div>
    </div>
</footer>
<div style="width: 100%; text-align: center; padding: 10px; background: #333; color: white; font-size: 14px;">
    © 2025 | Nauli Dental Care - All Rights Reserved
</div>
@endsection