<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function view()
    {
        $title = "Jadwal Kuliah";
        $jadwal = jadwal::groupBy('semester')->get();
        return view('jadwalKuliah.index', compact('title', 'jadwal'));
    }

    public function create(Request $request)
    {
        $title = "Buat Jadwal";
        $kelas = kelas::all();
        $jurusan = Jurusan::all();

        return view('jadwalKuliah.create', compact('title', 'kelas', 'jurusan'));
    }

    public function storeJadwal(Request $request)
    {
        $jadwal = new Jadwal;

        $jadwal->jurusan    = $request->input('jurusan');
        $jadwal->kelas      = $request->input('kelas');
        $jadwal->semester   = $request->input('semester');
        $jadwal->hari       = $request->input('hari');
        $jadwal->matkul     = $request->input('matkul');
        $jadwal->jam_mulai  = date('H:i', strtotime($request->input('matkul_1')));
        $jadwal->jam_akhir  = date('H:i', strtotime($request->input('matkul_2')));

        $jadwal->save();

        return redirect()->route('jadwal.view');
    }

    public function getKelas($jur_id)
    {
        $kelas = kelas::where('jur_id', $jur_id)->groupBy('kelas')->pluck('kelas', 'id');

        return response()->json($kelas);
    }

    public function getMatkul($kelas, $semesterKls)
    {
        $semester = Kelas::where('kelas', $kelas)->where('semester', $semesterKls)->first();

        if ($semester) {
            $options = [
                'id' => $semester->id,
                'matkul_1' => $semester->matkul_1,
                'matkul_2' => $semester->matkul_2,
                'matkul_3' => $semester->matkul_3,
                'matkul_4' => $semester->matkul_4,
                'matkul_5' => $semester->matkul_5,
                'matkul_6' => $semester->matkul_6,
                'matkul_7' => $semester->matkul_7,
                'matkul_8' => $semester->matkul_8
            ];

            return response()->json($options);
        }
    }

    public function editJadwal($id)
    {
        $title = "Edit Jadwal";
        // $jadwal = jadwal::join('kelas','kelas.id','=','jadwals.kelas')
        // ->join('jurusan','jurusan.jur_id','=','jadwals.jurusan')
        // ->select('kelas.kelas as n_kelas','jurusan.nama_jurusan as n_jurusan','jadwals.semester as smt','hari','matkul','jam_mulai','jam_akhir','jadwals.kelas as j_kelas','jadwals.jurusan as jur_id','jadwals.kelas as kel_id','jadwals.id as jadwalid')
        // ->where('jadwals.id',$id)->first();
        // $kelas = kelas::whereNotIn('id', [$jadwal->j_kelas])->get();
        // $jurusan = Jurusan::whereNotIn('jur_id', [$jadwal->jur_id])->get();

        $jadwal = Jadwal::find($id);
        $kelas  = Kelas::all();
        $jurusan = Jurusan::all();

        return view('jadwalKuliah.edit', compact('title', 'jadwal', 'kelas', 'jurusan'));
    }

    public function updateJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        $jur = Jurusan::where('jur_id', $request->input('jurusan'))->first();

        $jadwal->kelas = $request->input('kelas');
        $jadwal->jurusan = $request->input('jurusan');
        $jadwal->semester = $request->input('semester');
        $jadwal->hari = $request->input('hari');
        $jadwal->matkul = $request->input('matkul');
        $jadwal->jam_mulai = $request->input('jam_mulai');
        $jadwal->jam_akhir = $request->input('jam_akhir');

        $jadwal->update();

        return redirect()->route('jadwal.view');
    }

    public function deleteJadwal($id)
    {
        Jadwal::find($id)->delete();

        return redirect()->route('jadwal.view');
    }
}
