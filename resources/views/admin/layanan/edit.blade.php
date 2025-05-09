@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-8 text-blue-700">Edit Layanan</h1>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded-xl p-6">
        @csrf
        @method('PUT')

        <table class="w-full table-auto border-collapse">
            <tbody>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left w-1/4">Nama</td>
                    <td class="py-2">
                        <input type="text" name="nama" value="{{ $layanan->nama }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left align-top">Deskripsi</td>
                    <td class="py-2">
                        <textarea name="deskripsi" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $layanan->deskripsi }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left align-top">Gambar Saat Ini</td>
                    <td class="py-2">
                        <img src="{{ asset('storage/gambar_layanan/' . $layanan->gambar) }}"
                            class="w-32 h-32 object-cover rounded border">
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold py-2 pr-4 text-left align-top">Ganti Gambar</td>
                    <td class="py-2">
                        <input type="file" name="gambar"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <small class="text-gray-500">Opsional, hanya isi jika ingin mengganti gambar</small>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-end mt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.layanan.index') }}"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Batal
            </a>
        </div>
    </form>

    <div class="mt-8">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Aksi Lainnya</h2>
        <div class="flex justify-end">
            <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection