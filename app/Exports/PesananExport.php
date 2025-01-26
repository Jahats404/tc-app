<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PesananExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Pesanan::all();
    }

    public function headings(): array
    {
        return [
            'NO',
            'TANGGAL',
            'NEGARA',
            'KOTA',
            'UNIVERSITAS / VENUE',
            'NAMA',
            'WAKTU',
            'PAKET',
            'FOTOGRAFER',
            'FAKULTAS',
            'LOKASI FOTO',
            'UPLOAD IG',
            'KETERANGAN',
            'STATUS FOTO',
            'HARGA',
            'DP',
            'KEKURANGAN',
            'PELUNASAN',
            'TOTAL',
            'FREELANCE',
            'NOMOR WA',
        ];
    }

    public function map($pesanan): array
    {
        static $no = 1;

        return [
            $no++,
            $pesanan->booking->tanggal,
            $pesanan->booking->negara,
            $pesanan->booking->kota,
            $pesanan->booking->universitas,
            $pesanan->booking->nama,
            $pesanan->booking->jam. '-' . $pesanan->booking->jam_selesai,
            $pesanan->booking->harga_paket->paket->kategori_paket->nama_kategori . ' ' . $pesanan->booking->harga_paket->paket->nama_paket,
            $pesanan->fotografer->nama?? '-',
            $pesanan->booking->fakultas,
            $pesanan->booking->lokasi_foto,
            $pesanan->booking->post_foto,
            $pesanan->keterangan,
            $pesanan->foto->status_foto,
            number_format($pesanan->harga, 0, ',', '.'),
            number_format($pesanan->dp, 0, ',', '.'),
            number_format($pesanan->kekurangan, 0, ',', '.'),
            number_format($pesanan->pelunasan, 0, ',', '.'),
            number_format($pesanan->total, 0, ',', '.'),
            number_format($pesanan->freelance, 0, ',', '.'),
            $pesanan->booking->no_wa,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:U1')->applyFromArray([
            'font' => [
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['argb' => 'FF0070C0'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        foreach (range('A', 'U') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $sheet->getStyle('A1:U' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);
    }
}
