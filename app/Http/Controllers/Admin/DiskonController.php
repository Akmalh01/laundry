<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diskon;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diskons = Diskon::with('paketGratis')->get();
        return view('admin.diskon.index', compact('diskons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets = Paket::all();
        return view('admin.diskon.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jumlah_pencucian' => 'required|integer|min:1',
            'id_paket_gratis' => 'required|exists:paket,id',
        ]);

        Diskon::create($validatedData);

        return redirect()->route('admin.diskon.index')->with('success', 'Diskon berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diskon $diskon)
    {
        $pakets = Paket::all();
        return view('admin.diskon.edit', compact('diskon', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diskon $diskon)
    {
        $validatedData = $request->validate([
            'jumlah_pencucian' => 'required|integer|min:1',
            'id_paket_gratis' => 'required|exists:paket,id',
        ]);

        $diskon->update($validatedData);

        return redirect()->route('admin.diskon.index')->with('success', 'Diskon berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diskon $diskon)
    {
        $diskon->delete();
        return redirect()->route('admin.diskon.index')->with('success', 'Diskon berhasil dihapus.');
    }
}
