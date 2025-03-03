<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class TeacherGuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.teacher', compact('guru'));
    }
}
