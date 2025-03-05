<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskGuruController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return view('guru.task', compact('task'));
    }
}
