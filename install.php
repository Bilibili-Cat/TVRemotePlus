<?php

	// Shift-JIS��
	ini_set('default_charset', 'sjis-win');
	
	// �ׁ[�X�t�H���_
	$base_dir = rtrim(str_replace('\\','/',dirname(__FILE__)), '/');

	// Shift-JIS ���������΍�(���Win7����)
	// Shift-JIS �͑����łт�
	// �G�f�B�^�ŕ\�����ςɂȂ邪�C�ɂ��Ă͂����Ȃ�
	function sj_str($text) {
		$str_arr = array('�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\',
						'�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\','�\\', "");
		$text = str_replace("\\\\", "\\", $text);
		for ($i = 0; $str_arr[$i] != ""; $i++) {
			$text = str_replace($str_arr[$i] . "\\", mb_substr($str_arr[$i], 0, 1), $text); // ���\�����Ă����������
			$text = str_replace($str_arr[$i], $str_arr[$i] . "\\", $text); // \����
		}
		return $text;
	}		

	// �t�H���_�R�s�[�֐�
	function dir_copy($dir_name, $new_dir){

		if (!is_dir($dir_name)) {
			copy(sj_str($dir_name), sj_str($new_dir));
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
						copy(sj_str($dir_name . "/" . $file), sj_str($new_dir . "/" . $file));
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
	echo '  TVRemotePlus �̃Z�b�g�A�b�v���s���C���X�g�[���[�ł��B'."\n";
	echo '  �r���ŃL�����Z������ꍇ�� Ctrl + C �������Ă��������B'."\n";
	echo "\n";

	echo '  1. TVRemotePlus ���C���X�g�[������t�H���_���w�肵�܂��B'."\n";
	echo "\n";
	echo '     �t�H���_���h���b�O&�h���b�v���邩�A�t�@�C���p�X����͂��Ă��������B'."\n";
	echo '     �Ȃ��AUsers�EProgram Files �ȉ��ƁA���{��(�S�p)���܂܂��p�X�́A'."\n";
	echo '     ���삵�Ȃ��Ȃ錴���ƂȂ邽�߁A�����Ă��������B'."\n";
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
		echo '     ���Ɏw�肳�ꂽ�t�H���_�ɃC���X�g�[������Ă���Ɣ��肵�܂����B'."\n";
		echo '     �A�b�v�f�[�g���[�h�ŃC���X�g�[�����܂��B'."\n";
		echo '     ���̂܂܃A�b�v�f�[�g���[�h�ŃC���X�g�[������ɂ� 1 ���A'."\n";
		echo '     �S�ĐV�K�C���X�g�[������ꍇ�� 2 ����͂��Ă��������B'."\n";
		echo "\n";
		echo '     �C���X�g�[���F';
		$update_flg = trim(fgets(STDIN));
		// ����
		if ($update_flg == 1) $update = true;
		else $update = false;
		echo "\n";
	} else {	
		$update = false;
	}


	// �V�K�C���X�g�[���̏ꍇ��IP�ƃ|�[�g��u��
	if ($update === false){
		echo '  2. TVRemotePlus���C���X�g�[������PC�́A���[�J��IP�A�h���X����͂��Ă��������B'."\n";
		echo "\n";
		echo '     ���[�J��IP�A�h���X�́A�ʏ� 192.168.x.xx �̂悤�Ȍ`���̉Ƃ̒��p�� IP �A�h���X�ł��B'."\n";
		echo '     �C���X�g�[���[�Ō��m�������[�J�� IP �A�h���X�� '.getHostByName(getHostName()).' �ł��B'."\n";
		echo '     ���肪�Ԉ���Ă���ꍇ������܂�( VPN ���ŕ����̉��z�f�o�C�X������ꍇ�Ȃ�)�B'."\n";
		echo '     ���̏ꍇ�A���C���ŗ��p���Ă��郍�[�J�� IP �A�h���X�� ipconfig �Œ��ׁA���͂��Ă��������B'."\n";
		echo '     �悭�킩��Ȃ��ꍇ�́AEnter �L�[�������A���ɐi��ł��������B'."\n";
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
		echo '     �ʏ�́A�u���E�U�� URL ������ http://'.$serverip.':8000 �ŃA�N�Z�X�ł��܂��B'."\n";
		echo '     ���� 8000 �̔ԍ���ς������ꍇ�́A�|�[�g�ԍ�����͂��Ă��������B'."\n";
		echo '     HTTPS �ڑ����̓|�[�g�ԍ��� �����Őݒ肵���ԍ� + 100 �ɂȂ�܂��B'."\n";
		echo '     �悭�킩��Ȃ��ꍇ�́AEnter �L�[�������A���ɐi��ł��������B'."\n";
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

		echo '  4. TVTest �� BonDriver �� 32bit �ł����H 64bit �ł����H'."\n";
		echo "\n";
		echo '     32bit �̏ꍇ�� 1 �A64bit �̏ꍇ�� 2 �Ɠ��͂��Ă��������B'."\n";
		echo '     ���̍��ڂ� 32bit �ŁE64bit�łǂ���� TSTask ���g���������܂�܂��B'."\n";
		echo '     �C���X�g�[���I����A���g���� TVTest �� BonDriver �� ch2 �t�@�C�����A'."\n";
		echo '     '.$serverroot.'/bin/TSTask/BonDriver/ �ɃR�s�[���Ă��������B'."\n";
		echo '     Enter �L�[�Ŏ��ɐi�ޏꍇ�A������ 32bit ��I�����܂��B'."\n";
		echo "\n";
		echo '     TVTest �� BonDriver�F';
		// TVTest��BonDriver
		$bondriver = trim(fgets(STDIN));
		// ����
		if ($bondriver != 2) $bondriver = 1;
		echo "\n";

		echo '  5. �^��t�@�C���̂���t�H���_���w�肵�܂��B'."\n";
		echo "\n";
		echo '     �t�H���_���h���b�O&�h���b�v���邩�A�t�@�C���p�X����͂��Ă��������B'."\n";
		echo '     �Ȃ��A���{��(�S�p����)���܂܂��p�X�ƃl�b�g���[�N�h���C�u��̃t�H���_�́A'."\n";
		echo '     ���삵�Ȃ��Ȃ錴���ƂȂ邽�߁A�����Ă��������B'."\n";
		echo "\n";
		echo '     �^��t�@�C���̂���t�H���_�F';
		// �^��t�@�C���̂���t�H���_
		$TSfile_dir = trim(fgets(STDIN));
		echo "\n";
		// �󂾂�����
		if (empty($TSfile_dir)){
			while(empty($TSfile_dir)){
				echo '     ���͗�����ł��B������x���͂��Ă��������B'."\n";
				echo "\n";
				echo '     �^��t�@�C���̂���t�H���_�F';
				$TSfile_dir = trim(fgets(STDIN));
				echo "\n";
			}
		}
		// �u��
		$TSfile_dir = str_replace('\\', '/', $TSfile_dir);
		$TSfile_dir = rtrim($TSfile_dir, '/').'/';
	}

	echo '  �C���X�g�[�����J�n���܂��B'."\n";
	echo "\n\n";
	sleep(1);

	// �t�H���_�����
	if_mkdir('/');
	if_copy ('/config.default.php', true);
	if_copy ('/createcert.bat', true);
	if_copy ('/header.php', true);
	if_copy ('/LICENSE.txt', true);
	if_copy ('/module.php', true);
	if_copy ('/README.md', true);
	if_copy ('/require.php', true);
	if_copy ('/stream.bat', true);
	if_copy ('/stream.php', true);
	if_copy ('/bin', true);
	if_copy ('/cast', true);
	if_copy ('/data', true);
	if_copy ('/docs', true);
	if_copy ('/htdocs', true);

	// �V�K�C���X�g�[���݂̂̏���
	if ($update === false){

		// �ݒ�t�@�C��
		$tvrp_conf_file = $serverroot.'/config.php';
		$httpd_conf_file = $serverroot.'/bin/Apache/conf/httpd.conf';
		$httpd_default_file = $serverroot.'/bin/Apache/conf/httpd.default.conf';
		$openssl_conf_file = $serverroot.'/bin/Apache/conf/openssl.cnf';
		$openssl_default_file = $serverroot.'/bin/Apache/conf/openssl.default.cnf';
		$opensslext_conf_file = $serverroot.'/bin/Apache/conf/openssl.ext';
		$opensslext_default_file = $serverroot.'/bin/Apache/conf/openssl.default.ext';

		// config.default.php �� config.php �ɃR�s�[
		if (!file_exists($serverroot.'/config.php')) copy($serverroot.'/config.default.php', $serverroot.'/config.php');
		// httpd.default.conf �� httpd.conf �ɃR�s�[
		if (!file_exists($httpd_conf_file)) copy($httpd_default_file, $httpd_conf_file);
		// openssl.default.cnf �� openssl.cnf �ɃR�s�[
		if (!file_exists($openssl_conf_file)) copy($openssl_default_file, $openssl_conf_file);
		// openssl.default.ext �� openssl.ext �ɃR�s�[
		if (!file_exists($opensslext_conf_file)) copy($opensslext_default_file, $opensslext_conf_file);
		
		// TSTask �̃R�s�[
		if ($bondriver == 2){
			copy($serverroot.'/bin/TSTask/64bit/BonDriver_TSTask.dll', $serverroot.'/bin/TSTask/BonDriver_TSTask.dll');
			copy($serverroot.'/bin/TSTask/64bit/TSTask.exe', $serverroot.'/bin/TSTask/TSTask.exe');
			copy($serverroot.'/bin/TSTask/64bit/TSTaskCentre.exe', $serverroot.'/bin/TSTask/TSTaskCentre.exe');
		} else {
			copy($serverroot.'/bin/TSTask/32bit/BonDriver_TSTask.dll', $serverroot.'/bin/TSTask/BonDriver_TSTask.dll');
			copy($serverroot.'/bin/TSTask/32bit/TSTask.exe', $serverroot.'/bin/TSTask/TSTask.exe');
			copy($serverroot.'/bin/TSTask/32bit/TSTaskCentre.exe', $serverroot.'/bin/TSTask/TSTaskCentre.exe');
		}

		// ��Ԑݒ�t�@�C����������
		$jsonfile = $serverroot.'/data/setting.json';
		$json = array('state' => 'Offline');
		if (!file_exists($jsonfile)) file_put_contents($jsonfile, json_encode($json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));

		// TVRemotePlus�̐ݒ�t�@�C��
		$tvrp_conf = file_get_contents($tvrp_conf_file);
		$tvrp_conf = preg_replace('/^\$TSfile_dir =.*/m', '$TSfile_dir = \''.$TSfile_dir.'\';', $tvrp_conf); // �u��
		$tvrp_conf = preg_replace('/^\$http_port =.*/m', '$http_port = '.$port.';', $tvrp_conf); // �u��
		file_put_contents($tvrp_conf_file, $tvrp_conf); // ��������

		// Apache�̐ݒ�t�@�C��
		$httpd_conf = file_get_contents($httpd_conf_file);
		// �u��
		$httpd_conf = preg_replace("/Define SRVROOT.*/", 'Define SRVROOT "'.$serverroot.'"', $httpd_conf);
		$httpd_conf = preg_replace("/Define SRVIP.*/", 'Define SRVIP "'.$serverip.'"', $httpd_conf);
		$httpd_conf = preg_replace("/Define PORT.*/", 'Define PORT "'.$port.'"', $httpd_conf);
		$httpd_conf = preg_replace("/Define SSL_PORT.*/", 'Define SSL_PORT "'.$ssl_port.'"', $httpd_conf);
		file_put_contents($httpd_conf_file, $httpd_conf);// ��������

		// OpenSSL�̐ݒ�t�@�C��
		$openssl_conf = file_get_contents($openssl_conf_file);
		$openssl_conf = preg_replace("/commonName_default		= .*/", 'commonName_default		= '.$serverip.'', $openssl_conf); // �u��
		file_put_contents($openssl_conf_file, $openssl_conf); // ��������

		// OpenSSL�̊g���ݒ�t�@�C��
		$opensslext_conf = file_get_contents($opensslext_conf_file);
		$opensslext_conf = preg_replace("/subjectAltName = .*/", 'subjectAltName = IP:'.$serverip.'', $opensslext_conf); // �u��		
		file_put_contents($opensslext_conf_file, $opensslext_conf); // ��������


		// HTTPS�ڑ��p�I���I���ؖ����̍쐬
		echo '  HTTPS �ڑ��p�̎��ȏ����ؖ������쐬���܂��B'."\n";
		echo '  �r���A���͂����߂���ӏ�������܂����A�S�� Enter �Ŕ�΂��Ă��������B'."\n";
		echo '  �r���Ńp�X���[�h�Ƃ���������܂����A��΂��č\���܂���B'."\n";
		echo '  ���s����ɂ͉����L�[�������Ă��������B'."\n";
		trim(fgets(STDIN));
		echo "\n";

		$cmd =  'cd '.str_replace('/', '\\', $serverroot).'\bin\Apache\bin\ && '.
				'.\openssl.exe genrsa -out ..\conf\server.key 2048 && '.
				'.\openssl.exe req -new -key ..\conf\server.key -out ..\conf\server.csr -config ..\conf\openssl.cnf && '.
				'.\openssl.exe x509 -req -in ..\conf\server.csr -out ..\conf\server.crt -days 3650 -signkey ..\conf\server.key -extfile ..\conf\openssl.ext';

		exec($cmd, $opt1, $return1);
		copy($serverroot.'/bin/Apache/conf/server.crt', $serverroot.'/htdocs/server.crt');
		echo "\n";
		echo "\n";
		if ($return1 == 0) echo '  HTTPS�ڑ��p�̎��ȏ����ؖ������쐬���܂����B'."\n";
		else echo '  HTTPS�ڑ��p�̎��ȏ����ؖ����̍쐬�Ɏ��s���܂����c'."\n";

		// �V���[�g�J�b�g�쐬
		$powershell = '$shell = New-Object -ComObject WScript.Shell; '.
					'$lnk = $shell.CreateShortcut(\"$Home\Desktop\TVRemotePlus - launch.lnk\"); '.
					'$lnk.TargetPath = \"'.str_replace('/', '\\', $serverroot).'\bin\Apache\bin\httpd.exe\"; '.
					'$lnk.WindowStyle = 7; '.
					'$lnk.Save()';
		exec('powershell -Command "'.$powershell.'"', $opt2, $return2);
		echo "\n";
		if ($return2 == 0) echo '  �V���[�g�J�b�g���쐬���܂����B'."\n";
		else echo '  �V���[�g�J�b�g�̍쐬�Ɏ��s���܂����c'."\n";

	}

	echo "\n";
	echo "\n";
	echo '  �C���X�g�[�����������܂����B'."\n";
	echo "\n";
	sleep(1);

	// �V�K�C���X�g�[���݂̂̏���
	if ($update === false){
		echo '  �Z�b�g�A�b�v�͂܂��I����Ă��܂���B'."\n\n";
		echo '  BonDriver ��.ch2 �t�@�C���� '.$serverroot .'/bin/TSTask/BonDriver/ �ɖY�ꂸ�ɓ���Ă��������B'."\n\n";
		echo '  �I�������A�f�X�N�g�b�v�̃V���[�g�J�b�g���� TVRemotePlus ���N�����A���̌�'."\n";
		echo '  �u���E�U���� http://'.$serverip.':'.$port.'/ �ɃA�N�Z�X���܂��B'."\n";
		echo '  ���̌�A�� �T�C�h���j���[ �� �ݒ� �� ���ݒ� ����K�v�ȉӏ���ݒ肵�Ă��������B'."\n\n";
		echo '  PWA �@�\���g�p����ꍇ�́A�\�ߒ[���ɐݒ�y�[�W����_�E�����[�h�ł��鎩�ȏ����ؖ�����'."\n";
		echo '  �C���X�g�[��������ŁA https://'.$serverip.':'.$ssl_port.'/ �ɃA�N�Z�X���Ă��������B'."\n";
		sleep(1);
	}

	echo "\n";
	echo '  �I������ɂ͉����L�[�������Ă��������B'."\n\n";
	trim(fgets(STDIN));

