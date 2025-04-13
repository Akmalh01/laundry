<?php

namespace App\Exports;

use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PesananExport implements FromView
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $query = Pesanan::with(['user', 'paket']);

        if ($this->request->has('start_date') && $this->request->has('end_date')) {
            $startDate = $this->request->input('start_date');
            $endDate = $this->request->input('end_date');
            $query->whereBetween('tanggal_pesanan', [$startDate, $endDate]);
        }

        return view('admin.laporan.excel', [
            'transaksi' => $query->get(),
        ]);
    }
}
