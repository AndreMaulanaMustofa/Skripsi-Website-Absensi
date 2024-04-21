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

    public function getAbsensi($status){
        $getStatus = Absensi::where('status', $status)->get();

        return view('Absensi.getStatus', compact('getStatus'));
    }

    public function getAbsensibyDate($tgl_absen){
        $getStatus = Absensi::where('tgl_absen', $tgl_absen)->get();

        return view('Absensi.getStatus', compact('getStatus'));
    }

    public function getAbsensibyDateRange($tglawal,$tglakhir){
        $getStatus = Absensi::whereBetween('tgl_absen', [$tglawal, $tglakhir])->get();
        return view('Absensi.getStatus', compact('getStatus'));
    }

    public function delete($id){
        Absensi::find($id)->delete();

        return redirect()->route('Absensi.index');
    }
}
