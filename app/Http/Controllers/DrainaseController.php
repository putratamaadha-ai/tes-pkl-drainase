<?php

namespace App\Http\Controllers;

use App\Models\Drainase;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Http\Requests\DrainaseRequest; // Panggil FormRequest yang baru dibuat
use Illuminate\Http\Request;

class DrainaseController extends Controller
{
    // Menampilkan daftar data drainase
    public function index(Request $request)
    {
        $kecamatans = Kecamatan::all();
        
        $query = Drainase::with('kelurahan.kecamatan');

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lokasi', 'like', '%' . $request->search . '%');
        }

        if ($request->has('kecamatan_id') && $request->kecamatan_id != '') {
            $query->whereHas('kelurahan', function($q) use ($request) {
                $q->where('kecamatan_id', $request->kecamatan_id);
            });
        }

        $drainases = $query->paginate(10)->withQueryString();

        return view('drainase.index', compact('drainases', 'kecamatans'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('drainase.create', compact('kelurahans'));
    }

    // Menyimpan data baru ke database menggunakan DrainaseRequest
    public function store(DrainaseRequest $request)
    {
        Drainase::create([
            'nama_lokasi' => $request->nama_lokasi,
            'kelurahan_id' => $request->kelurahan_id,
            'panjang_meter' => $request->panjang_meter,
            'lebar_cm' => $request->lebar_cm,
            'jenis_drainase' => $request->jenis_drainase,
            'kondisi' => $request->kondisi ?? $request->Kondisi,
            'tahun_pendataan' => $request->tahun_pendataan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('drainase.index')->with('success', 'Data drainase berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $drainase = Drainase::findOrFail($id);
        $kelurahans = Kelurahan::with('kecamatan')->get(); 
        return view('drainase.edit', compact('drainase', 'kelurahans'));
    }

    // Memperbarui data menggunakan DrainaseRequest juga
    public function update(DrainaseRequest $request, $id)
    {
        $drainase = Drainase::findOrFail($id);
        
        $drainase->update([
            'nama_lokasi' => $request->nama_lokasi,
            'kelurahan_id' => $request->kelurahan_id,
            'panjang_meter' => $request->panjang_meter,
            'lebar_cm' => $request->lebar_cm,
            'jenis_drainase' => $request->jenis_drainase,
            'kondisi' => $request->kondisi ?? $request->Kondisi,
            'tahun_pendataan' => $request->tahun_pendataan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('drainase.index')->with('success', 'Data drainase berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $drainase = Drainase::findOrFail($id);
        $drainase->delete();
        return redirect()->route('drainase.index')->with('success', 'Data drainase berhasil dihapus!');
    }

    public function show(string $id)
    {
        $drainase = Drainase::with(['kelurahan.kecamatan'])->findOrFail($id);
        return view('drainase.show', compact('drainase'));
    }
}