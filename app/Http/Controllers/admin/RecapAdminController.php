<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;

class RecapAdminController extends Controller
{
    // Tampilkan halaman rekap
    public function index(Request $request)
    {
        // Ambil daftar bulan & tahun unik dari DB
        $bulanList = Rekap::select('bulan')->distinct()->pluck('bulan');
        $tahunList = Rekap::select('tahun')->distinct()->pluck('tahun');

        // Ambil filter dari request (default: bulan & tahun sekarang)
        $bulan = trim(ucfirst(strtolower($request->get('bulan', now()->format('F')))));
        $tahun = $request->get('tahun', now()->year);

        // Query data rekap berdasarkan bulan & tahun
        $rekaps = Rekap::with(['guru', 'absenTidakHadir.mapel'])
            ->whereRaw('LOWER(bulan) = ?', [strtolower($bulan)])
            ->where('tahun', $tahun)
            ->withCount([
                'absenTidakHadir as jumlah_tidak_hadir' => function ($query) {
                    $query->where(function ($q) {
                        $q->whereRaw('LOWER(TRIM(keterangan)) LIKE ?', ['%izin%'])
                          ->orWhereRaw('LOWER(TRIM(keterangan)) LIKE ?', ['%sakit%'])
                          ->orWhereRaw('LOWER(TRIM(keterangan)) LIKE ?', ['%tanpa_keterangan%']);
                    });
                }
            ])
            ->paginate(10);


        // Kirim ke view
        return view('admin.recap', compact('rekaps', 'bulanList', 'tahunList', 'bulan', 'tahun'));
    }

    // Export ke Excel
    public function exportRekap(Request $request)
    {
        $bulan = ucfirst(strtolower($request->input('bulan', now()->format('F'))));
        $tahun = $request->input('tahun', now()->year);

        return Excel::download(new RekapExport($bulan, $tahun), 'rekap_' . $bulan . '_' . $tahun . '.xlsx');
    }
}
