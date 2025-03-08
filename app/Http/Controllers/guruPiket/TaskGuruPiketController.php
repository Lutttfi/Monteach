<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskGuruPiketController extends Controller
{
    public function index()
    {
        // Ambil task berdasarkan guru yang sedang login
        $tasks = Task::where('guru_id', Auth::id())->get();
        return view('guruPiket.task', compact('tasks'));
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::where('guru_id', Auth::id())->findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task->update(['status' => $request->status]);

        return redirect()->route('guruPiket.task')->with('success', 'Status tugas berhasil diperbarui!');
    }
}
