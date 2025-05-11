@extends('admin.layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <header class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Daftar Pengguna</h1>
            </header>

            <!-- Tabel -->
            <div class="overflow-x-auto bg-white p-4 rounded-lg shadow">
                <table class="table table-bordered table-hover w-full">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users->where('role', 'user') as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->last_login_at)
                                        <span class="login-time" data-time="{{ $user->last_login_at->toDateTimeString() }}">
                                            {{ $user->last_login_at->timezone('Asia/Jakarta')->translatedFormat('d M Y H:i') }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script>
        moment.locale('id');

        function updateCurrentTime() {
            const timeElement = document.getElementById('time');
            setInterval(() => {
                timeElement.textContent = moment().format('dddd, D MMMM YYYY HH:mm:ss');
            }, 1000);
        }

        function updateLoginTimes() {
            const elements = document.querySelectorAll('.login-time');
            elements.forEach(el => {
                const serverTime = el.getAttribute('data-time');
                if (serverTime) {
                    const localTime = moment(serverTime).local();
                    el.textContent = localTime.format('dddd, D MMMM YYYY HH:mm:ss');
                } else {
                    el.textContent = 'Belum Pernah Login';
                }
            });
        }

        updateCurrentTime();
        updateLoginTimes();
    </script>
@endpush
