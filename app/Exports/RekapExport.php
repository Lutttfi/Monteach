<?php

namespace App\Exports;

use App\Models\Rekap;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RekapExport implements FromCollection, WithHeadings, WithStyles
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        return Rekap::with([
            'guru',
            'absenTidakHadir' => fn($query) => $query->with('mapel')
        ])
            ->where('bulan', $this->bulan)
            ->where('tahun', $this->tahun)
            ->get()
            ->map(function ($rekap) {
                $detail = $rekap->absenTidakHadir->map(function ($absen) {
                    $mapel = $absen->mapel->nama_mapel ?? '-';
                    return $absen->tanggal . ' - ' . $mapel . ' - ' . $absen->keterangan;
                })->implode("\n");

                return [
                    'nama_guru' => $rekap->guru->nama,
                    'jumlah_hadir' => $rekap->jumlah_hadir,
                    'jumlah_tidak_hadir' => $rekap->absenTidakHadir->count(),
                    'detail_ketidakhadiran' => $detail,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Guru',
            'Jumlah Hadir',
            'Jumlah Tidak Hadir',
            'Keterangan Tidak Hadir',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header bold + background warna
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFD9D9D9'],
            ],
        ]);

        // Auto wrap text untuk kolom Detail Ketidakhadiran
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);

        // Auto width semua kolom
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [];
    }
}
