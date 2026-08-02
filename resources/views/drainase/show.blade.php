@extends('layouts.app')

@section('content')
    <div class="container py-5 main-wrapper">
        <div class="mb-3">
            <a href="{{ route('drainase.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-3 fw-semibold">
                ← Kembali ke Daftar Drainase
            </a>
        </div>

        <div class="card card-main p-4">
            <h3 class="fw-bold text-dark mb-1">Detail Informasi Drainase</h3>
            <p class="text-muted mb-4 small">Sistem Informasi Pengelolaan dan Monitoring Infrastruktur Drainase</p>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="text-muted small d-block">Nama Lokasi</label>
                    <span class="fw-bold fs-5 text-dark">{{ $drainase->nama_lokasi }}</span>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small d-block">Tahun Pendanaan</label>
                    <span class="fw-semibold text-dark">{{ $drainase->tahun_pendanaan }}</span>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="text-muted small d-block">Kecamatan</label>
                    <span class="fw-semibold text-dark">{{ $drainase->kelurahan->kecamatan->nama_kecamatan ?? '-' }}</span>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small d-block">Kelurahan</label>
                    <span class="fw-semibold text-dark">{{ $drainase->kelurahan->nama_kelurahan ?? '-' }}</span>
                </div>
            </div>

            <hr class="text-muted opacity-25 my-4">

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="text-muted small d-block">Ukuran (Panjang & Lebar)</label>
                    <span class="fw-semibold text-dark">{{ $drainase->panjang_meter }} Meter | {{ $drainase->lebar_cm }} Cm</span>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small d-block">Jenis & Kondisi</label>
                    <span class="badge bg-secondary-subtle text-dark border px-2 py-1">{{ $drainase->jenis_drainase }}</span>
                    <span class="badge bg-success-subtle text-success border px-2 py-1 ms-1">{{ $drainase->kondisi }}</span>
                </div>
            </div>

            <div class="mb-4">
                <label class="text-muted small d-block mb-1">Keterangan Tambahan</label>
                <div class="p-3 bg-light rounded-3 text-secondary border">
                    {{ $drainase->keterangan ?? 'Tidak ada keterangan tambahan.' }}
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('drainase.edit', $drainase->id) }}" class="btn btn-warning px-4 fw-semibold text-white">Edit Data</a>
            </div>
        </div>
    </div>
@endsection