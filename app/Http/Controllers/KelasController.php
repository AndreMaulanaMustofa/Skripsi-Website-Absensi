<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function view(){
        $kelas = Kelas::all();
        $title = "Kelas";

        $dataKelas = Kelas::all();

        foreach ($dataKelas as $item) {
            $jumlahMahasiswa = Mahasiswa::where('Kelas', $item->kelas)->count();
            echo "Jumlah mahasiswa di kelas {$item->kelas}: {$jumlahMahasiswa} mahasiswa\n";
        }

        return view('kelas.index', compact('kelas', 'title', 'jumlahMahasiswa'));
    }

    public function create(){
        $title = "Buat Kelas";
        return view('kelas.create', compact('title'));
    }

    public function store(Request $request){
        $kelas = new Kelas;

        $kelas->kelas = $request->input('Kelas');
        $kelas->jurusan = $request->input('jurusan');
        $kelas->sks = $request->input('sks');
        $kelas->nama_DPA = $request->input('namaDPA');

        for ($i=1; $i < 9; $i++) {
            $matkul = 'matkul_' . $i;
            $kelas->$matkul = $request->input($matkul);
        }

        $kelas->save();

        return redirect()->route('kelas.view');
    }
}
