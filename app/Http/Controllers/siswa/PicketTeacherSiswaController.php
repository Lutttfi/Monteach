<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PicketTeacherSiswaController extends Controller
{
    public function index()
    {
        $guruPiket = User::whereHas('role', function ($query) {
            $query->where('name', 'guruPiket');
        })->get();   
        return view('siswa.picketTeacher', compact('guruPiket'));
    }
}
