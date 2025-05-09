@extends('layouts.app')

@section('title', 'Selamat Datang di Nauli Dental Care')

@section('content')

<!-- Hero Section -->
<style>
    .hero-section {
        position: relative;
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        overflow: hidden;
    }

    .hero-section .content {
        position: relative;
        z-index: 2;
        padding: 40px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
    }

    .hero-section .content h1 {
        font-size: 3rem;
        font-weight: bold;
        line-height: 1.2;
        color: rgb(33, 103, 71);
        animation: fadeInUp 1s ease-out;
    }

    .hero-section .content p {
        font-size: 1.5rem;
        font-weight: 600;
        max-width: 600px;
        margin: 0 auto;
        color: rgb(22, 188, 96);
        font-family: 'Arial', sans-serif;
        letter-spacing: 0.5px;
        line-height: 1.6;
        animation: fadeInUp 1.5s ease-out;
    }


    /* Efek animasi untuk fadeIn */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Background dengan animasi berganti secara otomatis */
    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(179, 191, 205, 0.8), rgba(98, 165, 132, 0.9)),
        url("{{ asset('images/galery1.png') }}") no-repeat center center;
        background-size: cover;
        transition: background-image 5s ease-in-out;
        /* Perpanjang durasi transisi */
        overflow: hidden;
    }

    /* Efek pergantian gambar dengan transisi halus */
    .hero-bg img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transition: opacity 3s ease-in-out;
        /* Durasi transisi lebih halus */
    }

    .hero-bg img.visible {
        opacity: 1;
    }

    /* Animasi perubahan background */
    @keyframes backgroundChange {
        0% {
            background-image: url("{{ asset('images/galery1.png') }}");
        }

        33% {
            background-image: url("{{ asset('images/galery2.png') }}");
        }

        66% {
            background-image: url("{{ asset('images/galery3.png') }}");
        }

        100% {
            background-image: url("{{ asset('images/galery1.png') }}");
        }
    }
</style>

<div class="hero-section">
    <div class="hero-bg">
        <!-- Ganti gambar konsultasi dengan galery3 -->
        <img src="{{ asset('images/galery1.png') }}" class="bg-img-1 visible" />
        <img src="{{ asset('images/galery2.png') }}" class="bg-img-2" />
        <img src="{{ asset('images/galery5.png') }}" class="bg-img-3" />
    </div>
    <div class="content">
        <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">
            Selamat Datang di <br>Nauli Dental Care
        </h1>
        <p class="lead mb-4 animate__animated animate__fadeInUp">
            Klinik Gigi Modern dengan Pelayanan Profesional, Teknologi Terkini, dan Dokter Terbaik untuk Anda.
        </p>
    </div>
</div>

<script>
    // Mengelola transisi gambar secara bergantian
    let images = document.querySelectorAll('.hero-bg img');
    let currentIndex = 0;

    function changeImage() {
        // Menyembunyikan gambar saat ini
        images[currentIndex].classList.remove('visible');

        // Menghitung index gambar berikutnya
        currentIndex = (currentIndex + 1) % images.length;

        // Menampilkan gambar berikutnya
        images[currentIndex].classList.add('visible');
    }

    // Menambahkan interval untuk mengganti gambar setiap 7 detik
    setInterval(changeImage, 7000); /* Mengatur waktu interval menjadi 7 detik */
</script>




<!-- Informasi Tambahan Section -->
<section class="py-5 bg-white text-dark">
    <div class="container">
        <h2 class="text-center display-5 fw-bold mb-5">
            Layanan Kami
        </h2>

        <div class="row g-4">
            @foreach ([
            [
            'img' => 'images/Rawatgigi.png',
            'title' => 'Perawatan Gigi Rutin',
            'desc' => 'Perawatan gigi rutin penting untuk menjaga kesehatan mulut dan senyum Anda tetap menawan. Dengan pemeriksaan berkala, dokter gigi dapat mendeteksi masalah sejak dini dan memberikan penanganan sebelum menjadi lebih serius.',
            ],
            [
            'img' => 'images/Konsultasi.png',
            'title' => 'Konsultasi dengan Dokter Gigi',
            'desc' => 'Kami menyediakan layanan konsultasi langsung dengan dokter gigi berpengalaman. Anda bisa mendapatkan saran terbaik untuk berbagai permasalahan gigi.',
            'wa' => 'https://wa.me/6281234567890?text=Halo%20dok,%20saya%20ingin%20konsultasi%20tentang%20perawatan%20gigi.'
            ],
            [
            'img' => 'images/TeknologiModern.png',
            'title' => 'Teknologi Modern',
            'desc' => 'Kami bangga menggunakan teknologi terbaru untuk memberikan pelayanan terbaik bagi pasien kami.'
            ]
            ] as $index => $info)

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    @if(isset($info['img']))
                    <img src="{{ asset($info['img']) }}" class="card-img-top" alt="{{ $info['title'] }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-semibold">{{ $info['title'] }}</h5>
                        <p class="card-text text-secondary">
                            {{ \Illuminate\Support\Str::limit($info['desc'], 70) }}
                        </p>
                        <button class="btn btn-outline-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modalInfo{{ $index }}">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalInfo{{ $index }}" tabindex="-1" aria-labelledby="modalInfoLabel{{ $index }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalInfoLabel{{ $index }}">{{ $info['title'] }}</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if(isset($info['img']))
                            <img src="{{ asset($info['img']) }}" class="img-fluid mb-3 rounded" alt="{{ $info['title'] }}">
                            @endif
                            <p>{{ $info['desc'] }}</p>

                            @if(isset($info['wa']))
                            <a href="{{ $info['wa'] }}" class="btn btn-success mt-3" target="_blank">
                                <i class="bi bi-whatsapp me-1"></i> Konsultasi via WhatsApp
                            </a>
                            @endif

                            @if($info['title'] == 'Teknologi Modern')
                            <div class="row g-4 mt-4">
                                @foreach ([
                                ['img' => 'images/scanner.png', 'name' => 'Intraoral Scanner', 'desc' => 'Alat untuk memindai kondisi gigi dan rongga mulut secara digital.'],
                                ['img' => 'images/xray.png', 'name' => 'Digital X-Ray', 'desc' => 'Pencitraan rontgen modern dengan radiasi rendah dan hasil cepat.'],
                                ['img' => 'images/autoclave.png', 'name' => 'Autoclave Sterilizer', 'desc' => 'Mesin sterilisasi peralatan medis untuk memastikan kebersihan maksimal.'],
                                ['img' => 'images/ultrasonic.png', 'name' => 'Ultrasonic Scaler', 'desc' => 'Alat pembersih karang gigi dengan getaran ultrasonik.'],
                                ['img' => 'images/curelamp.png', 'name' => 'Curing Light', 'desc' => 'Lampu khusus untuk mengeraskan bahan tambal gigi resin.'],
                                ['img' => 'images/endomotor.png', 'name' => 'Endo Motor', 'desc' => 'Digunakan dalam perawatan saluran akar untuk efisiensi dan akurasi.'],
                                ['img' => 'images/suction.png', 'name' => 'Dental Suction', 'desc' => 'Menyedot air liur dan cairan selama perawatan berlangsung.'],
                                ['img' => 'images/handpiece.png', 'name' => 'High-Speed Handpiece', 'desc' => 'Bor gigi berkecepatan tinggi untuk prosedur restorasi.'],
                                ['img' => 'images/airpolisher.png', 'name' => 'Air Polisher', 'desc' => 'Alat semprot air dan bubuk untuk menghilangkan noda pada gigi.'],
                                ['img' => 'images/tang.png', 'name' => 'Tang gigi', 'desc' => 'Alat untuk mencabut gigi ketika selesai dibius.'],
                                ['img' => 'images/Jarum suntik.png', 'name' => 'Suntik bius gigi', 'desc' => 'Alat Suntik bius perlu saat pencabutan pada gigi.'],
                                ['img' => 'images/cotton pliers.png', 'name' => 'Pengait Kapas', 'desc' => 'Alat untuk memegang kapas atau alat kecil lainnya.'],
                                ['img' => 'images/mouth gate.png', 'name' => 'Mouth Gate', 'desc' => 'Alat ini digunakan untuk membuka mulut supaya lebih lebar.'],
                                ['img' => 'images/ligature cutter.png', 'name' => 'Ligature Cutter', 'desc' => 'Memotong ligatur logam atau elastik saat melepas behel.'],
                                ['img' => 'images/karet behel.png', 'name' => 'Karet Behel Gigi', 'desc' => 'Berfungsi untuk memperkuat ikatan logam behel.'],
                                ['img' => 'images/archwire.png', 'name' => 'Kawat Lengkung', 'desc' => 'Kawat utama yang menghubungkan semua bracket.'],
                                ['img' => 'images/steribox.png', 'name' => 'Sterilization Box', 'desc' => 'Penyimpanan steril untuk alat setelah disterilkan.'],
                                ] as $tool)
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset($tool['img']) }}" alt="{{ $tool['name'] }}" class="mb-3" style="height: 100px;">
                                    <h6 class="fw-semibold">{{ $tool['name'] }}</h6>
                                    <p class="text-secondary small">{{ $tool['desc'] }}</p>
                                </div>
                                @endforeach
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>


<!-- Galeri Section -->
<section id="galeri" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center text-primary fw-bold mb-5">Galeri Klinik Kami</h2>

        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner mx-auto" style="max-width: 1000px;">
                @php $first = true; @endphp
                @foreach ([
                'images/galery1.png',
                'images/galery2.png',
                'images/galery3.png',
                'images/galery4.png',
                'images/galery5.png',
                'images/galery6.png',
                'images/galery7.png',
                'images/galery8.png',
                'images/galery9.png'
                ] as $image)
                <div class="carousel-item {{ $first ? 'active' : '' }}">
                    <img src="{{ asset($image) }}" class="d-block w-100 rounded shadow-sm" alt="Galeri Klinik" style="object-fit: cover; max-height: 500px;">
                </div>
                @php $first = false; @endphp
                @endforeach
            </div>

            <!-- Navigasi -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>
    </div>
</section>

<!-- Formulir Booking Janji Temu -->
<section id="buat-janji" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Wujudkan Senyum Terbaik Anda!</h2>
            <p class="text-muted">Klik tombol di bawah untuk membuat janji temu dengan dokter gigi kami.</p>
            <button id="openFormBtn" class="btn btn-primary btn-lg fw-bold mt-3">
                Buat Janji Sekarang
            </button>
        </div>

        <!-- Pesan Sukses -->
        <div id="successMessage" class="alert alert-success text-center d-none">
            Formulir berhasil dikirim! Kami akan segera menghubungi Anda.
        </div>

        <!-- Formulir Janji Temu -->
        <div id="appointmentFormContainer" class="row justify-content-center d-none">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h3 class="fw-bold text-center mb-4">Formulir Janji Temu</h3>
                        <form id="appointmentForm" method="POST" action="{{ route('appointment.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor HP / WhatsApp</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Pilih Tanggal</label>
                                <input type="date" class="form-control" id="appointment_datetime" name="appointment_datetime" required>
                            </div>

                            <div class="mb-3">
                                <label for="reason" class="form-label">Alasan Konsultasi (Opsional)</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg fw-bold">
                                    Kirim Permintaan Janji Temu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script untuk Tampilkan Form dan Notifikasi -->
<script>
    document.getElementById('openFormBtn').addEventListener('click', function() {
        var formContainer = document.getElementById('appointmentFormContainer');
        formContainer.classList.remove('d-none');
        formContainer.scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>

<!-- Testimoni Section -->
<section class="py-5" id="testimoni" style="background-color:rgb(250, 252, 253);">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color: #007bff;">Apa Kata Pasien?</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($testimonis as $t)
            <div class="col d-flex">
                <div class="card shadow-sm border-0 p-4 w-100 d-flex flex-column" style="background-color: rgb(81, 128, 161); color: #fff;">
                    {{-- Profil --}}
                    <div class="text-center mb-3">
                        <img src="{{ $t->foto ? asset('storage/' . $t->foto) : asset('images/default-user.png') }}"
                            alt="{{ $t->nama }}" class="rounded-circle mb-2" width="70" height="70" style="object-fit: cover;">
                        <h6 class="fw-semibold mb-0">{{ $t->nama }}</h6>
                        <small class="text-light">{{ $t->jabatan ?? 'Pasien' }}</small>
                    </div>

                    {{-- Pesan --}}
                    <div class="flex-grow-1">
                        <p class="fst-italic text-light small">"{{ Str::words($t->pesan, 40) }}"</p>
                    </div>

                    {{-- Rating --}}
                    <div class="mt-3 text-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= $t->rating ? 'bi-star-fill' : 'bi-star' }} text-warning"></i>
                            @endfor
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="py-5 bg-white" id="form-testimoni">
    <div class="container">
        <h3 class="text-center text-primary fw-bold mb-4">Bagikan Pengalaman Anda</h3>

        @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan/Profesi (Opsional)</label>
                        <input type="text" name="jabatan" class="form-control" placeholder="Contoh: Web Developer">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto (Opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea name="pesan" class="form-control" rows="4" required placeholder="Tulis pengalaman Anda di sini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Rating</label>
                        <div class="rating mx-auto">
                            @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                            <label for="star{{ $i }}"><i class="bi bi-star-fill"></i></label>
                            @endfor
                        </div>

                    </div>
            </div>
            <button type="submit" class="btn btn-primary w-50 mt-3">Kirim Testimoni</button>
            </form>
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
        <a href="{{ route('tim-spesialis') }}" style="color: white; text-decoration: none; display: block;">Dokter Kami</a>
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
    © 2023-2025 | Nauli Dental Care - All Rights Reserved
</div>
@endsection