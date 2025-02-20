<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPiket extends Model
{
    use HasFactory;

    protected $table = 'guru_piket'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'nama',         // Nama guru piket
        'hari_piket'    // Hari piket
    ];
}
