@echo off
setlocal enabledelayedexpansion

rem Ensure we run from the directory where this script lives
pushd "%~dp0" >nul 2>&1

set "COUNTER_FILE=commit_counter.txt"

rem Load or initialize the counter value
if exist "%COUNTER_FILE%" (
    set /p current_count=<"%COUNTER_FILE%"
    for /f "tokens=*" %%i in ("%current_count%") do set current_count=%%i
    if not defined current_count set current_count=1
) else (
    set current_count=1
)

set /a commit_no=%current_count% 2>nul
if errorlevel 1 set commit_no=1

rem Stage everything
"%ProgramFiles%\Git\bin\git.exe" add --all
if errorlevel 1 (
    echo Failed to stage changes. Aborting.
    goto :cleanup
)

rem Abort if nothing is staged
"%ProgramFiles%\Git\bin\git.exe" diff --cached --quiet
if %errorlevel%==0 (
    echo No changes to commit.
    goto :cleanup
)

set "COMMIT_MSG=commit %commit_no%"
"%ProgramFiles%\Git\bin\git.exe" commit -m "%COMMIT_MSG%"
if errorlevel 1 (
    echo Commit failed. Aborting.
    goto :cleanup
)

rem Increment and persist the counter only after a successful commit
set /a next_count=%commit_no%+1
>"%COUNTER_FILE%" echo %next_count%

rem Push to the tracked remote/branch
"%ProgramFiles%\Git\bin\git.exe" push
if errorlevel 1 (
    echo Push failed. Review the error above.
    goto :cleanup
)

echo Successfully pushed "%COMMIT_MSG%".

goto :cleanup

:cleanup
popd >nul 2>&1
endlocal
exit /b 0
