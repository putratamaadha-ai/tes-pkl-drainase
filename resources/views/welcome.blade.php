<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Drainase Wilayah</title>
    <!-- Pake Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            background: #ffffff;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100 m-0">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="hero-card p-5">
                    <!-- Judul & Subjudul -->
                    <h2 class="fw-bold text-dark mb-2">Sistem Pendataan Drainase Wilayah</h2>
                    <p class="text-muted mb-4">Silakan pilih menu di bawah untuk mengelola data dengan mudah.</p>
                    
                    <!-- Tombol Navigasi -->
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('drainase.index') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            Data Drainase
                        </a>
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            Data Kecamatan
                        </a>
                        <a href="{{ route('kelurahan.index') }}" class="btn btn-success px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            Data Kelurahan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>