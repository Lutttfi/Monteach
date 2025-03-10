<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskAdminController extends Controller
{
    public function index()
    {
        $tasks = Task::with('guru')->paginate(5); // Ambil semua task dengan data guru
        return view('admin.task.index', compact('tasks'));
    }

    public function create()
    {
        $guruPiketRole = DB::table('roles')->where('name', 'guruPiket')->value('id');
        $gurus = User::where('role_id', $guruPiketRole)->get();
        return view('admin.task.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:users,id', // Pastikan guru_id valid
            'kelas' => 'required|string',
            'tanggal_tugas' => 'required|date',
        ]);

        Task::create([
            'guru_id' => $request->guru_id,
            'kelas' => $request->kelas,
            'status' => 'pending',
            'tanggal_tugas' => $request->tanggal_tugas,
        ]);

        return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        $guruPiketRole = DB::table('roles')->where('name', 'guruPiket')->value('id');
        $gurus = User::where('role_id', $guruPiketRole)->get();
        return view('admin.task.edit', compact('task', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required|exists:users,id',
            'kelas' => 'required|string',
            'tanggal_tugas' => 'required|date',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'guru_id' => $request->guru_id,
            'kelas' => $request->kelas,
            'status' => 'pending',
            'tanggal_tugas' => $request->tanggal_tugas,
        ]);

        return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
