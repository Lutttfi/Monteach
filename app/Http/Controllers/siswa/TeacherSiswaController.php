<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class TeacherSiswaController extends Controller
{
    public function index()
    {
        $teachers = Guru::all();
        return view('siswa.teacher', compact('teachers'));
    }
}
