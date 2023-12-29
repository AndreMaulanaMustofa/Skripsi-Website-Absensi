<?php

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
});
