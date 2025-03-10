<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap;


class RecapGuruController extends Controller
{
    public function index()
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
            ->paginate(10);

        return view('guru.recap', compact('rekaps', 'bulanList', 'tahunList'));
    }
}
