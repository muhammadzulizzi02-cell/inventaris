<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Exports\BarangExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;




class LaporanController extends Controller
{
    // Menampilkan halaman laporan
    public function index()
    {
        $data = Barang::orderBy('id', 'asc')->get();

        return view('admin.laporan.index', compact('data'));
    }

    // Mencetak laporan PDF
    public function cetak_barang()
    {
        $data = Barang::orderBy('id', 'asc')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf_barang', [
            'data' => $data,
            'tanggal' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-barang.pdf');
    }

    // Mengunduh laporan Excel
    

public function export_excel()
{
    return \Maatwebsite\Excel\Facades\Excel::download(
        new \App\Exports\BarangExport(),
        'laporan-barang.xlsx'
    );
}

}
