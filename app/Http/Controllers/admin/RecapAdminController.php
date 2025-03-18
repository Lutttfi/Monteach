<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;

class RecapAdminController extends Controller
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
            ->paginate(10);
    
        return view('admin.recap', compact('rekaps', 'bulanList', 'tahunList'));
    }

    public function exportRekap()
    {
         // Export file Excel dengan nama "rekap.xlsx"
        return Excel::download(new RekapExport, 'rekap_kehadiran_guru.xlsx');
    }
    
}
