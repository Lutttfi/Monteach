<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Absen;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskGuruPiketController extends Controller
{
    public function index()
{
    // Ambil task yang ditugaskan ke guru piket yang sedang login
    $tasks = Task::where('guru_id', Auth::id())->get();

    return view('guruPiket.task', compact('tasks'));
}

    public function absen($id)
    {
        $task = Task::findOrFail($id);

        $gurus = Guru::all();
        $siswas = User::where('role_id', 3)->get();

        $task->update(['status' => 'in_progress']);

        return view('guruPiket.absen', compact('task', 'gurus', 'siswas'));
    }

    public function submitAbsen(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'guru_pengajar_id' => 'required|exists:gurus,id',
            'siswa_id' => 'required|exists:users,id',
            'keterangan' => 'required|in:hadir,tidak_hadir',
        ]);

        Absen::create([
            'guru_pengajar_id' => $request->guru_pengajar_id,
            'guru_piket_id' => Auth::id(),
            'siswa_id' => $request->siswa_id,
            'kelas' => $task->kelas,
            'tanggal' => now()->toDateString(),
            'jam' => now()->format('H:i'),
            'status' => 'pending',
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('guruPiket.task')->with('success', 'Absen berhasil dikirim ke siswa untuk konfirmasi!');
    }
}
