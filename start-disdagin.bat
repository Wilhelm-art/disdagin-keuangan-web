@echo off
title DISDAGIN Kota Bandung - Web Server Launcher
color 0A

echo =====================================================================
echo    DISDAGIN KOTA BANDUNG - SISTEM INFORMASI PENGELOLAAN KEUANGAN
echo =====================================================================
echo.

cd /d "%~dp0"

echo [1/3] Memeriksa status MySQL Database...
tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL | find /I /N "mysqld.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo [OK] MySQL Service sudah berjalan aktif.
) else (
    echo [..] Memulai MySQL MariaDB (XAMPP)...
    start "" /B "C:\xampp\mysql\bin\mysqld.exe" --defaults-file="C:\xampp\mysql\bin\my.ini" --standalone
    timeout /t 3 /nobreak >nul
    echo [OK] MySQL berhasil dijalankan.
)

echo.
echo [2/3] Membuka Website DISDAGIN di Browser (http://localhost:8000)...
start "" "http://localhost:8000"

echo.
echo [3/3] Menjalankan Server Laravel (PHP 8.2)...
echo ---------------------------------------------------------------------
echo Akses Web: http://localhost:8000
echo Login Admin : disdagin@gmail.com   ^| Password: disdagin2025
echo Login Kadis : kadisdagin@gmail.com ^| Password: kadis123
echo ---------------------------------------------------------------------
echo Tekan [Ctrl + C] untuk menghentikan server.
echo.

"C:\xampp\php\php.exe" artisan serve --host=127.0.0.1 --port=8000
pause
