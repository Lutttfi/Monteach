<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalPiket;
use Carbon\Carbon;

class DashboardGuruController extends Controller
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
            'Saturday' => 'Sabtu'
        ];

        $hariSekarang = Carbon::now()->format('l'); 
        $hariBesok = Carbon::now()->addDay()->format('l');

        $hariIni = $hariIndo[$hariSekarang]; 
        $besok = $hariIndo[$hariBesok];

        $jadwalHariIni = JadwalPiket::where('hari', $hariIni)->get();
        $jadwalBesok = JadwalPiket::where('hari', $besok)->get();

        return view('guru.dashboard', compact('jadwalHariIni', 'jadwalBesok', 'hariIni', 'besok'));
    }
}
