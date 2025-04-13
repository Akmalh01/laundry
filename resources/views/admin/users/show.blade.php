@extends('layouts.admin')

@section('content')
    <h1>Detail Pengguna</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        </div>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
