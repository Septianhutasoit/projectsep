@extends('layouts.app')

@section('title', 'Selamat Datang di Nauli Dental Care')

@section('content')

<!-- Hero Section -->
<div class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-600 to-blue-400 text-white text-center">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-5xl font-bold animate-slideIn">Selamat Datang di Nauli Dental Care</h1>
        <p class="mt-4 text-lg animate-fadeIn">
            Klinik Gigi Modern dengan Pelayanan Profesional dan Teknologi Terkini.
        </p>
        <a href="#artikel" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg shadow-md font-bold hover:bg-gray-200 transition duration-300 animate-slideIn">
            Pelajari Lebih Lanjut
        </a>
    </div>
</div>

<!-- Artikel Informasi -->
<section id="artikel" class="py-20 bg-gray-100">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-4xl font-bold text-blue-600 text-center animate-slideIn">Mengapa Kesehatan Gigi Itu Penting?</h2>
        <p class="mt-4 text-gray-600 text-lg text-center animate-fadeIn">
            Kesehatan gigi dan mulut sangat berpengaruh terhadap kesehatan tubuh secara keseluruhan.
            Perawatan gigi yang baik dapat membantu mencegah berbagai penyakit, termasuk infeksi gigi dan gusi.
        </p>

        <!-- Animasi Box Bergerak ke Bawah -->
        <div class="mt-12 space-y-12">
            <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col md:flex-row items-center text-center md:text-left box-animate">
                <div class="md:w-1/3">
                    <img src="{{ asset('images/Rawatgigi.png') }}" alt="Perawatan Gigi" class="rounded-lg shadow-md w-full transform transition-all duration-500 hover:scale-110">
                </div>
                <div class="md:w-2/3 md:ml-6">
                    <h3 class="text-2xl font-bold text-blue-600">Perawatan Gigi Rutin</h3>
                    <p class="mt-4 text-gray-600 text-lg">
                        Dengan melakukan pemeriksaan gigi secara rutin, Anda dapat mencegah masalah gigi seperti gigi berlubang, infeksi, dan gusi berdarah.
                    </p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col md:flex-row items-center text-center md:text-left box-animate">
                <div class="md:w-1/3 md:order-2">
                    <img src="{{ asset('images/doctor-consultation.jpg') }}" alt="Konsultasi Dokter Gigi" class="rounded-lg shadow-md w-full transform transition-all duration-500 hover:scale-110">
                </div>
                <div class="md:w-2/3 md:mr-6">
                    <h3 class="text-2xl font-bold text-blue-600">Konsultasi dengan Dokter Gigi</h3>
                    <p class="mt-4 text-gray-600 text-lg">
                        Dokter gigi kami siap memberikan konsultasi mengenai kesehatan gigi Anda serta solusi terbaik untuk setiap permasalahan gigi yang Anda alami.
                    </p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col md:flex-row items-center text-center md:text-left box-animate">
                <div class="md:w-1/3">
                    <img src="{{ asset('images/dental-technology.jpg') }}" alt="Teknologi Modern" class="rounded-lg shadow-md w-full transform transition-all duration-500 hover:scale-110">
                </div>
                <div class="md:w-2/3 md:ml-6">
                    <h3 class="text-2xl font-bold text-blue-600">Teknologi Modern</h3>
                    <p class="mt-4 text-gray-600 text-lg">
                        Kami menggunakan teknologi terbaru dalam perawatan gigi untuk memberikan hasil yang terbaik dan lebih nyaman bagi pasien.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<div class="py-20 bg-blue-600 text-white text-center">
    <h2 class="text-3xl font-bold animate-slideIn">Mulai Perawatan Gigi Anda Sekarang</h2>
    <p class="mt-4 text-lg animate-fadeIn">Buat janji temu dengan dokter gigi profesional kami dan dapatkan senyum sehat!</p>
    <a href="{{ url('/appointment') }}" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg shadow-md font-bold hover:bg-gray-200 transition duration-300 animate-slideIn">
        Buat Janji Sekarang
    </a>
</div>

<!-- Tambahkan Animasi -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    // Animasi Scroll untuk Box Bergerak ke Bawah
    document.addEventListener("DOMContentLoaded", function() {
        gsap.utils.toArray('.box-animate').forEach((element) => {
            gsap.from(element, {
                opacity: 0,
                y: -50,
                duration: 1.5,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: element,
                    start: "top 85%",
                    toggleActions: "play none none none"
                }
            });
        });
    });
</script>
@endsection

