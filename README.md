# 🏛️ SIPK DISDAGIN Kota Bandung
### Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran Daerah

[![Production Deployment](https://img.shields.io/badge/Production-disdagin.vercel.app-004085?style=flat-square&logo=vercel)](https://disdagin.vercel.app)
[![Security Grade](https://img.shields.io/badge/Security_Grade-A%2B-28a745?style=flat-square&logo=shield)](https://disdagin.vercel.app)
[![Latency](https://img.shields.io/badge/Latency-Sub--Second_(0.3s)-007bff?style=flat-square)](https://disdagin.vercel.app)
[![Framework](https://img.shields.io/badge/Framework-Laravel_10-red?style=flat-square&logo=laravel)](https://laravel.com)
[![Database](https://img.shields.io/badge/Database-Supabase_PostgreSQL-3ECF8E?style=flat-square&logo=supabase)](https://supabase.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php)](https://php.net)

Platform perbendaharaan digital terpadu Pemerintah Kota Bandung untuk **Dinas Perdagangan dan Perindustrian (DISDAGIN)**. Aplikasi ini memfasilitasi pencatatan pagu anggaran (*budgeting*), transaksi kas masuk dan keluar, monitoring realisasi serapan anggaran, serta pelaporan keuangan berbasis *Good Public Governance*.

🌐 **Tautan Aplikasi Produksi**: **[https://disdagin.vercel.app](https://disdagin.vercel.app)**

---

## 📑 Daftar Isi
- [Arsitektur Sistem](#-arsitektur-sistem)
- [Fitur Utama](#-fitur-utama)
- [Keamanan & Kontrol Akses (RBAC)](#-keamanan--kontrol-akses-rbac)
- [Kinerja & Sub-Second Latency](#-kinerja--sub-second-latency)
- [Antarmuka Publik & Portal Disdagin](#-antarmuka-publik--portal-disdagin)
- [Kredensial Bawaan](#-kredensial-bawaan)
- [Panduan Pengembangan Lokal](#-panduan-pengembangan-lokal)
- [Kebijakan Keamanan](#-kebijakan-keamanan)

---

## 🏗️ Arsitektur Sistem

Aplikasi ini mengadopsi arsitektur *Modern Cloud Serverless*:
* **Edge Hosting**: Vercel Serverless Functions di region Sydney (`syd1`).
* **Database Cloud**: Managed PostgreSQL di Supabase Cloud (PgBouncer connection pooler port `5432`).
* **Co-location Optimization**: Eksekusi edge Vercel dan database Supabase berada di region yang sama untuk memangkas latensi jaringan bolak-balik hingga di bawah 1 detik.
* **Asset Caching**: Seluruh aset statis (CSS, JS, WebP/PNG, font) memiliki header `Cache-Control: public, max-age=31536000, immutable`.

---

## ✨ Fitur Utama

1. **Dashboard Eksekutif Real-Time**:
   - Ringkasan total saldo kas, total pemasukan, total pengeluaran dinas, dan pagu anggaran aktif.
   - Grafik analitik keuangan bulanan dan persentase serapan belanja dinas.
2. **Manajemen Pagu Anggaran (Budgeting)**:
   - Alokasi anggaran per bidang dan pos kegiatan dinas.
   - Deteksi dini serapan anggaran guna mencegah defisit kas.
3. **Pencatatan Transaksi Kas**:
   - **Pemasukan**: Penerimaan kas/dana transfer dengan klasifikasi pos anggaran.
   - **Pengeluaran**: Belanja barang, jasa, pemeliharaan, modal, dan operasional kantor.
4. **Data Master Kategori Transaksi**:
   - Klasifikasi belanja sesuai kode rekening standar akuntansi pemerintah daerah.
5. **Pelaporan & Ekspor Berkas**:
   - Filter transaksi fleksibel berdasarkan rentang tanggal dan kategori.
   - **Ekspor PDF Resmi**: Format siap cetak dengan kop surat dinas dan tanda tangan bendahara.
   - **Ekspor Excel**: Format spreadsheet `.xlsx` untuk rekapitulasi data akuntansi.
6. **Paginasi & Optimasi Beban Data**:
   - Tabel master dan transaksi dilengkapi paginasi 10 item per halaman.

---

## 🛡️ Keamanan & Kontrol Akses (RBAC)

* **Server-Side RBAC**:
  * **Role Admin Keuangan**: Otoritas penuh terhadap seluruh data master, transaksi, anggaran, dan manajemen pengguna.
  * **Role Kepala Dinas (Kadis)**: Hak akses khusus pemantauan (*monitoring & reporting*). Percobaan membuka rute manajemen pengguna `/users` otomatis menghasilkan respons **`HTTP 403 Forbidden`**.
* **Penutupan Registrasi Publik**: Rute `/register` dinonaktifkan (`HTTP 404`). Akun hanya dapat dibuat oleh Super Administrator.
* **HTTP Defense Headers**:
  * `Strict-Transport-Security`: `max-age=63072000; includeSubDomains; preload`
  * `X-Frame-Options`: `DENY` (Anti-clickjacking)
  * `X-Content-Type-Options`: `nosniff`
  * `Referrer-Policy`: `strict-origin-when-cross-origin`
  * `Permissions-Policy`: `camera=(), microphone=(), geolocation=(), interest-cohort=()`

---

## ⚡ Kinerja & Sub-Second Latency

Hasil audit benchmark pada lingkungan produksi (`https://disdagin.vercel.app`):
* `POST /login` → **0.92 detik**
* `GET /dashboard` → **0.40 detik** (turun drastis dari 10.51 detik)
* `GET /categories` → **0.28 detik**
* `GET /budgets` → **0.54 detik**
* `GET /incomes` → **0.25 detik**
* `GET /expenses` → **0.25 detik**
* `GET /reports` → **0.31 detik**
* `GET /users` → **0.32 detik**
* `GET /profile` → **0.24 detik**

---

## 🌐 Antarmuka Publik & Portal Disdagin

Landing page publik dirancang mengadopsi navigasi resmi [Portal Disdagin Kota Bandung](https://multisite.bandung.go.id/disdagin/):
* **🏛️ Portal Utama**: Menghubungkan ke portal induk Pemerintah Kota Bandung (`bandung.go.id`).
* **🏠 Beranda**: Tampilan profil sistem perbendaharaan daerah.
* **🏢 Profil (Dropdown)**: Struktur Organisasi, Sejarah Visi & Misi, Tupoksi, Daftar Pegawai.
* **ℹ️ PPID (Dropdown)**: Profil PPID, Permohonan Online, Portal PPID Utama.
* **📊 Informasi (Dropdown)**: Harga Bahan Pokok (ARIMBI), Metrologi Legal (UTTP), Sentra IKM, Ekspor, Balai Mutu.
* **📞 Kontak**: Tautan pintas ke peta lokasi dan informasi sekretariat DISDAGIN di Tamansari No. 59.
* **🔒 Masuk Sistem Keuangan**: Tombol akses menuju halaman otentikasi kedinasan.

---

## 🔐 Kredensial Bawaan

| Peran (Role) | Email Login | Kata Sandi Bawaan | Lingkup Akses |
|---|---|---|---|
| **Admin Keuangan** | `disdagin@gmail.com` | `disdagin2025` | Akses Penuh (Master, Budget, Transaksi, Laporan, Manajemen User) |
| **Kepala Dinas** | `kadisdagin@gmail.com` | `kadis123` | Monitoring Dashboard, Analitik, & Cetak Laporan Keuangan |

---

## 💻 Panduan Pengembangan Lokal

### 1. Prasyarat
- PHP >= 8.2 (dengan ekstensi `pdo_mysql`, `pdo_pgsql`, `mbstring`, `xml`)
- Composer >= 2.x
- MySQL / MariaDB (XAMPP / Laragon)

### 2. Instalasi
```bash
# Salin repository
git clone https://github.com/Wilhelm-art/disdagin-keuangan-web.git
cd disdagin-keuangan-web

# Pasang dependensi
composer install

# Salin konfigurasi environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Jalankan migrasi dan seeder awal
php artisan migrate --seed

# Jalankan server pengembangan
php artisan serve
```
Akses di browser: `http://localhost:8000`

---

## 📄 Kebijakan Keamanan

Untuk pelaporan celah keamanan atau kerentanan teknis, mohon pelajari panduan pada [SECURITY.md](SECURITY.md).
