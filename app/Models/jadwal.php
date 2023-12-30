<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class jadwal extends Model
{
    use Notifiable;

    protected $fillable = [
        'jurusan',
        'kelas',
        'semester',
        'matkul',
        'hari',
        'jam_mulai',
        'jam_akhir'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}