# DISDAGIN Kota Bandung - Sistem Informasi Pengelolaan Keuangan

Aplikasi web Sistem Informasi Pengelolaan Keuangan yang dikembangkan khusus untuk **Dinas Perdagangan dan Perindustrian (DISDAGIN) Kota Bandung**. Aplikasi ini mempermudah pencatatan anggaran (*budget*), transaksi pemasukan, pengeluaran belanja dinas, serta pembuatan laporan keuangan berkala dalam format PDF dan Excel.

---

## 🏛️ Profil Aplikasi
- **Nama Aplikasi**: DISDAGIN Kota Bandung (Sistem Pengelolaan Keuangan)
- **Instansi**: Dinas Perdagangan dan Perindustrian Kota Bandung
- **Framework**: Laravel 10 (PHP 8.1 / 8.2)
- **Database**: MySQL / MariaDB (`disdagin_db`)
- **Frontend / UI**: SB Admin 2, Bootstrap, FontAwesome, Chart.js

---

## ✨ Fitur Utama
1. **Dashboard Eksekutif & Real-time Analytics**:
   - Visualisasi total anggaran dinas, realisasi pemasukan, dan rincian pengeluaran.
   - Grafik analitik keuangan bulanan berbasis Chart.js.
2. **Manajemen Anggaran (Budgeting)**:
   - Pencatatan alokasi dana per bidang / mata anggaran.
   - Pemantauan batas pagu dan serapan anggaran secara terkontrol.
3. **Pencatatan Transaksi**:
   - **Pemasukan**: Penerimaan dana/kas masuk dengan kategori dan alokasi anggaran.
   - **Pengeluaran**: Belanja barang, jasa, ATK, rapat, dan operasional dinas.
4. **Data Master Kategori**:
   - Pengelompokan jenis belanja dan penerimaan (Hosting, ATK, Makan Minum Rapat, dll).
5. **Pelaporan & Ekspor Berkas**:
   - Filter transaksi berdasarkan rentang tanggal dan kategori.
   - **Ekspor PDF Resmi**: Dilengkapi logo resmi Dinas Perdagangan dan Perindustrian Kota Bandung.
   - **Ekspor Excel**: Format spreadsheet siap olah untuk rekapitulasi bendahara.
6. **Multi-Role Access Control**:
   - **Admin / Operator Keuangan**: Memiliki akses penuh CRUD data master, transaksi, dan pelaporan.
   - **Kepala Dinas (Kadis)**: Hak akses peninjauan (*view & monitoring*) dashboard serta laporan keuangan dinas.

---

## 🔐 Kredensial Pengguna Bawaan (Default Login)
| Peran (Role) | Email | Password Default | Hak Akses |
|---|---|---|---|
| **Admin Keuangan** | `disdagin@gmail.com` | `disdagin2025` | Akses Penuh (Master, Budget, Transaksi, Laporan) |
| **Kepala Dinas** | `kadisdagin@gmail.com` | `kadis123` | Akses Dashboard & Cetak Laporan Keuangan |

---

## 🚀 Panduan Menjalankan di Lokal (Local Development)

### 1. Prasyarat Sistem
- PHP >= 8.1 (Disarankan PHP 8.2 dari XAMPP / Herd)
- Web Server & Database: Apache & MySQL (XAMPP / MariaDB)
- Composer

### 2. Langkah Menjalankan
1. **Pastikan MySQL Aktif**:
   Nyalakan modul MySQL pada XAMPP Control Panel.
2. **Konfigurasi Database `.env`**:
   Pastikan pengaturan pada file `.env`:
   ```env
   APP_NAME="DISDAGIN Kota Bandung"
   APP_ENV=local
   APP_URL=http://localhost:8000

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=disdagin_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. **Jalankan Migrasi & Seeder**:
   ```bash
   php artisan migrate
   php artisan db:seed --class=UserSeeder
   ```
4. **Jalankan Server Lokal**:
   ```bash
   php artisan serve --port=8000
   ```
5. **Akses Aplikasi**:
   Buka browser di: [http://localhost:8000](http://localhost:8000)

---

## 🌐 Panduan Aktivasi di Website / Publik (Hosting & Domain)

Untuk mengaktifkan website ini agar bisa diakses oleh seluruh pegawai atau publik via internet, terdapat beberapa opsi:

### Opsi A: cPanel / Shared Hosting (Paling Praktis & Terjangkau)
1. **Persiapan Berkas**:
   - Di lokal, jalankan `composer install --optimize-autoloader --no-dev`.
   - Kompres seluruh isi folder proyek menjadi `.zip` (kecuali folder `.git`).
2. **Upload ke File Manager cPanel**:
   - Buat folder di luar `public_html`, misalnya `/home/username/disdagin-core/` dan ekstrak berkas proyek di sana.
   - Pindahkan seluruh isi folder `public/` milik Laravel ke dalam folder `public_html/`.
   - Buka `public_html/index.php`, sesuaikan path bootstrap:
     ```php
     require __DIR__.'/../disdagin-core/vendor/autoload.php';
     $app = require_once __DIR__.'/../disdagin-core/bootstrap/app.php';
     ```
3. **Database di cPanel**:
   - Buat database baru di **MySQL Databases** cPanel (misal: `user_disdagin`).
   - Buat user database dan berikan privilese `ALL PRIVILEGES`.
   - Buka **phpMyAdmin**, import file `disdagin_db.sql` atau jalankan migrasi.
   - Sesuaikan file `.env` di server dengan nama database, user, dan password hosting.
   - Atur `APP_ENV=production`, `APP_DEBUG=false`, dan `APP_URL=https://nama-domain-disdagin.id`.

### Opsi B: VPS (Virtual Private Server) / Cloud Server Pemerintah (Rekomendasi Pemkot Bandung)
1. Gunakan OS Linux (Ubuntu 22.04 / 24.04 LTS).
2. Install stack: Nginx/Apache, PHP 8.2-FPM, MariaDB/MySQL, Git, Composer, Certbot (SSL).
3. Clone repository ke `/var/www/disdagin-web`.
4. Atur Nginx Server Block root mengarah ke `/var/www/disdagin-web/public`.
5. Beri izin hak akses:
   ```bash
   sudo chown -R www-data:www-data /var/www/disdagin-web/storage /var/www/disdagin-web/bootstrap/cache
   sudo chmod -R 775 /var/www/disdagin-web/storage /var/www/disdagin-web/bootstrap/cache
   ```
6. Pasang SSL gratis Let's Encrypt (`certbot --nginx -d domain.bandung.go.id`).

### Opsi C: Akses Jaringan Lokal Kantor Dinas (LAN / Intranet DISDAGIN)
Jika hanya ingin diakses oleh komputer-komputer di dalam kantor Dinas Perdagangan dan Perindustrian:
1. Jalankan `php artisan serve --host=0.0.0.0 --port=8000`.
2. Temukan alamat IP komputer server/laptop (cek via `ipconfig`, contoh: `192.168.1.50`).
3. Komputer/laptop pegawai lain di kantor yang terhubung ke WiFi/LAN yang sama dapat membuka browser ke: `http://192.168.1.50:8000`.

---

## 📜 Lisensi & Hak Cipta
Dikembangkan untuk **Dinas Perdagangan dan Perindustrian (DISDAGIN) Kota Bandung**.
Hak cipta dilindungi dan diperuntukkan bagi instansi pemerintah terkait.
