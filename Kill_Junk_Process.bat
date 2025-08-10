@echo off
REM Kill process via PowerShell
powershell -Command "Stop-Process -Id 4088 -Force"

REM Or using taskkill (requires admin privileges)
taskkill /PID 4088 /F
