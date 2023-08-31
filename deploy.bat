@echo off

:: Step 1
ren composer.json composer.local.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 2
ren composer.forge.json composer.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 3
call composer update
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 4
git add -A
git commit -m "forge deploy"
git push
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 5
ren composer.json composer.forge.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 6
ren composer.local.json composer.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 7
call composer update
if errorlevel 1 goto :error

:: Done
echo All steps completed successfully.
goto :eof

:error
echo An error occurred, exiting.
exit /b 1
