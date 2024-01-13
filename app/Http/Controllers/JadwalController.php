<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\kelas;
use App\Models\Jurusan;
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
        $jurusan = Jurusan::all();

        return view('jadwalKuliah.create', compact('title', 'kelas', 'jurusan'));
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


}
