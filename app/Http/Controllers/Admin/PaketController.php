<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaketController extends Controller
{
    // Menampilkan semua data paket
    public function index()
    {
        $pakets = Paket::all(); // Mengambil semua data paket
        return view('admin.paket.index', compact('pakets')); // Perhatikan nama variabel 'pakets'
    }

    // Menampilkan form tambah paket
    public function create()
    {
        return view('admin.paket.create');
    }

    // Menyimpan data paket baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'jenis_layanan' => 'required|in:cuci,setrika,cuci&setrika',
            'harga_tetap' => 'required|numeric|min:0',
            'maksimum_berat' => 'required|integer|min:1',
        ]);

        Paket::create($validatedData);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    // Menampilkan detail paket
    public function show(Paket $paket)
    {
        return view('admin.paket.show', compact('paket'));
    }

    // Menampilkan form edit paket
    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    // Mengupdate data paket
    public function update(Request $request, Paket $paket)
    {
        $validatedData = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'jenis_layanan' => 'required|in:cuci,setrika,cuci&setrika',
            'harga_tetap' => 'required|numeric|min:0',
            'maksimum_berat' => 'required|integer|min:1',
        ]);

        $paket->update($validatedData);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    // Menghapus data paket
    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
