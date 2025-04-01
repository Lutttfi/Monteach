<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels'; // Nama tabel di database
    protected $fillable = ['nama_mapel']; // Kolom yang bisa diisi
}
