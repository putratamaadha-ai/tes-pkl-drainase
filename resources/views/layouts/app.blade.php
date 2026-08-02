<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Drainase Wilayah</title>
    <!-- CSS Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Styling Global untuk Semua Halaman -->
    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
        }
        .main-wrapper {
            max-width: 1350px;
            margin: 0 auto;
        }
        .card-main {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
            background: #ffffff;
        }
        .btn-primary-custom {
            background-color: #0284c7;
            border-color: #0284c7;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 20px;
            transition: all 0.2s;
        }
        .btn-primary-custom:hover {
            background-color: #0369a1;
            border-color: #0369a1;
            transform: translateY(-1px);
        }
        
        /* Styling Header Tabel ala Dashboard Modern */
        .table-modern thead th {
            background-color: #334155 !important;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 12px;
            border-bottom: none;
        }
        .table-modern tbody td {
            padding: 14px 12px;
            color: #475569;
            font-size: 0.92rem;
            border-bottom-color: #f1f5f9;
        }
        .table-modern tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Badge Kondisi Dinamis */
        .badge-kondisi {
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.78rem;
            display: inline-block;
        }

        /* Mobile Card Styling */
        .public-card {
            border: 1px solid #e2e8f0 !important;
            background: #ffffff;
            border-radius: 12px !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }
    </style>
</head>
<body>

    <!-- TEMPAT KONTEN UTAMA DARI MASING-MASING HALAMAN MASUK -->
    <main>
        @yield('content')
    </main>

    <!-- Script Bootstrap JS (Penting agar tombol X bisa berfungsi untuk menutup alert) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>