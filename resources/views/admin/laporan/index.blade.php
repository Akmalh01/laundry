@extends('layouts.admin')

@section('content')
    <h1>Dashboard Laporan</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Transaksi</h5>
                    <p>{{ $totalTransaksi }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Total Pendapatan</h5>
                    <p>Rp {{ number_format($totalPendapatan, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Pesanan Aktif</h5>
                    <p>{{ $pesananAktif }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Pesanan Selesai</h5>
                    <p>{{ $pesananSelesai }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
