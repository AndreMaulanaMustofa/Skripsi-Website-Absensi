<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class kelas extends Model
{
    use Notifiable;

    protected $fillable = [
        'jumlah_mahasiswa',
        'kelas',
        'jurusan'
    ];
}
