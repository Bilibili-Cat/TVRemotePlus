@echo off
echo.
echo   -------------------------------------------------------------------
echo                    HTTPS �ڑ��p���ȏ����ؖ����̍쐬�c�[��
echo   -------------------------------------------------------------------
echo.
echo     HTTPS �ڑ��p�̎��ȏ����ؖ������쐬���܂��B
echo.
echo     �C���X�g�[�����ɉ��炩�̖��Ŏ��ȏ����ؖ����̍쐬�Ɏ��s�����ꍇ��A
echo     ���[�J�� IP �A�h���X���ς�����Ƃ��A�ؖ����̗L���������؂ꂽ�Ƃ��ȂǂɎg���Ă��������B
echo.
echo   -------------------------------------------------------------------
echo.
:input
echo     TVRemotePlus ���C���X�g�[������ PC �́A���[�J�� IP �A�h���X����͂��Ă��������B
echo.
set /P ip=":   ���[�J��IP�A�h���X�F"
if "%ip%" equ "" (
  echo.
  echo     ���͗�����ł��B������x���͂��Ă��������B
  echo.
  goto input
)
echo.
echo     ���ȏ����ؖ������쐬���܂��B
echo.
echo   -------------------------------------------------------------------
echo.
cd %~dp0\bin\Apache\bin\
if not exist ..\conf\openssl.ext (
  copy ..\conf\openssl.default.ext ..\conf\openssl.ext
)
.\openssl.exe genrsa -out ..\conf\server.key 2048
.\openssl.exe req -new -key ..\conf\server.key -out ..\conf\server.csr -config ..\conf\openssl.cnf -subj "/C=JP/ST=Tokyo/O=TVRemotePlus/CN=%ip%"
.\openssl.exe x509 -req -in ..\conf\server.csr -out ..\conf\server.crt -days 3650 -signkey ..\conf\server.key -extfile ..\conf\openssl.ext
copy ..\conf\server.crt ..\..\..\htdocs\server.crt
echo.
echo   -------------------------------------------------------------------
echo.
if %errorlevel% equ 0 (
  echo     ���ȏ����ؖ����𐳏�ɍ쐬���܂����B
) else (
  echo     ���ȏ����ؖ����̍쐬�Ɏ��s���܂����c
)
echo.
echo     ���ȏ����ؖ����� (TVRemotePlus)/bin/Apache/conf/ �t�H���_�ɍ쐬����Ă��܂��B
echo     �܂��A�_�E�����[�h�p�̏ؖ����� (TVRemotePlus)/htdocs/ �t�H���_���ɃR�s�[���Ă���܂��B
echo.
echo     �I������ɂ͉����L�[�������Ă��������B
echo.
echo   -------------------------------------------------------------------
echo.
pause > NUL