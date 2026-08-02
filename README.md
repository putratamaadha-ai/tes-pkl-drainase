# 1. Nama dan Deskripsi Singkat Aplikasi
**Sistem Manajemen Data Drainase dan Wilayah Administratif**
Aplikasi ini berbasis web dan dikembangkan menggunakan framework Laravel untuk mengelola, mencatat, dan memantau data infrastruktur saluran air (drainase) beserta integrasinya dengan wilayah administratif daerah. Sistem ini dibangun untuk memberikan solusi pencatatan yang terstruktur agar pelaporan kondisi drainase, pemetaan wilayah, dan pemeliharaan infrastruktur dapat dilakukan secara efisien, akurat, dan terpusat melalui antarmuka web yang interaktif.

---

# 2. Requirement Utama
* **PHP:** Minimal versi 8.1 / 8.2
* **Laravel Framework:** Versi 10.x / 11.x
* **Database Server:** MySQL / MariaDB 

---

# 3. Langkah Instalasi Project
Buka terminal dan arahkan langsung ke folder root project, lalu jalankan perintah berikut untuk mengunduh seluruh library pendukung:
`composer install`

Setelah itu, buat salinan file environment dari template bawaan project dengan perintah terminal:
`cp .env.example .env`

---

# 4. Pengaturan Database, Key, Migration, dan Seeder
Buka file `.env` dengan code editor, lalu sesuaikan kredensial database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) dengan database MySQL yang sudah kamu buat. 

Jalankan perintah berikut di terminal untuk menghasilkan encryption key keamanan aplikasi:
`php artisan key:generate`

Untuk membangun struktur tabel sekaligus mengisi data awal aplikasi, jalankan perintah:
`php artisan migrate --seed`

---

# 5. Cara Menjalankan Aplikasi
Setelah instalasi dan migrasi database selesai, aktifkan local development server dengan menjalankan perintah:
`php artisan serve`

Aplikasi kini siap digunakan. Buka web browser dan kunjungi alamat URL `http://127.0.0.1:8000`.

---

# 6. Daftar Fitur Aplikasi
**Fitur yang Berhasil Dibuat (Selesai):**
* Manajemen Data Drainase (CRUD Lengkap) untuk mencatat infrastruktur drainase.
* Manajemen Wilayah Administratif (CRUD Lengkap) yang terhubung dengan lokasi drainase.
* Validasi Input Terintegrasi untuk pengecekan otomatis pada form.
* Relasi Database Terstruktur menggunakan Eloquent Relationship Laravel.

**Fitur yang Belum Selesai:**
* Tidak ada — Seluruh fungsionalitas utama yang disyaratkan dalam project telah selesai diuji dan berjalan normal tanpa error.

---

# 7. Catatan Penggunaan Kecerdasan Buatan (AI)
Project ini memanfaatkan bantuan Kecerdasan Buatan (AI) sebagai asisten pengembang dengan rincian kontribusi sebagai berikut:
* Konsultasi arsitektur dan penyusunan relasi antar-tabel database.
* Referensi penyusunan sintaks validasi form pada Controller.
* Troubleshooting dan bantuan menganalisis pesan error selama masa pengembangan.
* Penyusunan dan perapihan dokumentasi README.md.