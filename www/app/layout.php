<?php

if($_POST['sub']=='вход'){
		$login = $_POST['login'];
		$password = $_POST['pass'];

		$login = che($login);
		$password = che($password);
		
		$security='zagadka';
		$password= md5("$password$security");
		//echo $password;
		$result = call("SELECT * FROM `users` WHERE `nic_name`='$login'");
		
		if ($password == $result[0]['password']) {	
			$d = date('Y m d H i s');
			$keys = "$password$d";
			$keys = md5("$keys");
			$_SESSION["keys"]=$keys;
			$_SESSION["login"]=$login;
			$res = put("UPDATE `users` SET `keys`='$keys' WHERE `nic_name`='$login'");
			if ($res) {echo '<script>alert("Добро пожаловать");</script>'; }// смс приветствия 
			echo '<script>window.location.href = "/" </script>'; // перенаправление
		} else echo '<script>alert("Логин/пароль не действителен");</script>';
	}
	
	if($_POST['sub']=='Регистрация'){
		
		$login = $_POST['login'];
		$password = $_POST['pass'];
		$password2 = $_POST['pass2'];
		$email = $_POST['login'];

		$login = che($login);
		$password = che($password);
		$password2 = che($password2);
		
		if ($password == $password2) {
			$result = call("SELECT * FROM `users` WHERE `nic_name`='$login'");
			if ($result[0]['nic_name']!=$login) {
				$result = call("SELECT * FROM `users` WHERE `email`='$email'");
				if ($result[0]['email']!=$email) {
					$security='zagadka';
					$password= md5("$password$security");
					$res = put("INSERT INTO `users` (`nic_name`, `password`, `email`) values ('$login', '$password', '$email')");
					if ($res) {echo '<script>alert("Спасибо за рег");</script>'; }// смс приветствия 
					echo '<script>window.location.href = "/#authform" </script>'; // перенаправление
				} else echo 'такой E-mail уже занят';
			} echo 'Такой логин уже занят';
		} else echo 'пароли не совпадают';
	}
	
	if($action[0]=='exit') {
		session_destroy();
		echo '<script>window.location.href = "/"</script>';
	}
	
?>