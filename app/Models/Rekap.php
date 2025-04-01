<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'jumlah_hadir',
        'jumlah_tidak_hadir',
        'tidak_diabsen',
        'bulan',
        'tahun',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    
    public function absenTidakHadir()
    {
        return $this->hasMany(Absen::class, 'guru_pengajar_id', 'guru_id')
            ->whereIn('keterangan', ['sakit', 'izin', 'tanpa_keterangan']);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
