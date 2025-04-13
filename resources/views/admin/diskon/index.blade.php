@extends('layouts.admin')

@section('content')
    <h1>Daftar Diskon</h1>
    <a href="{{ route('admin.diskon.create') }}" class="btn btn-primary mb-3">Tambah Diskon</a>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jumlah Pencucian</th>
                <th>Paket Gratis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diskons as $diskon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $diskon->jumlah_pencucian }} kali</td>
                    <td>{{ $diskon->paketGratis ? $diskon->paketGratis->nama_paket : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.diskon.edit', $diskon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.diskon.destroy', $diskon->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus diskon ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
