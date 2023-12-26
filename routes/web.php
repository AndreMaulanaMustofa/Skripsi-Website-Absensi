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

Route::prefix('mahasiswa')->group(function(){
    Route::get('/', [MahasiswaController::class, 'view'])->name('mahasiswa.view');
});

Route::prefix('kelas')->group(function(){
    Route::get('/', [KelasController::class, 'view'])->name('kelas.view');
});
