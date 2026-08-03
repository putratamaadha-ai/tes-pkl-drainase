@extends('layouts.app')

@section('content')
    <div class="container py-5 form-wrapper">
        
        <!-- Header Judul -->
        <div class="mb-4">
            <h2 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Tambah Data Drainase</h2>
            <p class="text-muted mb-0 small">Formulir penambahan infrastruktur data drainase wilayah baru</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 bg-danger-subtle text-danger fw-medium">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card Form -->
        <div class="card card-form p-4 p-md-5">
            <form action="{{ route('drainase.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                    <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="{{ old('nama_lokasi') }}" placeholder="Contoh: Jl. Ahmad Yani" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan_id" class="form-label">Kelurahan / Kecamatan</label>
                        <select name="kelurahan_id" id="kelurahan_id" class="form-select" required>
                            <option value="">-- Pilih Kelurahan --</option>
                            @foreach($kelurahans ?? [] as $kelurahan)
                                <option value="{{ $kelurahan->id }}" {{ old('kelurahan_id') == $kelurahan->id ? 'selected' : '' }}>
                                    {{ $kelurahan->nama_kelurahan }} (Kec. {{ $kelurahan->kecamatan->nama_kecamatan ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tahun_pendataan" class="form-label">Tahun Pendataan</label>
                        <input type="number" class="form-control" id="tahun_pendataan" name="tahun_pendataan" value="{{ old('tahun_pendataan', date('Y')) }}" min="2000" max="2100" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="panjang_meter" class="form-label">Panjang (Meter)</label>
                        <input type="number" step="any" min="0" class="form-control" id="panjang_meter" name="panjang_meter" value="{{ old('panjang_meter') }}" placeholder="Contoh: 100" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lebar_cm" class="form-label">Lebar (Centimeter)</label>
                        <input type="number" step="any" min="0" class="form-control" id="lebar_cm" name="lebar_cm" value="{{ old('lebar_cm') }}" placeholder="Contoh: 60" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_drainase" class="form-label">Jenis Drainase</label>
                        <select name="jenis_drainase" id="jenis_drainase" class="form-select" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Terbuka" {{ old('jenis_drainase') == 'Terbuka' ? 'selected' : '' }}>Terbuka</option>
                            <option value="Tertutup" {{ old('jenis_drainase') == 'Tertutup' ? 'selected' : '' }}>Tertutup</option>
                            <option value="Gorong-gorong" {{ old('jenis_drainase') == 'Gorong-gorong' ? 'selected' : '' }}>Gorong-gorong</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Tersumbat" {{ old('kondisi') == 'Tersumbat' ? 'selected' : '' }}>Tersumbat</option>
                            <option value="Rusak" {{ old('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Catatan tambahan jika ada...">{{ old('keterangan') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('drainase.index') }}" class="btn btn-light-custom text-decoration-none">Batal</a>
                    <button type="submit" class="btn btn-primary-custom text-white">Simpan Data</button>
                </div>
            </form>
        </div>

    </div>

    <script>
        document.querySelectorAll('input[required], select[required]').forEach(function(element) {
            element.oninvalid = function(e) {
                e.target.setCustomValidity('Wajib diisi!');
            };
            element.oninput = function(e) {
                e.target.setCustomValidity('');
            };
        });
    </script>
@endsection