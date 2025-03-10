<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Rekap;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KonfirmasiSiswaController extends Controller
{
    public function task()
    {
        // Ambil data absensi untuk siswa yang sedang login
        $absens = Absen::where('siswa_id', Auth::id())->where('status', 'pending')->get();
    
        // Kirim data ke view
        return view('siswa.task', compact('absens'));
    }
    public function konfirmasi(Request $request, $id)
    {
        $absen = Absen::findOrFail($id);
        $absen->update(['status' => 'confirmed']);

        $bulan = now()->format('F');
        $tahun = now()->year;

        $rekap = Rekap::where('guru_id', $absen->guru_pengajar_id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();

        if ($rekap) {
            if ($absen->keterangan === 'hadir') {
                $rekap->increment('jumlah_hadir');
            } else {
                $rekap->increment('jumlah_tidak_hadir');
            }
        } else {
            Rekap::create([
                'guru_id' => $absen->guru_pengajar_id,
                'jumlah_hadir' => $absen->keterangan === 'hadir' ? 1 : 0,
                'jumlah_tidak_hadir' => $absen->keterangan === 'tidak_hadir' ? 1 : 0,
                'tidak_diabsen' => 0,
                'bulan' => $bulan,
                'tahun' => $tahun,
            ]);
        }

        // $task = Task::findOrFail($id);
        Task::where('guru_id', $absen->guru_piket_id)
            ->where('kelas', $absen->kelas)
            ->where('tanggal_tugas', $absen->tanggal)
            ->update(['status' => 'completed']);
            // $task->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Absen berhasil dikonfirmasi!');
    }
}
