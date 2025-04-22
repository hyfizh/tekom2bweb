<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('admin.pages.login.login');
    })->name('login');

    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/jurusan', [JurusanController::class, 'index']);
    Route::get('/admin/jurusan/create', [JurusanController::class, 'create']);
    Route::post('/admin/jurusan/create', [JurusanController::class, 'store']);
    Route::get('/admin/jurusan/{jurusan}/edit', [JurusanController::class, 'edit']);
    Route::put('/admin/jurusan/{jurusan}/edit', [JurusanController::class, 'update']);
    Route::delete('/admin/jurusan/{jurusan}', [JurusanController::class, 'destroy']);

    Route::get('/admin/ruangan', [RuanganController::class, 'index']);
    Route::get('/admin/ruangan/create', [RuanganController::class, 'create']);
    Route::post('/admin/ruangan/create', [RuanganController::class, 'store']);
    Route::get('/admin/ruangan/{ruangan}/edit', [RuanganController::class, 'edit']);
    Route::put('/admin/ruangan/{ruangan}/edit', [RuanganController::class, 'update']);
    Route::delete('/admin/ruangan/{ruangan}', [RuanganController::class, 'destroy']);

    Route::resource('/dashboard', DashboardController::class);
    Route::resource( '/admin/prodi', ProdiController::class);
    Route::resource('/admin/mahasiswa', MahasiswaController::class);
    Route::resource('/admin/dosen', DosenController::class);
    Route::resource('/admin/user', userController::class);
    Route::get('/admin/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('admin.mahasiswa.detail');
    Route::get('/admin/mahasiswa/{id}/detail', [MahasiswaController::class, 'show'])->name('mahasiswa.detail');


    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');


});
