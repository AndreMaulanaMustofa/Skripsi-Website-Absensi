<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function view(){
        $title = "Jadwal Kuliah";
        $jadwal = jadwal::all();

        return view('jadwalKuliah.index', compact('title', 'jadwal'));
    }
}
