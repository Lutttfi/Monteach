<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class TeacherGuruPiketController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guruPiket.teacher', compact('guru'));
    }
}
