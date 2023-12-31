<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
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

Route::prefix('Jadwal Kuliah')->group(function(){
    Route::get('/', [JadwalController::class, 'view'])->name('jadwal.view');
    Route::get('createJadwal', [JadwalController::class, 'create'])->name('jadwal.create');
});
