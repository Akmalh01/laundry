@extends('layouts.admin')

@section('content')
    <h1>Daftar Transaksi</h1>
    <form action="{{ route('admin.laporan.transaksi') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-5">
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-5">
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Paket</th>
                <th>Berat</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->paket->nama_paket }}</td>
                    <td>{{ $item->berat }} kg</td>
                    <td>Rp {{ number_format($item->total_harga, 2) }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>{{ $item->tanggal_pesanan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
