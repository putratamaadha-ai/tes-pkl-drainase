@extends('layouts.app')

@section('content')
    <div class="container py-5 main-wrapper">
        <div class="mb-3">
            <a href="{{ route('kecamatan.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-3 fw-semibold">← Kembali</a>
        </div>
        <div class="card card-main p-4">
            <h3 class="fw-bold text-dark mb-3">Tambah Kecamatan Baru</h3>
            <form action="{{ route('kecamatan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kecamatan" class="form-label fw-bold small text-secondary">Nama Kecamatan</label>
                    <input type="text" class="form-control rounded-3 @error('nama_kecamatan') is-invalid @enderror" id="nama_kecamatan" name="nama_kecamatan" placeholder="Contoh: Samarinda Ulu" oninvalid="this.setCustomValidity('Kolom ini harus diisi terlebih dahulu!')" oninput="this.setCustomValidity('')">
                    @error('nama_kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('kecamatan.index') }}" class="btn btn-light border px-4 rounded-3 text-decoration-none">Batal</a>
                    <button type="submit" class="btn btn-dark px-4 rounded-3 fw-semibold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection