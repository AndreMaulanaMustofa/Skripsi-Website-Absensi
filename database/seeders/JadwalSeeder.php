<?php

namespace Database\Seeders;

use App\Models\jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            jadwal::create([
                'kelas' => 1,
                'jurusan' => 1,
                'semester' => 6,
                'hari' => 'Senin',
                'matkul' => 'Bahasa Indonesia',
                'jam_mulai' => '07:00',
                'jam_akhir' => '10:00'
            ]);

            jadwal::create([
                'kelas' => 1,
                'jurusan' => 1,
                'semester' => 6,
                'hari' => 'Selasa',
                'matkul' => 'Bahasa Inggris',
                'jam_mulai' => '10:00',
                'jam_akhir' => '12:00'
            ]);

            jadwal::create([
                'kelas' => 1,
                'jurusan' => 1,
                'semester' => 6,
                'hari' => 'Rabu',
                'matkul' => 'Bahasa Jerman',
                'jam_mulai' => '14:00',
                'jam_akhir' => '16:00'
            ]);
            jadwal::create([
                'kelas' => 1,
                'jurusan' => 1,
                'semester' => 4,
                'hari' => 'Senin',
                'matkul' => 'Bahasa Indonesia',
                'jam_mulai' => '07:00',
                'jam_akhir' => '10:00'
            ]);

            jadwal::create([
                'kelas' => 1,
                'jurusan' => 1,
                'semester' => 4,
                'hari' => 'Selasa',
                'matkul' => 'Bahasa Inggris',
                'jam_mulai' => '10:00',
                'jam_akhir' => '12:00'
            ]);

            jadwal::create([
                'kelas' => 1,
                'jurusan' => 1,
                'semester' => 4,
                'hari' => 'Rabu',
                'matkul' => 'Bahasa Jerman',
                'jam_mulai' => '14:00',
                'jam_akhir' => '16:00'
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
