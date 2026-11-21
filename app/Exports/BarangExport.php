<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class BarangExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    WithEvents,
    WithCustomStartCell
{
    public function collection()
    {
        return Barang::select('id', 'code', 'nama', 'stok')
            ->orderBy('id', 'asc')
            ->get();
    }

    public function startCell(): string
    {
        return 'A5';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Barang',
            'Nama Barang',
            'Stok',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            5 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 11,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '233D62'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                $lastRow = $sheet->getHighestRow();
                $totalRow = $lastRow + 1;
                $signatureRow = $totalRow + 4;

                // Judul dan identitas laporan
                $sheet->mergeCells('A1:D1');
                $sheet->mergeCells('A2:D2');
                $sheet->mergeCells('A3:D3');

                $sheet->setCellValue('A1', 'SISTEM INFORMASI INVENTARIS');
                $sheet->setCellValue('A2', 'LAPORAN DATA BARANG');
                $sheet->setCellValue(
                    'A3',
                    'Tanggal Cetak: ' . now()->format('d F Y H:i')
                );

                $sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 18,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '233D62'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $sheet->getStyle('A2:D2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                        'color' => ['rgb' => 'B18A45'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                $sheet->getStyle('A3:D3')->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'color' => ['rgb' => '64748B'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                $sheet->getRowDimension(1)->setRowHeight(32);
                $sheet->getRowDimension(2)->setRowHeight(25);
                $sheet->getRowDimension(5)->setRowHeight(25);

                // Border seluruh tabel
                $sheet->getStyle('A5:D' . $lastRow)
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['rgb' => 'DCE3EC'],
                            ],
                        ],
                    ]);

                // Baris data selang-seling
                for ($row = 6; $row <= $lastRow; $row++) {
                    if ($row % 2 == 0) {
                        $sheet->getStyle("A{$row}:D{$row}")
                            ->getFill()
                            ->setFillType(Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setRGB('F1F5F9');
                    }
                }

                // Perataan kolom
                $sheet->getStyle('A5:B' . $lastRow)
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle('D5:D' . $lastRow)
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Ringkasan
                $sheet->mergeCells("A{$totalRow}:C{$totalRow}");
                $sheet->setCellValue("A{$totalRow}", 'TOTAL KESELURUHAN STOK');

                $sheet->setCellValue(
                    "D{$totalRow}",
                    '=SUM(D6:D' . $lastRow . ')'
                );

                $sheet->getStyle("A{$totalRow}:D{$totalRow}")
                    ->applyFromArray([
                        'font' => ['bold' => true],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'E7EDF5'],
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['rgb' => '233D62'],
                            ],
                        ],
                    ]);

                // Tanda tangan
                $sheet->mergeCells("A{$signatureRow}:B{$signatureRow}");
                $sheet->mergeCells("C{$signatureRow}:D{$signatureRow}");

                $sheet->setCellValue("A{$signatureRow}", 'Mengetahui,');
                $sheet->setCellValue("C{$signatureRow}", 'Petugas Inventaris');

                $sheet->setCellValue("A" . ($signatureRow + 1), 'Kepala Administrasi');

                $sheet->mergeCells(
                    'A' . ($signatureRow + 5) . ':B' . ($signatureRow + 5)
                );

                $sheet->mergeCells(
                    'C' . ($signatureRow + 5) . ':D' . ($signatureRow + 5)
                );

                $sheet->setCellValue(
                    'A' . ($signatureRow + 5),
                    '( ................................ )'
                );

                $sheet->setCellValue(
                    'C' . ($signatureRow + 5),
                    '( ................................ )'
                );

                $sheet->getStyle(
                    "A{$signatureRow}:D" . ($signatureRow + 5)
                )->getAlignment()->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );

                // Lebar kolom
                $sheet->getColumnDimension('A')->setWidth(12);
                $sheet->getColumnDimension('B')->setWidth(23);
                $sheet->getColumnDimension('C')->setWidth(38);
                $sheet->getColumnDimension('D')->setWidth(18);

                // Pengaturan cetak
                $sheet->getPageSetup()
                    ->setOrientation(
                        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE
                    );

                $sheet->getPageSetup()
                    ->setPaperSize(
                        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4
                    );

                $sheet->getPageSetup()->setFitToWidth(1);
                $sheet->getPageSetup()->setFitToHeight(0);

                $sheet->getPageMargins()->setTop(0.5);
                $sheet->getPageMargins()->setBottom(0.5);
                $sheet->getPageMargins()->setLeft(0.3);
                $sheet->getPageMargins()->setRight(0.3);
            },
        ];
    }
}
