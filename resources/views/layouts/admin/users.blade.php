@extends('layouts.admin')

@section('title', 'Kelola Pengguna')

@section('admin-content')
<!-- AOS Animate on Scroll -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

<div class="p-4" data-aos="fade-up">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Kelola Pengguna</h1>

    <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-blue-50 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Septian H</td>
                    <td class="px-6 py-4 text-gray-700">septianhts95@gmail.com</td>
                    <td class="px-6 py-4 text-gray-700">User</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg shadow transition transform hover:scale-105">
                            Hapus
                        </button>
                    </td>
                </tr>
                <!-- Tambahkan baris lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>

<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 700,
        once: true,
    });
</script>
@endsection