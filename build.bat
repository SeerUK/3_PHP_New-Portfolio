@echo off

:: Minify CSS:
cd /PDE/3_PHP_New-Portfolio/public_html/Static/css

del *.min.css
for /F %%f IN ('dir /b *.css')  do (
	echo "// ---- Minifying: %%f ---- //"
	"C:\Program Files (x86)\Microsoft\Microsoft Ajax Minifier\ajaxmin.exe" %%f -o %%~nf.min.css
)


:: Minify JS
cd ../js

del *.min.js
for /F %%f IN ('dir /b *.js')  do (
	echo "// ---- Minifying: %%f ---- //"
	"C:\Program Files (x86)\Microsoft\Microsoft Ajax Minifier\ajaxmin.exe" %%f -o %%~nf.min.js
)