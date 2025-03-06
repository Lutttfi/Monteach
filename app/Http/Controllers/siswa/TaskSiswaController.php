<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskSiswaController extends Controller
{
    public function index()
    {
        return view('siswa.task');
    }
}
