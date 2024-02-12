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
                'jur_id' => '1',
                'semester' => 2,
                'nama_DPA' => 'M. Hasyim Ratsanjani, S.Kom., M.Kom.',
                'matkul_1' => 'Bahasa Inggris 1',
                'matkul_2' => 'Pancasila',
                'matkul_3' => 'Praktikum Dasar Pemrograman',
                'matkul_4' => 'Dasar Pemrograman',
                'matkul_5' => 'Aplikasi Komputer Perkantoran',
                'matkul_6' => 'Teknik Dokumentasi',
                'matkul_7' => 'Matematika Diskrit',
                'matkul_8' => 'Konsep Teknologi Informasi'
            ]);
            kelas::create([
                'kelas' => 'TM - 2D',
                'jur_id' => '2',
                'semester' => 3,
                'nama_DPA' => 'Noprianto, S.Kom., M.Eng',
                'matkul_1' => 'Keselamatan dan Kesehatan Kerja',
                'matkul_2' => 'Ilmu Komunikasi dan Organisasi',
                'matkul_3' => 'Kewarganegaraan',
                'matkul_4' => 'Bahasa Inggris 2',
                'matkul_5' => 'Algoritma dan Sruktur Data',
                'matkul_6' => 'Praktikum Algoritma dan Struktur Data',
                'matkul_7' => 'Agama',
                'matkul_8' => 'Praktikum Basis Data'
            ]);
            kelas::create([
                'kelas' => 'SI - 3D',
                'jur_id' => '3',
                'semester' => 5,
                'nama_DPA' => 'Agung Nugroho Pramudhita, S.T., M.T.',
                'matkul_1' => 'Basis Data',
                'matkul_2' => 'Rekayasa Perangkat Lunak',
                'matkul_3' => 'Aljabar Linier',
                'matkul_4' => 'Sistem Operasi',
                'matkul_5' => 'Desain Antarmuka',
                'matkul_6' => 'Desain dan Pemrograman Web',
                'matkul_7' => 'Basis Data Lanjut',
                'matkul_8' => 'Sistem Manajemen Kualitas'
            ]);
            kelas::create([
                'kelas' => 'TL - 4D',
                'jur_id' => '4',
                'semester' => 7,
                'nama_DPA' => 'Annisa Puspa Kirana, S. Kom, M.Kom',
                'matkul_1' => 'Matematika 3',
                'matkul_2' => 'Kecerdasan Buatan',
                'matkul_3' => 'Praktikum Pemrograman Berbasis Objek',
                'matkul_4' => 'Analisis dan Desain Berorentasi Objek',
                'matkul_5' => 'Pemrograman Berbasis Objek',
                'matkul_6' => 'Business Intelligence',
                'matkul_7' => 'Pemrograman Web Lanjut',
                'matkul_8' => 'Manajemen Proyek'
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
