<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Http\Requests\KelurahanRequest;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelurahan::with('kecamatan');

        if ($request->filled('search')) {
        $query->where('nama_kelurahan', 'like', '%' . $request->search . '%');
    }

        if ($request->filled('kecamatan_id')) {
        $query->where('kecamatan_id', $request->kecamatan_id);
    }

        $kelurahans = $query->paginate(10);
        $kecamatans = Kecamatan::all();

        return view('kelurahan.index', compact('kelurahans', 'kecamatans'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.create', compact('kecamatan'));
    }

    public function store(KelurahanRequest $request)
    {
        Kelurahan::create($request->validated());
        return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $kelurahan = Kelurahan::with(['kecamatan', 'drainase'])->findOrFail($id);
        return view('kelurahan.show', compact('kelurahan')); // Diubah ke show atau pakai $kelurahan
    }

    public function edit(string $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan'));
    }

    public function update(KelurahanRequest $request, string $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update($request->validated());
        return redirect()->route('kelurahan.index')->with('warning', 'Data kelurahan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);

        if ($kelurahan->drainase()->count() > 0) {
            return redirect()->route('kelurahan.index')->with('danger', 'Gagal menghapus! Data kelurahan ini masih digunakan oleh data drainase.');
        }

        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('danger', 'Data kelurahan berhasil dihapus!');
    }
}