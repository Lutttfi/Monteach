<?php

namespace App\Exports;

use App\Models\Rekap;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class RekapExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Rekap::with('guru')
            ->select('guru_id', 'jumlah_hadir', 'jumlah_tidak_hadir') // hanya mengambil kolom yang diperlukan
            ->get()
            ->map(function ($rekap) {
                return [
                    'nama_guru' => $rekap->guru->nama, // menampilkan nama guru
                    'jumlah_hadir' => $rekap->jumlah_hadir,
                    'jumlah_tidak_hadir' => $rekap->jumlah_tidak_hadir,
                ];
            });
    }

    /**
     * Heading for the Excel file
     */
    public function headings(): array
    {
        return [
            'Nama Guru',
            'Jumlah Hadir',
            'Jumlah Tidak Hadir',
        ];
    }

    /**
     * Style settings for the Excel file
     */
    public function styles(Worksheet $sheet)
    {
        // Set header style and column widths
        $sheet->getStyle('A1:C1')->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(20);

        return [];
    }
}
