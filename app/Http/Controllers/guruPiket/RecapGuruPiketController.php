<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use App\Models\Rekap;
use Illuminate\Http\Request;

class RecapGuruPiketController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar bulan dan tahun yang tersedia
        $bulanList = Rekap::select('bulan')->distinct()->pluck('bulan');
        $tahunList = Rekap::select('tahun')->distinct()->pluck('tahun');
    
        // Ambil bulan dan tahun yang dipilih, default ke bulan ini
        $bulan = $request->bulan ?? now()->format('F');
        $tahun = $request->tahun ?? now()->year;
    
        // Ambil data rekap berdasarkan bulan dan tahun yang dipilih
        $rekaps = Rekap::with('guru')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();
    
        return view('guruPiket.recap', compact('rekaps', 'bulanList', 'tahunList'));
    }
    
}
