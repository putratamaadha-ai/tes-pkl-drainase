@extends('layouts.app')

@section('content')
    <div class="container py-5 main-wrapper">
        <div class="mb-3">
            <a href="{{ route('kelurahan.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-3 fw-semibold text-decoration-none">← Kembali</a>
        </div>
        <div class="card card-main p-4">
            <h3 class="fw-bold text-dark mb-3">Edit Kelurahan</h3>
            <form action="{{ route('kelurahan.update', $kelurahan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kecamatan_id" class="form-label fw-bold small text-secondary">Pilih Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="form-select rounded-3 @error('kecamatan_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" {{ old('kecamatan_id', $kelurahan->kecamatan_id) == $kec->id ? 'selected' : '' }}>
                                {{ $kec->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('kecamatan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="nama_kelurahan" class="form-label fw-bold small text-secondary">Nama Kelurahan</label>
                    <input type="text" class="form-control rounded-3 @error('nama_kelurahan') is-invalid @enderror" id="nama_kelurahan" name="nama_kelurahan" value="{{ old('nama_kelurahan', $kelurahan->nama_kelurahan) }}" placeholder="Contoh: Simpang Tiga" required>
                    @error('nama_kelurahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('kelurahan.index') }}" class="btn btn-light border px-4 rounded-3 text-decoration-none">Batal</a>
                    <button type="submit" class="btn btn-dark px-4 rounded-3 fw-semibold">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('nama_kelurahan').oninvalid = function(e) {
            e.target.setCustomValidity('Wajib diisi!');
        };
        document.getElementById('nama_kelurahan').oninput = function(e) {
            e.target.setCustomValidity('');
        };

        document.getElementById('kecamatan_id').oninvalid = function(e) {
            e.target.setCustomValidity('Wajib diisi!');
        };
        document.getElementById('kecamatan_id').oninput = function(e) {
            e.target.setCustomValidity('');
        };
    </script>
@endsection