<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecapGuruController extends Controller
{
    public function index()
    {
        return view('guru.recap');
    }
}
