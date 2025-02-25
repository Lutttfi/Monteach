<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPiket extends Model
{
    use HasFactory;

    protected $table = 'guru_piket';

    protected $fillable = ['guru_id']; 

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
