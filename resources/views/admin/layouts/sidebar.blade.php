<!-- views/admin/layouts/sidebar.blade.php -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <img src="{{ asset('images/logoAdmin.png') }}" alt="Logo Klinik Nauli Dental Care" class="logo-img" />
    </div>

    <ul class="menu-list">
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <span class="menu-icon-text"><i class="bi bi-speedometer2"></i></span>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.layanan.index') }}" class="menu-link {{ Route::is('admin.layanan.*') ? 'active' : '' }}">
                <span class="menu-icon-text"><i class="bi bi-grid"></i></span>
                <span class="menu-text">Layanan</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link {{ Route::is('admin.dokter.*') ? 'active' : '' }}">
                <span class="menu-icon-text"><i class="bi bi-person-badge"></i></span>
                <span class="menu-text">Dokter</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.users.index') }}" class="menu-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                <span class="menu-icon-text"><i class="bi bi-people"></i></span>
                <span class="menu-text">Users</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.appointments.index') }}" class="menu-link {{ Route::is('admin.appointments.*') ? 'active' : '' }}">
                <span class="menu-icon-text"><i class="bi bi-calendar-check"></i></span>
                <span class="menu-text">Janji Temu</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.testimoni.index') }}" class="menu-link {{ Route::is('admin.testimoni.*') ? 'active' : '' }}">
                <span class="menu-icon-text"><i class="bi bi-chat-quote"></i></span>
                <span class="menu-text">Testimoni</span>
            </a>
        </li>
    </ul>

    <div class="user-section">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</div>

