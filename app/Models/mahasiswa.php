<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class mahasiswa extends Model
{
    use Notifiable;

    protected $fillable = [
        'NIM',
        'namaLengkap',
        'Kelas',
        'jenisKelamin',
        'NoTelp',
        'tahunMasuk'
    ];
}
