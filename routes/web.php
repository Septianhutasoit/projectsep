<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    AboutController,
    ScheduleController,
    ArticleController,
    ContactController,
    KontakController,
    AppointmentController,
    AuthController,
    AdminController,
    UserController,
    TestimoniController,
    TimSpesialisController,
    Admin\DashboardController,
    Admin\TestimoniAdminController,
    Admin\LayananController,
    ForgotPasswordController
};

// ==============================
// ✅ Halaman Utama & Publik
// ==============================
Route::get('/', [TestimoniController::class, 'index'])->name('home'); // Ganti ke TestimoniController
Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/visi-misi', fn() => view('visi-misi'))->name('visi-misi');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal');
Route::get('/Tim-spesialis', [TimSPesialisController::class, 'index'])->name('tim-spesialis');

// ==============================
// ✅ Kontak
// ==============================
Route::prefix('kontak')->group(function () {
    Route::get('/', fn() => view('contact.index'))->name('kontak.index');
    Route::get('/alamat', fn() => view('contact.address'))->name('contact.address');
    Route::post('/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');
});
Route::post('/kirim-kontak', [ContactController::class, 'send'])->name('contact.send');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// ==============================
// ✅ Autentikasi
// ==============================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==============================
// ✅ Area User (Login Diperlukan)
// ==============================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/appointments', [AppointmentController::class, 'index'])->name('dashboard.appointments');
    Route::get('/home', [TestimoniController::class, 'index'])->name('home');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
    // Optional: redirect welcome
});

// ==============================
// ✅ Form Janji Temu (Publik)
// ==============================
Route::prefix('appointment')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointment.form');
    Route::post('/', [AppointmentController::class, 'store'])->name('appointment.store');
});

// ==============================
// ✅ Testimoni (Publik & Admin)
// ==============================
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/testimoni', [TestimoniAdminController::class, 'index'])->name('admin.testimoni.index');
    Route::delete('/testimoni/{id}', [TestimoniAdminController::class, 'destroy'])->name('admin.testimoni.destroy');
});

// ==============================
// ✅ Admin Panel (Login + Admin Role)
// ==============================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard & Data Utama
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/appointments', [AppointmentController::class, 'adminIndex'])->name('admin.appointments.index');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');

    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    });

    /*Admin Layanan*/
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
        Route::resource('layanan', LayananController::class);
    });

    // Manajemen Janji Temu
    Route::prefix('appointments')->group(function () {
        Route::post('/{id}/approve', [AppointmentController::class, 'approve'])->name('admin.appointments.approve');
        Route::post('/{id}/reject', [AppointmentController::class, 'reject'])->name('admin.appointments.reject');
        Route::patch('/{appointment}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
        Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    });
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan');
    Route::get('/layanan/create', [LayananController::class, 'create'])->name('admin.layanan.create');
    Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/testimonis', [TestimoniController::class, 'index'])->name('admin.testimonis');
    Route::get('admin/appointments', [AppointmentController::class, 'index'])->name('admin.appointments');
});
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

/*SPESIALIS*/
Route::get('/tim-spesialis', [TimSpesialisController::class, 'index'])->name('tim-spesialis.index');
Route::get('/tim-spesialis/create', [TimSpesialisController::class, 'create'])->name('tim-spesialis.create');
Route::post('/tim-spesialis', [TimSpesialisController::class, 'store'])->name('tim-spesialis.store');

    