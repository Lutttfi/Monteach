<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = ['nama_guru', 'kelas', 'status', 'tanggal_tugas'];

    // Jika relasi dengan User benar-benar diperlukan, pertahankan ini
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
