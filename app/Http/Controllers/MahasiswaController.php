<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function view(){
        $mahasiswa = mahasiswa::all();
        $title = "Mahasiswa";
        return view('dataMahasiswa.index', compact('mahasiswa', 'title'));
    }
}
