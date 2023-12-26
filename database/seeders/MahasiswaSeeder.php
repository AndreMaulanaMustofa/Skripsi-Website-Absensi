<?php

namespace Database\Seeders;

use App\Models\mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            DB::beginTransaction();

            mahasiswa::create([
                'NIM' => 2041720211,
                'namaLengkap' => 'Andre Maulana Mustofa',
                'Kelas' => 'TI - 3D',
                'NoTelp' => 6285233899868,
                'jenisKelamin' => 'Laki-Laki',
                'tahunMasuk' => 2020,
                'email' => 'andremm73@gmail.com',
                'nama_orangTua' => 'Henry Mustofa Yudhi Annorsa',
                'NoTelp_Ortu' => 6285233953999
            ]);
            mahasiswa::create([
                'NIM' => 2041720211,
                'namaLengkap' => 'Rexa Christiani Yuli',
                'Kelas' => 'TI - 3D',
                'NoTelp' => 628587955645,
                'jenisKelamin' => 'Perempuan',
                'tahunMasuk' => 2020,
                'email' => 'Rexa1122@gmail.com',
                'nama_orangTua' => 'Aury Widya Sri',
                'NoTelp_Ortu' => 6285233655694
            ]);
            DB::commit();
        }catch (\Throwable $th){
            DB::rollback();
            throw $th;
        }
    }
}
