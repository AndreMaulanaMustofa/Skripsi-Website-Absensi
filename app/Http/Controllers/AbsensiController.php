<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(){
        $title = "Data Absensi";
        $absensi = Absensi::all();

        return view('Absensi.index', compact('title', 'absensi'));
    }
}
