@echo off
title Kopifazzdrink Dev Server
cd /d C:\laragon\www\Kopifazzdrink

echo 🚀 Menjalankan Laravel + Vite...
echo.

:: Jalankan Laravel server
start cmd /k "php artisan serve --host=localhost --port=8000"

:: Jalankan Vite (npm run dev)
start cmd /k "npm run dev"

echo.
echo ✅ Server Laravel jalan di: http://localhost:8000
echo ✅ Vite (hot reload) jalan di: http://localhost:5173
echo.
pause
