@echo off
echo ========================================
echo Starting OCD Platform (All Services)
echo ========================================
echo.
echo This will start:
echo   1. Python AI Server (port 5000)
echo   2. Laravel Server (port 8000)
echo.
echo Press Ctrl+C to stop all services
echo.
pause

start "AI Server" cmd /k "cd ocmds && python app.py"
timeout /t 3 /nobreak > nul
start "Laravel Server" cmd /k "php artisan serve"
timeout /t 3 /nobreak > nul

echo.
echo ========================================
echo All services started!
echo ========================================
echo.
echo AI Server:     http://127.0.0.1:5000
echo Laravel:       http://127.0.0.1:8000
echo AI Detection:  http://127.0.0.1:8000/ai-detection
echo.
echo Press any key to open AI Detection page...
pause > nul
start http://127.0.0.1:8000/ai-detection

