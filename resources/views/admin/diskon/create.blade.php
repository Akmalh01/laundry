@extends('layouts.admin')

@section('content')
    <h1>Tambah Diskon Baru</h1>
    <form action="{{ route('admin.diskon.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="jumlah_pencucian" class="form-label">Jumlah Pencucian</label>
            <input type="number" name="jumlah_pencucian" id="jumlah_pencucian" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_paket_gratis" class="form-label">Paket Gratis</label>
            <select name="id_paket_gratis" id="id_paket_gratis" class="form-select" required>
                @foreach ($pakets as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.diskon.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
