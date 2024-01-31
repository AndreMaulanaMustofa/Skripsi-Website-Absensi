<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(){
        $title = "Akun Mahasiswa";
        $mahasiswa = mahasiswa::all();

        return view('akunMahasiswa.index', compact('title', 'mahasiswa'));
    }
}
