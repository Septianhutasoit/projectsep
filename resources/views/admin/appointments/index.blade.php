@extends('admin.layouts.app')

@section('content')
<div class="inner-content">
    <h2 class="mb-4">Daftar Janji Temu</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>No. HP / WhatsApp</th>
                    <th>Tanggal & Jam</th>
                    <th>Alasan</th>
                    <th>Dibuat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $a)
                <tr>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->phone }}</td>
                    <td>{{ $a->appointment_datetime->format('d M Y H:i') }}</td>
                    <td>{{ $a->reason ?? '-' }}</td>
                    <td>{{ $a->created_at->diffForHumans() }}</td>
                    <td>
                        @if($a->approved)
                        <span class="badge bg-success">Disetujui</span>
                        @else
                        <span class="badge bg-warning">Menunggu</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            @if(!$a->approved)
                            <form action="{{ route('appointments.approve', $a->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            @endif

                            <form action="{{ route('appointments.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus janji temu ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $appointments->links() }}
    </div>
</div>
@endsection



