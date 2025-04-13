@extends('layouts.admin')

@section('content')
    <h1>Daftar Paket</h1>
    <a href="{{ route('admin.paket.create') }}" class="btn btn-primary mb-3">Tambah Paket</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Jenis Layanan</th>
                <th>Harga Tetap</th>
                <th>Maksimum Berat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakets as $paket)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>{{ $paket->jenis_layanan }}</td>
                    <td>Rp {{ number_format($paket->harga_tetap, 2) }}</td>
                    <td>{{ $paket->maksimum_berat }} kg</td>
                    <td>
                        <a href="{{ route('admin.paket.edit', $paket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
