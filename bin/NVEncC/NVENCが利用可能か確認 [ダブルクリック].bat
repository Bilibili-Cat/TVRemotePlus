@echo off
%~dp0\NVEncC64.exe --check-hw
if errorlevel 0 (
    echo NVENC�͗��p�\�ł��B
) else (
    echo NVENC���ł��܂���B
)
pause