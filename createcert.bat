@echo off
echo.
echo  ---------------------------------------------------
echo            HTTPS�p�T�[�o�[�ؖ����̍쐬�o�b�`
echo  ---------------------------------------------------
echo.
echo   HTTPS �ڑ��p�̎��ȏ����ؖ������쐬���܂��B
echo.
echo   TVRemotePlus���C���X�g�[������PC�́A���[�J��IP�A�h���X����͂��Ă��������B
set /P ip=":   ���[�J��IP�A�h���X�F"
echo.
echo   ���s����ɂ͉����L�[�������Ă��������B
pause > NUL
echo.
echo  ---------------------------------------------------
cd %~dp0\bin\Apache\bin\
if not exist ..\conf\openssl.cnf (
  copy ..\conf\openssl.default.cnf ..\conf\openssl.cnf
)
if not exist ..\conf\openssl.ext (
  copy ..\conf\openssl.default.ext ..\conf\openssl.ext
)
echo.
.\openssl.exe genrsa -out ..\conf\server.key 2048
.\openssl.exe req -new -key ..\conf\server.key -out ..\conf\server.csr -config ..\conf\openssl.cnf -subj "/C=JP/ST=Tokyo/O=TVRemotePlus/CN=%ip%"
.\openssl.exe x509 -req -in ..\conf\server.csr -out ..\conf\server.crt -days 3650 -signkey ..\conf\server.key -extfile ..\conf\openssl.ext
copy ..\conf\server.crt ..\..\..\htdocs\server.crt
echo.
echo  ---------------------------------------------------
echo.
if %errorlevel% equ 0 (
  echo   HTTPS�ڑ��p�̎��ȏ����ؖ������쐬���܂����B
) else (
  echo   HTTPS�ڑ��p�̎��ȏ����ؖ����̍쐬�Ɏ��s���܂����c
)
echo   �I������ɂ͉����L�[�������Ă��������B
echo.
echo  ---------------------------------------------------
pause > NUL