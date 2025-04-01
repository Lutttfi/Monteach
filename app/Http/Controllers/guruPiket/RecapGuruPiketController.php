<?php

namespace App\Http\Controllers\guruPiket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;

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

    // Ambil data rekap dengan data ketidakhadiran yang lengkap
    $rekaps = Rekap::with(['guru', 'absenTidakHadir.mapel'])
    ->where('bulan', $bulan)
    ->where('tahun', $tahun)
    ->withCount([
        'absenTidakHadir as jumlah_tidak_hadir' => function ($query) {
            $query->whereIn('keterangan', ['sakit', 'izin', 'tanpa_keterangan']);
        }
    ])
    ->paginate(10);

    return view('guruPiket.recap', compact('rekaps', 'bulanList', 'tahunList'));
}

    
    public function exportRekap()
    {
         // Export file Excel dengan nama "rekap.xlsx"
        return Excel::download(new RekapExport, 'rekap_kehadiran_guru.xlsx');
    }
    
}
