<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_pengajar_id',
        'guru_piket_id',
        'siswa_id',
        'kelas',
        'tanggal',
        'jam',
        'status',
        'keterangan',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_pengajar_id');
    }

    public function guruPiket()
    {
        return $this->belongsTo(User::class, 'guru_piket_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
