@echo off

:: Step 1
echo "Step 1: Renaming composer.json to composer.local.json"
ren composer.json composer.local.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 2
echo "Step 2: Renaming composer.ploi.json to composer.json"
ren composer.ploi.json composer.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 3
echo "Step 3: Running composer update"
call composer update
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 4
echo "Step 4: Committing and pushing to remote repo"
git add -A
git commit -m "ploi deploy"
git push
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 5
echo "Step 5: Renaming composer.json to composer.ploi.json"
ren composer.json composer.ploi.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 6
echo "Step 6: Renaming composer.local.json to composer.json"
ren composer.local.json composer.json
if errorlevel 1 goto :error

:: Wait
timeout /t 2 /nobreak

:: Step 7
echo "Step 7: Running another composer update"
call composer update
if errorlevel 1 goto :error

:: Done
echo "All steps completed successfully."
goto :eof

:error
echo "An error occurred, exiting."
exit /b 1
