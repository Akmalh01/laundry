@extends('layouts.admin')

@section('content')
    <h1>Tambah Paket Baru</h1>
    <form action="{{ route('admin.paket.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" name="nama_paket" id="nama_paket" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
            <select name="jenis_layanan" id="jenis_layanan" class="form-select" required>
                <option value="cuci">Cuci</option>
                <option value="setrika">Setrika</option>
                <option value="cuci&setrika">Cuci & Setrika</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="harga_tetap" class="form-label">Harga Tetap (untuk berat maksimum)</label>
            <input type="number" step="0.01" name="harga_tetap" id="harga_tetap" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="maksimum_berat" class="form-label">Maksimum Berat (kg)</label>
            <input type="number" name="maksimum_berat" id="maksimum_berat" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
