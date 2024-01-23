<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('Login.acc');
Route::post('/', [LoginController::class, 'login'])->name('login.auth');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('daftar', [LoginController::class, 'regis'])->name('Regis.acc');

Route::prefix('Mahasiswa')->group(function(){
    Route::get('/', [MahasiswaController::class, 'view'])->name('mahasiswa.view');
    Route::get('createData', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('storeData', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('editData/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('updateData/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('deleteData/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
});

Route::prefix('Kelas')->group(function(){
    Route::get('/', [KelasController::class, 'view'])->name('kelas.view');
    Route::get('createKelas', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('storeKelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('editKelas/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('updateKelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('deleteKelas/{id}', [KelasController::class, 'delete'])->name('kelas.delete');
});

Route::prefix('Jadwal Kuliah')->group(function () {
    Route::get('/', [JadwalController::class, 'view'])->name('jadwal.view');
    Route::get('createJadwal', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::get('/getKelas/{jur_id}', [JadwalController::class, 'getKelass'])->name('getkelass');
    Route::get('/getMatkul/{id}', [JadwalController::class, 'getMatkul'])->name('getMatkul');
});

Route::prefix('Pengaturan')->group(function(){
    Route::get('/', [AkunController::class, 'index'])->name('admin.data');
    Route::get('editAdmin', [AkunController::class, 'edit'])->name('admin.edit');
    Route::get('Password', [AkunController::class, 'indexPassword'])->name('admin.pass');
});
