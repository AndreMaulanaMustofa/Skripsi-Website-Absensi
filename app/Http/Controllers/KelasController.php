<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function view(){
        $kelas = kelas::all();
        $title = "Kelas";
        return view('kelas.index', compact('kelas', 'title'));
    }
}
