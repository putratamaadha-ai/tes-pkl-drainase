@extends('layouts.app')

@section('content')
    <div class="container py-4 main-wrapper" style="max-width: 900px;">
        
        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-3 fw-semibold text-decoration-none">
                ← Kembali ke Beranda
            </a>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
            <div>
                <h2 class="fw-bold text-dark mb-1">Data Kecamatan</h2>
                <p class="text-muted mb-0 small">Kelola daftar wilayah kecamatan</p>
            </div>
            <a href="{{ route('kecamatan.create') }}" class="btn btn-primary-custom shadow-sm text-white text-decoration-none">
                <span class="me-1">+</span> Tambah Kecamatan
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

        <!-- Card Tabel Kecamatan Lebih Ramping & Compact -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 text-center">
                        <thead class="table-dark" style="background-color: #2c3e50;">
                            <tr>
                                <th width="15%" class="py-2">NO</th>
                                <th class="text-start py-2">NAMA KECAMATAN</th>
                                <th width="25%" class="py-2">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kecamatan as $index => $item)
                                <tr>
                                    <td class="text-muted fw-medium py-2">{{ $index + 1 }}</td>
                                    <td class="fw-bold text-start text-dark py-2">{{ $item->nama_kecamatan }}</td>
                                    <td class="py-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="{{ route('kecamatan.edit', $item->id) }}" class="btn btn-light btn-sm px-2.5 py-1 text-warning fw-bold border shadow-sm rounded-3 text-decoration-none">Edit</a>
                                            <form action="{{ route('kecamatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kecamatan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm px-2.5 py-1 text-danger fw-bold border shadow-sm rounded-3">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Belum ada data kecamatan yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection