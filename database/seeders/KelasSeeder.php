<?php

namespace Database\Seeders;

use App\Models\kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            kelas::create([
                'jumlah_mahasiswa' => 25,
                'kelas' => 'TI - 1D',
                'jurusan' => 'Teknologi Informasi',
            ]);
            kelas::create([
                'jumlah_mahasiswa' => 27,
                'kelas' => 'TI - 2D',
                'jurusan' => 'Teknologi Informasi',
            ]);
            kelas::create([
                'jumlah_mahasiswa' => 20,
                'kelas' => 'TI - 3D',
                'jurusan' => 'Teknologi Informasi',
            ]);
            kelas::create([
                'jumlah_mahasiswa' => 35,
                'kelas' => 'TI - 4D',
                'jurusan' => 'Teknologi Informasi',
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
