@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <div class="px-6 py-4">
            <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">Tambah Layanan</h1>

            <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <table class="table-auto w-full">
                    <tbody>
                        <tr>
                            <th class="text-left py-2 px-4 font-semibold text-gray-700">
                                <label for="nama">Nama</label>
                            </th>
                            <td class="py-2 px-4">
                                <input type="text" id="nama" name="nama"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left py-2 px-4 font-semibold text-gray-700">
                                <label for="deskripsi">Deskripsi</label>
                            </th>
                            <td class="py-2 px-4">
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left py-2 px-4 font-semibold text-gray-700">
                                <label for="gambar">Gambar</label>
                            </th>
                            <td class="py-2 px-4">
                                <input type="file" id="gambar" name="gambar"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="py-4 px-4 text-center">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Simpan
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection