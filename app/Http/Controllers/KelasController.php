<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function view(){
        $kelas = Kelas::join('jurusan','jurusan.jur_id','=','kelas.jur_id')->select('*')->get();
        $title = "Kelas";

        return view('kelas.index', compact('kelas', 'title'));
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

    public function edit($id){
        $title = "Edit Kelas";
        $kelas = kelas::find($id);

        return view('kelas.edit', compact('title', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        $kelas->kelas = $request->input('Kelas');
        $kelas->jurusan = $request->input('jurusan');
        $kelas->sks = $request->input('sks');
        $kelas->nama_DPA = $request->input('namaDPA');

        for ($i = 1; $i < 9; $i++) {
            $matkul = 'matkul_' . $i;
            $kelas->$matkul = $request->input($matkul);
        }

        $kelas->update();

        return redirect()->route('kelas.view');
    }

    public function delete($id){
        Kelas::find($id)->delete();

        return redirect()->route('kelas.view');
    }

}
