<?php

if($_POST['sub']=='Sing in'){
		$checkIp = $_COOKIE["CheckIp"];
		$resultcount = $_COOKIE["timesError"];
		print_r($_COOKIE["timesError"]);
		print_r($_COOKIE["CheckIp"]);
		if($resultcount == null and $checkIp==null){
		$resultcount = 0;
		setcookie ("CheckIp", $ip, time()+300);
		}
		if(isset($_COOKIE["timesError"]) and $_COOKIE["timesError"]<=5){
			if($_COOKIE["CheckIp"]==$ip){
			$login = $_POST['login'];
			$password = $_POST['pass'];

			$login = che($login);
			$password = che($password);
		
			$security='zagadka';
			$password= md5("$password$security");
		
			$result = call("SELECT * FROM `users` WHERE `nic_name`='$login'");
		
			if ($password == $result[0]['password']) {	
				$d = date('Y m d H i s');
				$keys = "$password$d";
				$keys = md5("$keys");
				$_SESSION["keys"]=$keys;
				$_SESSION["login"]=$login;
				$_SESSION["ip"]=$ip;
				$res = put("UPDATE `users` SET `keys`='$keys' WHERE `nic_name`='$login'");
				if ($res) {/*echo '<script>alert("Добро пожаловать");</script>'; */}// смс приветствия 
				unset($resultcount);
				setcookie ("timesError", "", time() - 300);
				setcookie ("CheckIp", "", time()-300);
				echo '<script>window.location.href = "/" </script>'; // перенаправление
				} else {
					$resultcount++;
					setcookie ("timesError", $resultcount, time()+300, '/');
					$count=6-$resultcount;
					$result['passErrorSingIn'] = "Неверный пароль, у Вас осталось $count";
				}
			} else {
				if($_COOKIE["CheckIp"]!=$ip and $_COOKIE["timesError"]>0) {
					$count = $_COOKIE['CheckIp'];
					$result['passErrorSingIn'] = "Извините, наша система обнаружила что ваш IP был изменен, при том что вы использовали $count попыток, по этому наша система безопасности временно блокирует вам возможность авторизоваться на 30 минут. Безопастность прежде всего. С Ув.Администрация!"; 
				setcookie ("timesError", "5", time()+1500, '/');
				} 
			}
		} elseif(isset($_COOKIE["timesError"]) and $_COOKIE["timesError"]>=5) {
			if($_COOKIE["CheckIp"]==$ip){
			$result['passErrorSingIn'] = 'Извините, Вы превысили количество попыток, пожалуйста подождите 5 минут';
			} else {
				if($_COOKIE["CheckIp"]!=$ip and $_COOKIE["timesError"]>0) {
					$count = $_COOKIE['CheckIp'];
					$result['passErrorSingIn'] = "Извините, наша система обнаружила что ваш IP был изменен, при том что вы использовали $count попыток, по этому наша система безопасности временно блокирует вам возможность авторизоваться на 30 минут. Безопастность прежде всего. С Ув.Администрация!"; 
				setcookie ("timesError", "5", time()+1500, '/');
				} 
			}
		} else {
		$login = $_POST['login'];
		$password = $_POST['pass'];

		$login = che($login);
		$password = che($password);
		
		$security='zagadka';
		$password= md5("$password$security");
		
		$result = call("SELECT * FROM `users` WHERE `nic_name`='$login'");
		
		if ($password == $result[0]['password']) {	
			$d = date('Y m d H i s');
			$keys = "$password$d";
			$keys = md5("$keys");
			$_SESSION["keys"]=$keys;
			$_SESSION["login"]=$login;
			$_SESSION["ip"]=$ip;
			$res = put("UPDATE `users` SET `keys`='$keys' WHERE `nic_name`='$login'");
			if ($res) {$result['passErrorSingIn'] = '<script>alert("Добро пожаловать");</script>'; }// смс приветствия 
			unset($resultcount);
			setcookie ("timesError", "", time() - 300);
			setcookie ("CheckIp", "", time()-300);
			echo '<script>window.location.href = "/" </script>'; // перенаправление
		} else {
			$resultcount++;
			setcookie ("timesError", $resultcount, time()+300, '/');
			$count=5-$resultcount;
			$result['passErrorSingIn'] = "Неверный пароль, У вас осталось $count";
		}
	}
}
	
	if($_POST['sub']=='Sing up'){
		
		$login = $_POST['login'];
		$password = $_POST['pass'];
		$password2 = $_POST['pass2'];
		$email = $_POST['email'];
		$emailsecond = $_POST['emailsecond'];

		$login = che($login);
		$password = che($password);
		$password2 = che($password2);
		
		if ($password == $password2) {
			if($email==$emailsecond) {
				$result = call("SELECT * FROM `users` WHERE `nic_name`='$login' and `email`='$email'");
				if ($result[0]['nic_name']!=$login) {
					if ($result[0]['email']!=$email) {
						$security='zagadka';
						$password= md5("$password$security");
						$res = put("INSERT INTO `users` (`nic_name`, `password`, `email`) values ('$login', '$password', '$email')");
						if ($res) {$result['ok'] = '<script>alert("Спасибо за рег");</script>'; }// смс приветствия 
					}else $result['erroremail'] = 'такой E-mail уже занят';
				}else $result['errorlogin'] =  'Такой логин уже занят';
			}else $result['notidenticalemail'] = 'E-mail не совпадают';
		}else $result['errorpass'] = 'пароли не совпадают';
	}

$title = 'authentication';
$content = getTpl('sing',$result);