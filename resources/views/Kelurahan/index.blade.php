@extends('layouts.app')

@section('content')
    <div class="container py-4 main-wrapper">
        
        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-3 fw-semibold text-decoration-none">
                ← Kembali ke Beranda
            </a>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
            <div>
                <h2 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Data Kelurahan</h2>
                <p class="text-muted mb-0 small">Kelola daftar wilayah kelurahan beserta kecamatannya</p>
            </div>
            <a href="{{ route('kelurahan.create') }}" class="btn btn-primary-custom shadow-sm text-white text-decoration-none">
                <span class="me-1">+</span> Tambah Kelurahan
            </a>
        </div>

        @if(session('success') || session('warning') || session('danger'))
            @php
                $msg = session('success') ?? session('warning') ?? session('danger');
                $lowerMsg = strtolower($msg);
                
                if(str_contains($lowerMsg, 'hapus') || str_contains($lowerMsg, 'dihapus') || str_contains($lowerMsg, 'gagal') || str_contains($lowerMsg, 'masih')) {
                    $alertClass = 'alert-danger';
                } elseif(str_contains($lowerMsg, 'ubah') || str_contains($lowerMsg, 'perbarui') || str_contains($lowerMsg, 'edit')) {
                    $alertClass = 'alert-warning';
                } else {
                    $alertClass = 'alert-success';
                }
            @endphp
            <div class="alert {{ $alertClass }} alert-dismissible fade show rounded-4 border-0 shadow-sm mb-3" role="alert">
                {{ $msg }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Card Filter & Pencarian -->
        <div class="card border-0 shadow-sm rounded-4 p-3 mb-3">
            <form action="{{ route('kelurahan.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label for="search" class="form-label small fw-bold text-secondary">Cari Kelurahan</label>
                    <input type="text" class="form-control form-control-sm rounded-3" id="search" name="search" value="{{ request('search') }}" placeholder="Masukkan nama kelurahan...">
                </div>
                <div class="col-md-4">
                    <label for="kecamatan_id" class="form-label small fw-bold text-secondary">Filter Kecamatan</label>
                    <select class="form-select form-select-sm rounded-3" id="kecamatan_id" name="kecamatan_id">
                        <option value="">-- Semua Kecamatan --</option>
                        @foreach($kecamatans as $kec)
                            <option value="{{ $kec->id }}" {{ request('kecamatan_id') == $kec->id ? 'selected' : '' }}>
                                {{ $kec->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-dark btn-sm w-100 rounded-3 fw-semibold">Cari</button>
                    <a href="{{ route('kelurahan.index') }}" class="btn btn-outline-secondary btn-sm w-100 rounded-3 fw-semibold">Reset</a>
                </div>
            </form>
        </div>

        <!-- Card Tabel Tanpa Tombol Detail -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark" style="background-color: #2c3e50;">
                            <tr>
                                <th width="8%" class="text-center py-3">NO</th>
                                <th class="text-center py-3">NAMA KELURAHAN</th>
                                <th class="text-center py-3">KECAMATAN</th>
                                <th width="16%" class="text-center py-3">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kelurahans as $index => $item)
                                <tr>
                                    <td class="text-center text-muted fw-medium py-3">{{ $kelurahans->firstItem() + $index }}</td>
                                    <td class="text-center py-3">
                                        <div class="fw-bold text-dark">{{ $item->nama_kelurahan }}</div>
                                    </td>
                                    <td class="text-center py-3">{{ $item->kecamatan->nama_kecamatan ?? '-' }}</td>
                                    <td class="text-center py-3">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="{{ route('kelurahan.edit', $item->id) }}" class="btn btn-light btn-sm px-2.5 py-1.5 text-warning fw-bold border shadow-sm rounded-3 text-decoration-none">Edit</a>
                                            <form action="{{ route('kelurahan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelurahan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm px-2.5 py-1.5 text-danger fw-bold border shadow-sm rounded-3">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Tidak ada data kelurahan yang ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            {{ $kelurahans->withQueryString()->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection