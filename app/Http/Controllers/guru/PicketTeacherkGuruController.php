<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuruPiket;

class PicketTeacherkGuruController extends Controller
{
    public function index()
    {
        $guruPiket = GuruPiket::all();
        return view('guru.picketTeacher', compact('guruPiket'));
    }
}
