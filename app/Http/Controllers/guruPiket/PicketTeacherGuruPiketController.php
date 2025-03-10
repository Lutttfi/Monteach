<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PicketTeacherGuruPiketController extends Controller
{
    public function index()
    {
        $guruPiket = User::whereHas('role', function ($query) {
            $query->where('name', 'guruPiket');
        })->paginate(10);   
        return view('guruPiket.picketTeacher', compact('guruPiket'));
    }
}
