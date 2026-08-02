<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Http\Requests\KecamatanRequest; // Panggil KecamatanRequest yang baru dibuat

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KecamatanRequest $request)
    {
        // Validasi otomatis ditangani oleh KecamatanRequest
        Kecamatan::create($request->validated());

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kecamatan = Kecamatan::with('kelurahan')->findOrFail($id);
        return view('kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KecamatanRequest $request, string $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        
        // Update menggunakan data yang sudah tervalidasi
        $kecamatan->update($request->validated());
        
        return redirect()->route('kecamatan.index')->with('warning', 'Data kecamatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = Kecamatan::with('kelurahan')->findOrFail($id);

        if ($kecamatan->kelurahan()->count() > 0) {
            return redirect()->route('kecamatan.index')->with('danger', 'Kecamatan tidak bisa dihapus karena masih memiliki data kelurahan!');
        }

        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('danger', 'Data kecamatan berhasil dihapus!');
    }
}