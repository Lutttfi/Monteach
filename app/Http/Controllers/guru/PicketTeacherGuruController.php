<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PicketTeacherGuruController extends Controller
{
    public function index()
    {
        $guruPiket = User::whereHas('role', function ($query) {
            $query->where('name', 'guruPiket');
        })->paginate(5);         
        return view('guru.picketTeacher', compact('guruPiket'));
    }
}
