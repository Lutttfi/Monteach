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
        $task = Task::all();
        return view('admin.task.index', compact('task'));
    }

    public function create()
    {
        $gurus = GuruPiket::with('guru')->get();
        return view('admin.task.create', compact('gurus')); // Mengirim variabel $guru ke view
    }

    public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'nama_guru' => 'required|string',
        'kelas' => 'required|string',
        'tanggal_tugas' => 'required|date',
    ]);

    // Simpan data ke dalam database
    Task::create([
        'nama_guru' => $request->nama_guru,
        'kelas' => $request->kelas,
        'status' => 'pending',
        'tanggal_tugas' => $request->tanggal_tugas,
    ]);

    return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil ditambahkan!');
}

public function edit($id)
{
    $task = Task::findOrFail($id); // Cari task berdasarkan id
    $gurus = GuruPiket::with('guru')->get(); // Mendapatkan data guru
    return view('admin.task.edit', compact('task', 'gurus'));
}

public function update(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'nama_guru' => 'required|string',
        'kelas' => 'required|string',
        'tanggal_tugas' => 'required|date',
    ]);

    // Cari task berdasarkan id
    $task = Task::findOrFail($id);

    // Update data task
    $task->update([
        'nama_guru' => $request->nama_guru,
        'kelas' => $request->kelas,
        'status' => 'pending',
        'tanggal_tugas' => $request->tanggal_tugas,
    ]);

    return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil diupdate!');
}


public function destroy($id)
{
    // Cari task berdasarkan id dan hapus
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect()->route('admin.task.index')->with('success', 'Tugas berhasil dihapus!');
}


}
