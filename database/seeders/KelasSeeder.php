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
                'kelas' => 'TI - 1D',
                'jurusan' => 'Teknologi Informasi',
                'sks' => 20,
                'nama_DPA' => 'M. Hasyim Ratsanjani, S.Kom., M.Kom.',
                'matkul_1' => 'Mobile Development',
                'matkul_2' => 'Mobile Development',
                'matkul_3' => 'Mobile Development',
                'matkul_4' => 'Mobile Development',
                'matkul_5' => 'Mobile Development',
                'matkul_6' => 'Mobile Development',
                'matkul_7' => 'Mobile Development',
                'matkul_8' => 'Mobile Development'
            ]);
            kelas::create([
                'kelas' => 'TI - 2D',
                'jurusan' => 'Teknologi Informasi',
                'sks' => 20,
                'nama_DPA' => 'Noprianto, S.Kom., M.Eng',
                'matkul_1' => 'Mobile Development',
                'matkul_2' => 'Mobile Development',
                'matkul_3' => 'Mobile Development',
                'matkul_4' => 'Mobile Development',
                'matkul_5' => 'Mobile Development',
                'matkul_6' => 'Mobile Development',
                'matkul_7' => 'Mobile Development',
                'matkul_8' => 'Mobile Development'
            ]);
            kelas::create([
                'kelas' => 'TI - 3D',
                'jurusan' => 'Teknologi Informasi',
                'sks' => 20,
                'nama_DPA' => 'Agung Nugroho Pramudhita, S.T., M.T.',
                'matkul_1' => 'Mobile Development',
                'matkul_2' => 'Mobile Development',
                'matkul_3' => 'Mobile Development',
                'matkul_4' => 'Mobile Development',
                'matkul_5' => 'Mobile Development',
                'matkul_6' => 'Mobile Development',
                'matkul_7' => 'Mobile Development',
                'matkul_8' => 'Mobile Development'
            ]);
            kelas::create([
                'kelas' => 'TI - 4D',
                'jurusan' => 'Teknologi Informasi',
                'sks' => 20,
                'nama_DPA' => 'Annisa Puspa Kirana, S. Kom, M.Kom',
                'matkul_1' => 'Mobile Development',
                'matkul_2' => 'Mobile Development',
                'matkul_3' => 'Mobile Development',
                'matkul_4' => 'Mobile Development',
                'matkul_5' => 'Mobile Development',
                'matkul_6' => 'Mobile Development',
                'matkul_7' => 'Mobile Development',
                'matkul_8' => 'Mobile Development'
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
