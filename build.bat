@echo off

:: Minify CSS:
cd /PDE/3_PHP_New-Portfolio/public_html/Static/css
"C:\Program Files (x86)\Microsoft\Microsoft Ajax Minifier\ajaxmin.exe" style.css -o style.min.css

cd ../js

