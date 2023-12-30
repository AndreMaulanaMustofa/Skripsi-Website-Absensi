<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function view(){
        $title = "Jadwal Kuliah";
        $jadwal = jadwal::all();

        return view('jadwalKuliah.index', compact('title', 'jadwal'));
    }

    public function create(Request $request){
        $title = "Buat Jadwal";
        $kelas = kelas::all();

        return view('jadwalKuliah.create', compact('title', 'kelas'));
    }
}
