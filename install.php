<?php

	// Shift-JIS��
	ini_set('default_charset', 'sjis-win');
	
	// �ׁ[�X�t�H���_
	$base_dir = str_replace('\\','/',dirname(__FILE__));

	function dir_copy($dir_name, $new_dir){
		if (!is_dir($dir_name)) {
			copy($dir_name, $new_dir);
			return true;
		}
		if (!is_dir($new_dir)) {
			mkdir($new_dir);
		}

		if (is_dir($dir_name)) {
			if ($dh = opendir($dir_name)) {
				while (($file = readdir($dh)) !== false) {
					if ($file == "." || $file == "..") {
						continue;
					}
					if (is_dir($dir_name . "/" . $file)) {
						dir_copy($dir_name . "/" . $file, $new_dir . "/" . $file);
					} else {
						copy($dir_name . "/" . $file, $new_dir . "/" . $file);
					}
				}
				closedir($dh);
			}
		}
		return true;
	}

	// �t�H���_���Ȃ��ꍇ�ɂ̂݃f�B���N�g�����쐬����
	function if_mkdir($mkdir){
		global $serverroot;
		if (!file_exists($serverroot.$mkdir)){
			mkdir($serverroot.$mkdir);
			echo '  �t�H���_ '.$serverroot.$mkdir.' ���쐬���܂����B'."\n";
			echo "\n";
		}
	}

	// �R�s�[
	function if_copy($copy, $flg = false){
		global $base_dir, $serverroot;
		if (!file_exists($serverroot.$copy) or $flg == true){
			dir_copy($base_dir.$copy, $serverroot.$copy);
			echo '  '.$base_dir.$copy.' ��'."\n";
			echo '  '.$serverroot.$copy.' �ɃR�s�[���܂����B'."\n";
			echo "\n";
		}
	}

	// �o��
	echo "\n";
	echo ' ========================================================'."\n";
	echo '                 TVRemotePlus�@�C���X�g�[���['."\n";
	echo ' ========================================================'."\n";
	echo "\n";
	echo '  TVRemotePlus�̃Z�b�g�A�b�v���s���C���X�g�[���[�ł��B'."\n";
	echo '  �r���ŃL�����Z������ꍇ�� Ctrl + C �������Ă��������B'."\n";
	echo "\n";

	echo '  1. TVRemotePlus���C���X�g�[������t�H���_���w�肵�܂��B'."\n";
	echo "\n";
	echo '     �t�H���_���h���b�O&�h���b�v���邩�A�t�@�C���p�X����͂��Ă��������B'."\n";
	echo "\n";
	echo '     �C���X�g�[������t�H���_�F';
	// TVRemotePlus�̃C���X�g�[���t�H���_
	$serverroot = trim(fgets(STDIN));
	echo "\n";
	// �󂾂�����
	if (empty($serverroot)){
		while(empty($serverroot)){
			echo '     ���͗�����ł��B������x���͂��Ă��������B'."\n";
			echo "\n";
			echo '     �C���X�g�[������t�H���_�F';
			$serverroot = trim(fgets(STDIN));
			echo "\n";
		}
	}
	// �u��
	$serverroot = str_replace('\\', '/', $serverroot);
	$serverroot = rtrim($serverroot, '/');

	// �t�H���_�����݂���ꍇ�A�b�v�f�[�g
	if (file_exists($serverroot) and file_exists($serverroot.'/config.php')){
		$update = true;
		echo '     ���Ɏw�肳�ꂽ�t�H���_�ɃC���X�g�[������Ă���Ɣ��肵�܂����B'."\n";
		echo '     �A�b�v�f�[�g���[�h�ŃC���X�g�[�����܂��B'."\n";
		echo "\n";

	// �V�K�C���X�g�[���̏ꍇ��IP�ƃ|�[�g��u��
	} else {
		$update = false;
		echo '  2. TVRemotePlus���C���X�g�[������PC�́A���[�J��IP�A�h���X����͂��Ă��������B'."\n";
		echo "\n";
		echo '     ���[�J��IP�A�h���X�́A�ʏ� 192.168.x.xx �̂悤�Ȍ`���̉Ƃ̒��p��IP�A�h���X�ł��B'."\n";
		echo '     �C���X�g�[���[�Ō��m�������[�J��IP�A�h���X�� '.getHostByName(getHostName()).' �ł��B'."\n";
		echo '     ���肪�Ԉ���Ă���ꍇ������܂�(VPN���ŕ����̉��z�f�o�C�X������ꍇ�Ȃ�)�B'."\n";
		echo '     ���̏ꍇ�A���C���ŗ��p���Ă��郍�[�J��IP�A�h���X�� ipconfig �Œ��ׁA���͂��Ă��������B'."\n";
		echo '     �悭�킩��Ȃ��ꍇ�́AEnter�L�[�������A���ɐi��ł��������B'."\n";
		echo "\n";
		echo '     ���[�J��IP�A�h���X�F';
		// TVRemotePlus���ғ�������PC(�T�[�o�[)�̃��[�J��LAN��IP
		$serverip = trim(fgets(STDIN));
		// �󂾂�����
		if (empty($serverip)){
			$serverip = getHostByName(getHostName());
		}
		echo "\n";

		echo '  3. �K�v�ȏꍇ�ATVRemotePlus�����p����|�[�g��ݒ肵�ĉ������B'."\n";
		echo "\n";
		echo '     �ʏ�́A�u���E�U��URL������ http://'.$serverip.':8000 �ŃA�N�Z�X�ł��܂��B'."\n";
		echo '     ���� 8000 �̔ԍ���ς������ꍇ�́A�|�[�g�ԍ�����͂��Ă��������B'."\n";
		echo '     HTTPS�ڑ����̓|�[�g�ԍ��� �����Őݒ肵���ԍ� + 100 �ɂȂ�܂��B'."\n";
		echo '     �悭�킩��Ȃ��ꍇ�́AEnter�L�[�������A���ɐi��ł��������B'."\n";
		echo "\n";
		echo '     ���p�|�[�g�ԍ��F';
		// TVRemotePlus���ғ�������|�[�g
		$port = trim(fgets(STDIN));
		// �󂾂�����
		if (empty($port)){
			$port = 8000;
		}
		$ssl_port = $port + 100; // SSL�p�|�[�g
		echo "\n";
	}

	echo '  �C���X�g�[�����J�n���܂��B'."\n";
	echo "\n\n";
	sleep(1);

	// �t�H���_�����
	if_mkdir('/');
	if_copy ('/config.default.php');
	if_copy ('/header.php', true);
	if_copy ('/LICENSE.txt', true);
	if_copy ('/README.md', true);
	if_copy ('/stream.php', true);
	if_copy ('/Twitter_Develop.md', true);
	if_copy ('/bin/', true);
	if_copy ('/data/', true);
	if_copy ('/htdocs/', true);

	// �V�K�C���X�g�[���݂̂̏���
	if ($update === false){

		// �ݒ�t�@�C��
		$httpd_conf_file = $serverroot.'/bin/Apache/conf/httpd.conf';
		$httpd_default_file = $serverroot.'/bin/Apache/conf/httpd.default.conf';
		$openssl_conf_file = $serverroot.'/bin/Apache/conf/openssl.cnf';
		$openssl_default_file = $serverroot.'/bin/Apache/conf/openssl.default.cnf';
		$opensslext_conf_file = $serverroot.'/bin/Apache/conf/openssl.ext';
		$opensslext_default_file = $serverroot.'/bin/Apache/conf/openssl.default.ext';

		// config.default.php �� config.php �ɃR�s�[
		if (file_exists(!$serverroot.'/config.php')) copy($serverroot.'/config.default.php', $serverroot.'/config.php');
		// httpd.default.conf �� httpd.conf �ɃR�s�[
		if (file_exists(!$httpd_conf_file)) copy($httpd_default_file, $httpd_conf_file);
		// openssl.default.cnf �� openssl.cnf �ɃR�s�[
		if (file_exists(!$openssl_conf_file)) copy($openssl_default_file, $openssl_conf_file);
		// openssl.default.ext �� openssl.ext �ɃR�s�[
		if (file_exists(!$opensslext_conf_file)) copy($opensslext_default_file, $opensslext_conf_file);

		// ��Ԑݒ�t�@�C����������
		$jsonfile = $serverroot.'/data/setting.json';
		$json = array('state' => 'Offline');
		if (!file_exists($jsonfile)) file_put_contents($jsonfile, json_encode($json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));

		// Apache�̐ݒ�t�@�C��
		$httpd_conf = file_get_contents($httpd_conf_file);

		// �u��
		$httpd_conf = preg_replace("/Define SRVROOT.*/", 'Define SRVROOT "'.$serverroot.'"', $httpd_conf);
		$httpd_conf = preg_replace("/Define SRVIP.*/", 'Define SRVIP "'.$serverip.'"', $httpd_conf);
		$httpd_conf = preg_replace("/Define PORT.*/", 'Define PORT "'.$port.'"', $httpd_conf);
		$httpd_conf = preg_replace("/Define SSL_PORT.*/", 'Define SSL_PORT "'.$ssl_port.'"', $httpd_conf);

		// ��������
		file_put_contents($httpd_conf_file, $httpd_conf);

		// OpenSSL�̐ݒ�t�@�C��
		$openssl_conf = file_get_contents($openssl_conf_file);
		
		// �u��
		$openssl_conf = preg_replace("/commonName_default		= .*/", 'commonName_default		= '.$serverip.'', $openssl_conf);

		// ��������
		file_put_contents($openssl_conf_file, $openssl_conf);

		// OpenSSL�̊g���ݒ�t�@�C��
		$opensslext_conf = file_get_contents($opensslext_conf_file);

		// �u��
		$opensslext_conf = preg_replace("/subjectAltName = .*/", 'subjectAltName = IP:'.$serverip.'', $opensslext_conf);

		// ��������
		file_put_contents($opensslext_conf_file, $opensslext_conf);

		// HTTPS�ڑ��p�I���I���ؖ����̍쐬
		echo '  HTTPS�ڑ��p�̎��ȏ����ؖ������쐬���܂��B'."\n";
		echo '  �r���A���͂����߂���ӏ�������܂����A�S��Enter�Ŕ�΂��Ă��������B'."\n";
		echo '  ���s����ɂ͉����L�[�������Ă��������B'."\n";
		trim(fgets(STDIN));
		echo "\n";

		$cmd =  'cd '.str_replace('/', '\\', $serverroot).'\\bin\\Apache\\bin\\ && '.
				'openssl.exe genrsa -out ..\conf\server.key 2048 && '.
				'openssl.exe req -new -key ..\conf\server.key -out ..\conf\server.csr -config ..\conf\openssl.cnf && '.
				'openssl.exe x509 -req -in ..\conf\server.csr -out ..\conf\server.crt -signkey ..\conf\server.key -extfile ..\conf\openssl.ext';
		echo $cmd."\n";
		exec($cmd);
		copy($serverroot.'/bin/Apache/conf/server.crt', $serverroot.'/htdocs/server.crt');
		echo "\n";
		echo '  HTTPS�ڑ��p�̎��ȏ����ؖ������쐬���܂����B'."\n";

		// �V���[�g�J�b�g�쐬
		$powershell = '$shell = New-Object -ComObject WScript.Shell; '.
					'$lnk = $shell.CreateShortcut(\"$Home\Desktop\TVRemotePlus.lnk\"); '.
					'$lnk.TargetPath = \"'.str_replace('/', '\\', $serverroot).'\bin\Apache\bin\httpd.exe\"; '.
					'$lnk.Save()';
		exec('powershell -Command "'.$powershell.'"');
		echo '  �V���[�g�J�b�g���쐬���܂����B'."\n";

	}

	echo "\n";
	echo '  �C���X�g�[�����������܂����B'."\n";
	sleep(1);

	echo '  �Z�b�g�A�b�v�͂܂��I����Ă��܂���B'."\n\n";
	echo '  config.php (�ݒ�t�@�C��)�� UTF-8�ELF �ŊJ����e�L�X�g�G�f�B�^�ɂĊJ���A'."\n";
	echo '  �ύX���K�v�ȉӏ���ݒ肵�A�Y�ꂸ�ɕۑ����Ă��������B'."\n";
	echo '  �܂��ABonDriver�� bin/TSTask/BonDriver/ �t�H���_�ɖY�ꂸ�ɓ���Ă��������B'."\n\n";
	echo '  �S�ďI�������A�f�X�N�g�b�v�̃V���[�g�J�b�g���� TVRemotePlus ���N�����A���̌�'."\n";
	echo '  �u���E�U���� http://'.$serverip.':'.$port.'/ �ɃA�N�Z�X���A�ُ킪�Ȃ���Ί����ł��B'."\n\n";
	echo '  �I������ɂ͉����L�[�������Ă��������B'."\n\n";
	trim(fgets(STDIN));

