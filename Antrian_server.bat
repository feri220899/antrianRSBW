@echo off
cd D:\antrian
start http://192.168.20.5:8000
php artisan serve --host 192.168.20.5 --port 8000
PAUSE
