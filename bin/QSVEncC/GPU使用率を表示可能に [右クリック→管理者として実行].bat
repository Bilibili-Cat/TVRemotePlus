@echo off
if not "%PROCESSOR_ARCHITECTURE%" == "AMD64" (
    echo "GPU�g�p���̕\����64bit��OS�ł̂݉\�ł��B"
    pause
    exit /B
)
reg add "HKLM\SOFTWARE\Intel\EventTrace" /v EtwRenderSubmitCommandEnable /t REG_DWORD /d 1 /f
if not %ERRORLEVEL% == 0 (
    echo bat�t�@�C�����E�N���b�N���āA�u�Ǘ��҂Ƃ��Ď��s�v���Ă��������B
    pause
    exit /B
)
echo GPU�g�p���̕\����L���ɂ��܂����B[QSVEncC64.exe�̂�]
pause
exit  /B
