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
pushd "%~dp0\bin\Apache\bin\"
.\openssl.exe req -new -newkey rsa:2048 -nodes -config ..\conf\openssl.cnf -keyout ..\conf\server.key -out ..\conf\server.crt ^
              -x509 -days 3650 -sha256 -subj "/C=JP/ST=Tokyo/O=TVRemotePlus/CN=%ip%" -addext "subjectAltName = IP:127.0.0.1,IP:%ip%"
echo.
echo   -------------------------------------------------------------------
echo.
if %errorlevel% equ 0 (
  copy ..\conf\server.crt ..\..\..\htdocs\files\TVRemotePlus.crt > NUL
  echo     ���ȏ����ؖ����𐳏�ɍ쐬���܂����B
  echo.
  echo     ���ȏ����ؖ����� ^(TVRemotePlus^)/bin/Apache/conf/ �t�H���_�ɍ쐬����Ă��܂��B
  echo     �܂��A�_�E�����[�h�p�̏ؖ����� ^(TVRemotePlus^)/htdocs/files/ �t�H���_���ɃR�s�[���Ă���܂��B
) else (
  echo     ���ȏ����ؖ����̍쐬�Ɏ��s���܂����c
  echo.
  echo     ���͂������[�J�� IP �A�h���X�����������ǂ����m�F���A������x�����Ă��������B
)
echo.
echo     �I������ɂ͉����L�[�������Ă��������B
echo.
echo   -------------------------------------------------------------------
echo.
popd
pause > NUL