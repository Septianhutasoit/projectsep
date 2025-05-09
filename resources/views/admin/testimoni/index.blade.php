@extends('admin.layouts.app')

@section('content')
<div class="inner-content">
    <h2 class="mb-4">Daftar Testimoni</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
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
                @foreach($testimonis as $t)
                <tr>
                    <td class="text-center">
                        <img src="{{ $t->foto ? asset('storage/'.$t->foto) : asset('images/default-user.png') }}"
                            width="50" height="50" class="rounded-circle" style="object-fit: cover;">
                    </td>
                    <td>{{ $t->nama }}</td>
                    <td>{{ Str::limit($t->pesan, 50) }}</td>
                    <td>
                        @for($i = 1; $i <= $t->rating; $i++)
                            <span class="text-warning">★</span>
                            @endfor
                            @for($i = $t->rating + 1; $i <= 5; $i++)
                                <span class="text-secondary">★</span>
                                @endfor
                    </td>
                    <td>
                        <form action="{{ route('admin.testimoni.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
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
</div>
@endsection