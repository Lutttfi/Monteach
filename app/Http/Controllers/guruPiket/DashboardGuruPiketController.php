<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class DashboardGuruPiketController extends Controller
{
    public function index()
    {
        $hariIndo = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        // Mengambil tanggal sekarang dan besok
        $tanggalSekarang = Carbon::now()->toDateString(); // Format: YYYY-MM-DD
        $tanggalBesok = Carbon::tomorrow()->toDateString(); // Format: YYYY-MM-DD

        // Mengambil nama hari dalam bahasa Indonesia
        $hariSekarang = Carbon::now()->format('l');
        $hariBesok = Carbon::tomorrow()->format('l');
        $hariIni = $hariIndo[$hariSekarang];
        $besok = $hariIndo[$hariBesok];

        // Mengambil jadwal piket berdasarkan tanggal sekarang dan besok dari tabel 'tasks'
        $jadwalHariIni = Task::whereDate('tanggal_tugas', $tanggalSekarang)->get();
        $jadwalBesok = Task::whereDate('tanggal_tugas', $tanggalBesok)->get();

        return view('guruPiket.dashboard', compact('jadwalHariIni', 'jadwalBesok', 'hariIni', 'besok'));
    }
}
