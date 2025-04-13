<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use App\Models\Laporan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Untuk PDF
use Maatwebsite\Excel\Facades\Excel; // Untuk Excel
use App\Exports\PesananExport; // Export class untuk Excel

class LaporanController extends Controller
{
    // Dashboard statistik
    public function index()
    {
        $totalTransaksi = Pesanan::count();
        $totalPendapatan = Pesanan::sum('total_harga');
        $pesananAktif = Pesanan::where('status', 'dalam proses')->count();
        $pesananSelesai = Pesanan::where('status', 'selesai')->count();

        return view('admin.laporan.index', compact(
            'totalTransaksi',
            'totalPendapatan',
            'pesananAktif',
            'pesananSelesai'
        ));
    }

    // Menampilkan semua transaksi
    public function transaksi(Request $request)
    {
        $query = Pesanan::with(['user', 'paket']);

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('tanggal_pesanan', [$startDate, $endDate]);
        }

        $transaksi = $query->get();

        return view('admin.laporan.transaksi', compact('transaksi'));
    }

    // Mengunduh laporan dalam format PDF
    public function downloadPdf(Request $request)
    {
        $query = Pesanan::with(['user', 'paket']);

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('tanggal_pesanan', [$startDate, $endDate]);
        }

        $transaksi = $query->get();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('transaksi'));
        return $pdf->download('laporan-transaksi.pdf');
    }

    // Mengunduh laporan dalam format Excel
    public function downloadExcel(Request $request)
    {
        return Excel::download(new PesananExport($request), 'laporan-transaksi.xlsx');
    }
}
