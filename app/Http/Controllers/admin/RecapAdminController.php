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

    return view('admin.recap', compact('rekaps', 'bulanList', 'tahunList'));
}

    
public function exportRekap(Request $request)
{
    $bulan = $request->input('bulan', now()->format('F'));
    $tahun = $request->input('tahun', now()->year);

    return Excel::download(new RekapExport($bulan, $tahun), 'rekap_kehadiran_guru.xlsx');
}

    
}
