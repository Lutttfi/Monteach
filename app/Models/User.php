<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'role_id',  // 'role_id' sebagai foreign key dari tabel roles
        'password', 
    ];

    // Relasi ke model Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Encrypt password automatically
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
