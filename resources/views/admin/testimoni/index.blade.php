@extends('admin.layouts.app')

@section('title', 'Daftar Testimoni')

@section('content')
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Testimoni</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto bg-white p-4 rounded-lg shadow">
                <table class="table table-bordered table-hover align-middle w-full">
                    <thead class="table-primary">
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Pesan</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonis as $t)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ $t->foto ? asset('storage/' . $t->foto) : asset('images/default-user.png') }}"
                                        width="50" height="50" class="rounded-circle object-cover mx-auto"
                                        style="object-fit: cover;">
                                </td>
                                <td>{{ $t->nama }}</td>
                                <td>{{ Str::limit($t->pesan, 50) }}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $t->rating)
                                            <span class="text-warning">★</span>
                                        @else
                                            <span class="text-secondary">★</span>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    <form action="{{ route('admin.testimoni.destroy', $t->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
