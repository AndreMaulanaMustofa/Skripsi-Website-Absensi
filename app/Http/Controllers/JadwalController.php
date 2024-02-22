<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function view(){
        $title = "Jadwal Kuliah";
        $jadwal = jadwal::join('kelas','kelas.id','=','jadwals.kelas')
        ->join('jurusan','jurusan.jur_id','=','jadwals.jurusan')
        ->select('kelas.kelas as n_kelas','jurusan.nama_jurusan as n_jurusan','jadwals.semester as smt','hari','matkul','jam_mulai','jam_akhir','jadwals.kelas as j_kelas','jadwals.jurusan as jur_id')
        ->groupBy('jadwals.jurusan')->get();
        return view('jadwalKuliah.index', compact('title', 'jadwal'));
    }

    public function create(Request $request){
        $title = "Buat Jadwal";
        $kelas = kelas::all();
        $jurusan = Jurusan::all();

        return view('jadwalKuliah.create', compact('title', 'kelas', 'jurusan'));
    }

    public function storeJadwal(Request $request){
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

    public function getClass($jur_id){
        $jurus = kelas::where('jur_id', $jur_id)->first();

        if($jurus){
            return view('jadwalKuliah.getData.kelas', compact('jurus'));
        }
    }

    public function getKelass($jur_id)
    {
        // Ambil data dari database berdasarkan $id
        $options = kelas::where('jur_id', $jur_id)->pluck('kelas', 'id');

        return response()->json($options);
    }

    public function getMatkul($id)
    {
        // Ambil data dari database berdasarkan $id
        $kelas = Kelas::find($id);

        // Pastikan $kelas tidak null sebelum melanjutkan
        if ($kelas) {
            // Format data ke dalam array
            $options = [
                'id' => $kelas->id,
                'matkul_1' => $kelas->matkul_1,
                'matkul_2' => $kelas->matkul_2,
                'matkul_3' => $kelas->matkul_3,
                'matkul_4' => $kelas->matkul_4,
                'matkul_5' => $kelas->matkul_5,
                'matkul_6' => $kelas->matkul_6,
                'matkul_7' => $kelas->matkul_7,
                'matkul_8' => $kelas->matkul_8,
                // Tambahkan kolom matkul lainnya sesuai kebutuhan
            ];

            return response()->json($options);
        } else {
            // Handle jika tidak menemukan kelas dengan id yang diberikan
            return response()->json(['error' => 'Kelas tidak ditemukan.'], 404);
        }
    }

    public function editJadwal($id){
        $title = "Edit Jadwal";
        $jadwal = jadwal::join('kelas','kelas.id','=','jadwals.kelas')
        ->join('jurusan','jurusan.jur_id','=','jadwals.jurusan')
        ->select('kelas.kelas as n_kelas','jurusan.nama_jurusan as n_jurusan','jadwals.semester as smt','hari','matkul','jam_mulai','jam_akhir','jadwals.kelas as j_kelas','jadwals.jurusan as jur_id','jadwals.kelas as kel_id')
        ->where('jadwals.id',$id)->first();

        return view('jadwalKuliah.edit', compact('title', 'jadwal'));
    }

    public function updateJadwal(Request $request, $id){
        $jadwal = Jadwal::find($id);

        return redirect()->route('jadwal.view');
    }

    public function deleteJadwal($id){
        Jadwal::find($id)->delete();

        return redirect()->route('jadwal.view');
    }
}
