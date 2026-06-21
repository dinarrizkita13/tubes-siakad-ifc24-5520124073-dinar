<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Mahasiswa;

Route::get('/', fn() => redirect('/login'));

// Auth routes (dari Breeze)
require __DIR__.'/auth.php';

// Dashboard
Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ===== ADMIN ROUTES =====
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dosen
    Route::resource('dosen', Admin\DosenController::class)->except(['show']);

    // Mahasiswa
    Route::resource('mahasiswa', Admin\MahasiswaController::class)->except(['show']);

    // Mata Kuliah
    Route::resource('matakuliah', Admin\MatakuliahController::class)->except(['show']);

    // Jadwal
    Route::resource('jadwal', Admin\JadwalController::class)->except(['show']);

    // KRS (lihat saja untuk admin)
    Route::get('krs', [Admin\KrsController::class, 'index'])->name('krs.index');
});

// ===== MAHASISWA ROUTES =====
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {

    // KRS
    Route::get('krs', [Mahasiswa\KrsController::class, 'index'])->name('krs.index');
    Route::get('krs/ambil', [Mahasiswa\KrsController::class, 'create'])->name('krs.create');
    Route::post('krs', [Mahasiswa\KrsController::class, 'store'])->name('krs.store');
    Route::delete('krs/{id}', [Mahasiswa\KrsController::class, 'destroy'])->name('krs.destroy');

    // Jadwal
    Route::get('jadwal', [Mahasiswa\JadwalController::class, 'index'])->name('jadwal.index');
});