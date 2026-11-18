@echo off
title DISDAGIN Kota Bandung - Online Cloudflare Tunnel
color 0B

echo =====================================================================
echo    DISDAGIN KOTA BANDUNG - ONLINE CLOUDFLARE PUBLIC WEB LAUNCHER
echo =====================================================================
echo.

cd /d "%~dp0"

echo [1/3] Memeriksa status MySQL Database...
tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL | find /I /N "mysqld.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo [OK] MySQL Service aktif.
) else (
    echo [..] Menyalakan MySQL MariaDB...
    start "" /B "C:\xampp\mysql\bin\mysqld.exe" --defaults-file="C:\xampp\mysql\bin\my.ini" --standalone
    timeout /t 3 /nobreak >nul
    echo [OK] MySQL berhasil aktif.
)

echo.
echo [2/3] Memastikan Server Laravel berjalan di port 8000...
netstat -ano | findstr ":8000" | findstr "LISTENING" >nul
if "%ERRORLEVEL%"=="0" (
    echo [OK] Server Laravel port 8000 sudah aktif.
) else (
    echo [..] Memulai server Laravel di latar belakang...
    start "Laravel-Server" /B "C:\xampp\php\php.exe" artisan serve --host=127.0.0.1 --port=8000
    timeout /t 2 /nobreak >nul
    echo [OK] Server Laravel aktif.
)

echo.
echo [3/3] Membuka Cloudflare Tunnel ke Internet Publik...
echo ---------------------------------------------------------------------
echo Website akan online dan memiliki link HTTPS resmi dari Cloudflare!
echo Siapa pun di internet (ponsel, tablet, laptop luar) bisa membuka link.
echo.
echo Kredensial Login:
echo - Admin: disdagin@gmail.com   ^| Password: disdagin2025
echo - Kadis: kadisdagin@gmail.com ^| Password: kadis123
echo ---------------------------------------------------------------------
echo.
echo Silakan salin URL *.trycloudflare.com di bawah ini:
echo.

"%~dp0cloudflared.exe" tunnel --url http://127.0.0.1:8000
pause
