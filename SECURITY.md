# Kebijakan Keamanan (Security Policy)

## Pelaporan Celah Keamanan (Reporting a Vulnerability)

Kami sangat memprioritaskan keamanan data dan keandalan sistem perbendaharaan Pemerintah Kota Bandung. Jika Anda menemukan indikasi celah keamanan (vulnerability) pada repositori ini maupun aplikasi live di `https://disdagin.vercel.app`:

1. **JANGAN** membuat isu publik di GitHub Issues.
2. Silakan laporkan secara bertanggung jawab (*responsible disclosure*) kepada Administrator / Tech Lead melalui email:
   - **Email Keamanan**: `adithardiansyah091@gmail.com`
   - **Subjek**: `[SECURITY VULNERABILITY] - SIPK DISDAGIN Kota Bandung`
3. Sertakan informasi detail:
   - Deskripsi langkah reproduksi celah (Proof of Concept).
   - Dampak potensial terhadap kerahasiaan (*confidentiality*), integritas (*integrity*), atau ketersediaan (*availability*).
   - Saran perbaikan jika tersedia.

Tim akan meninjau dan merilis patch keamanan dalam waktu maksimal 24–48 jam.

---

## Standar Keamanan Sistem yang Diterapkan
- **Server-Side Role Based Access Control (RBAC)**: Pemisahan ketat hak akses Admin Keuangan vs Kepala Dinas.
- **Disabled Public Registration**: Mencegah pembuatan akun tak terotorisasi oleh publik.
- **Strict Transport Security (HSTS)**: `max-age=63072000; includeSubDomains; preload`.
- **Anti-Clickjacking**: `X-Frame-Options: DENY`.
- **Anti-MIME Sniffing**: `X-Content-Type-Options: nosniff`.
- **Feature Restriction**: `Permissions-Policy` membatasi akses perangkat keras tanpa izin.
- **Sanitasi Input**: Mencegah SQL Injection & Cross-Site Scripting (XSS).
