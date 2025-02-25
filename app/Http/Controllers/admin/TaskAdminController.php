<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\GuruPiket;

class TaskAdminController extends Controller
{
    public function index()
    {
        $guru = GuruPiket::all();
        return view('admin.task.index', compact('guru'));
    }

    public function create()
    {
        $gurus = GuruPiket::with('guru')->get();
        return view('admin.task.create', compact('gurus')); // Mengirim variabel $guru ke view
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi data input
        $request->validate([
            'nama_guru' => 'required|', // Mengambil ID guru
            'kelas' => 'required|string',
            'status' => 'required|string',
        ]);

        // Simpan tugas ke database
        Task::create([
            'nama_guru' => $request->nama_guru, // Simpan ID guru dari select option
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit(Task $task)
    {
        $guru = GuruPiket::all(); // Ambil semua data guru
        return view('admin.task.edit', compact('task', 'guru'));
    }

    public function update(Request $request, Task $task)
    {
        // Validasi data input
        $request->validate([
            'guru_id' => 'required|exists:guru_piket,id', // Mengambil ID guru
            'kelas' => 'required|string',
            'status' => 'required|string',
        ]);

        // Update tugas di database
        $task->update([
            'guru_id' => $request->guru_id, // Update ID guru dari select option
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
