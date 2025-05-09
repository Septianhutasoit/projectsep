<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-4 bg-white shadow-sm border-end" style="width: 260px; min-height: 100vh;">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-4 text-dark text-decoration-none">
        <i class="bi bi-speedometer2 me-2 fs-4 text-primary"></i>
        <span class="fs-5 fw-bold"></span>
    </a>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link d-flex align-items-center gap-2 {{ Route::is('admin.dashboard') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.layanan.index') }}"
                class="nav-link d-flex align-items-center gap-2 {{ Route::is('admin.layanan.*') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-grid"></i> Layanan
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#"
                class="nav-link d-flex align-items-center gap-2 {{ Route::is('admin.dokter.*') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-person-badge"></i> Dokter
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.users.index') }}"
                class="nav-link d-flex align-items-center gap-2 {{ Route::is('admin.users.*') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-people"></i> Users
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.appointments.index') }}"
                class="nav-link d-flex align-items-center gap-2 {{ Route::is('admin.appointments.*') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-calendar-check"></i> Janji Temu
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.testimoni.index') }}"
                class="nav-link d-flex align-items-center gap-2 {{ Route::is('admin.testimoni.*') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-chat-quote"></i> Testimoni
            </a>
        </li>
    </ul>

    <div class="mt-auto pt-3 border-top">
        <div class="d-flex align-items-center justify-content-between">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="ms-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-light border text-danger" title="Keluar">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>