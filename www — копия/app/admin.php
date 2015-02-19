<?php
//admin controller
$title = 'admin';
//print_r($_SESSION);
//print_r($_COOKIE);

	$login = $_SESSION["login"];
	$result = call("SELECT * FROM `user` WHERE login='$login'");
	
if(isset($_SESSION["login"]) && isset($_SESSION["keys"]) && $_SESSION["login"] == $result[0]['login'] && $_SESSION["keys"] == $result[0]['stels']) {
		
	$admin = getTpl('admin',$priQuery);

	//работа с главной страницей
	if($action[0]=='main' && $action[1]=='del') {
		//удаление объявления
		$res = put("DELETE FROM `adverts` WHERE `id` = '$action[2]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/main"</script>';
		else error();
	}
	
	if($action[0]=='main') {
		if($_POST) {
			if($_POST['intro']) {
			//изменение картинки
				$cnt = mysql_real_escape_string($_POST['content']);
				$ttl = mysql_real_escape_string($_POST['title']);
				$uploaddir = $_SERVER["DOCUMENT_ROOT"].'/img/';
				$uploadfile = $uploaddir.basename($_FILES['image']['name']);
				if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
					$img = '/img/'.$_FILES['image']['name'];
				}
				$rs = call("SELECT * FROM `main_page` WHERE pos='img' AND lang='$setlang'");
				$img = $rs[0]['img'];
				if(call("SELECT * FROM `main_page` WHERE pos='img' AND lang='$setlang'")) {
					$res = put("UPDATE `main_page` SET img='$img', title='$ttl', content='$cnt' WHERE pos='img' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `main_page` (`img`, `pos`, `lang`, `title`, `content`) values ('$img', 'img', '$setlang', '$ttl', '$cnt')");
				}
			}
			if($_POST['advert']) {
			//изменение объявления
				foreach($_POST['id'] as $key=>$value) {
					$date = $_POST['date'][$key];
					$cnt = $_POST['text'][$key];
					$sts = ($_POST['status'][$key]=='on')?1:0;
					if(call("SELECT * FROM `adverts` WHERE id='$value' AND lang='$setlang'")) {
						$res = put("UPDATE `adverts` SET date='$date', content='$cnt', status='$sts' WHERE id='$value'");
					} else {
						$res = put("INSERT INTO `adverts` (`date`, `content`, `status`, `lang`) values ('$date', '$cnt', '1','$setlang')");
					}
				}
			}
			if($_POST['about']) {
			//изменение о нас
				$cnt = mysql_real_escape_string($_POST['content']);
				$ttl = mysql_real_escape_string($_POST['title']);
				if(call("SELECT * FROM `main_page`WHERE pos='intr' AND lang='$setlang'")) {
					$res = put("UPDATE `main_page` SET content='$cnt', title='$ttl' WHERE pos='intr' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `main_page` (`content`, `title`, `pos`, `lang`) values ('$cnt', '$ttl', 'intr','$setlang')");
				}
			}
			if($_POST['contact']) {
			//изменение контакты
				$cnt = mysql_real_escape_string($_POST['content']);
				$ttl = mysql_real_escape_string($_POST['title']);
				if(call("SELECT * FROM `main_page`WHERE pos='cont' AND lang='$setlang'")) {
					$res = put("UPDATE `main_page` SET content='$cnt', title='$ttl' WHERE pos='cont' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `main_page` (`content`, `title`, `pos`, `lang`) values ('$cnt', '$ttl', 'cont','$setlang')");
				}
			}
			if($_POST['add']) {
			//изменение дополнительного блока внизу страницы
				$cnt = mysql_real_escape_string($_POST['content']);
				$ttl = mysql_real_escape_string($_POST['title']);
				if(call("SELECT * FROM `main_page`WHERE pos='bot' AND lang='$setlang'")) {
					$res = put("UPDATE `main_page` SET content='$cnt', title='$ttl' WHERE pos='bot' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `main_page` (`content`, `title`, `pos`, `lang`) values ('$cnt', '$ttl', 'bot','$setlang')");
				}
			}
			if($res) echo '<script>alert("ok");</script>';
			else error();
		}
		$result[0]['img'] = call("SELECT * FROM `main_page` WHERE lang='$setlang' AND pos='img'");
		$result[0]['intr'] = call("SELECT * FROM `main_page` WHERE lang='$setlang' AND pos='intr'");
		$result[0]['cont'] = call("SELECT * FROM `main_page` WHERE lang='$setlang' AND pos='cont'");
		$result[0]['bot'] = call("SELECT * FROM `main_page` WHERE lang='$setlang' AND pos='bot'");
		$result[0]['advert'] = call("SELECT * FROM `adverts` WHERE lang='$setlang'");
		if(!$result[0]['advert']) $result[0]['advert'] = array();
	}
	
	//работа с страницами помощь, о нас, контакты
	if($action[0]=='about' || $action[0]=='help' || $action[0]=='contacts') {
		if($_POST) {
			$url = $action[0];
			$cnt = mysql_real_escape_string($_POST['content']);
			$ttl = mysql_real_escape_string($_POST['title']);
			if(call("SELECT * FROM `pages`WHERE url='$action[0]' AND lang='$setlang'")) {
				$res = put("UPDATE `pages` SET content='$cnt', title='$ttl' WHERE url='$url' AND lang='$setlang'");
			} else {
				$res = put("INSERT INTO `pages` (`content`, `title`, `url`, `lang`) values ('$cnt', '$ttl', '$url','$setlang')");
			}
			if($res) echo '<script>alert("ok");</script>';
			else error();
		}
		$result = call("SELECT * FROM `pages` WHERE `url`='$action[0]' AND lang='$setlang'");
	}

	//работа с новостями
	if($action[0] == 'news' && $action[1] == 'tags') {
		//редактирование темы
		if($_POST){
			foreach($_POST['id'] as $key=>$value) {
				$name = $_POST['name'][$key];
				if(call("SELECT * FROM `tags` WHERE id='$value'")) {
					$res = put("UPDATE `tags` SET name='$name' WHERE id='$value'");
				} else {
					$res = put("INSERT INTO `tags` (`name`) values ('$name')");
				}
			}
			if($res) echo '<script>alert("ok");</script>';
			else error();
		}
		$result[0] = call("SELECT * FROM `tags`");
	}
	if($action[0]=='news' && $action[1]=='tagdel') {
		//удаление темы новости
		$res = put("DELETE FROM `tags` WHERE `id` = '$action[2]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/news/tags"</script>';
		else error();
	}
	if($action[0]=='news' && $action[1]=='imgdel') {
		//удаление картинки новости
		$res = put("DELETE FROM `img` WHERE `id` = '$action[2]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/news/edit/'.$action[3].'"</script>';
		else error();
	}
	if($action[0]=='news' && !$action[1]) {
		//список новостей
		$result[0] = call("SELECT * FROM `news`");
	}
	if($action[0]=='news' && $action[1]=='edit') {
		//изменение новости
		$result = call("SELECT * FROM `news` WHERE id='$action[2]'");
		$id = $result[0]['id'];
		$mainimg = $result[0]['mainimg'];
		$result[0]['tags'] = call("SELECT * FROM `tags`");
		$result[0]['imgs'] = call("SELECT * FROM `img` WHERE `newsid`='$id'");
		if($_POST) {
			$url = tourl($_POST['title']);
			$ttl = $_POST['title'];
			$code = $_POST['code'];
			$cnt = mysql_real_escape_string($_POST['content']);
			$intr = cutString($cnt,100);
			$tag = $_POST['tag'];
			$date = $_POST['date'];
			$uploaddir = $_SERVER["DOCUMENT_ROOT"].'/img/';
			$uploadfile = $uploaddir.basename($_FILES['mainimg']['name']);
			if (move_uploaded_file($_FILES['mainimg']['tmp_name'], $uploadfile)) {
				$mainimg = '/img/'.$_FILES['mainimg']['name'];
			}
			$res = put("UPDATE `news` SET url='$url', title='$ttl', date='$date', tagID='$tag', mainimg='$mainimg', content='$cnt', intro='$intr' , code='$code' WHERE id='$id'");
			if ($_FILES['imgs']) {
				$file_ary = reArrayFiles($_FILES['imgs']);
				foreach ($file_ary as $file) {
					$uploadfile = $uploaddir.basename($file['name']);
					if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
						$img = '/img/'.$file['name'];
						put("INSERT INTO `img` (`url`, `newsid`) values ('$img', '$id')");
					}
				}
			}
			if($res) echo '<script>alert("ok");window.location.href = "/admin/news"</script>';
			else error();
		}
	}
	if($action[0]=='news' && $action[1]=='new') {
		//новая запись новости
		$result[0] = call("SELECT * FROM `tags`");
		if($_POST) {
			$url = tourl($_POST['title']);
			$ttl = $_POST['title'];
			$code = $_POST['code'];
			$cnt = $_POST['content'];
			$intr = cutString($cnt,100);
			$tag = $_POST['tag'];
			$date = $_POST['date'];
			$mainimg = '';
			
			$uploaddir = $_SERVER["DOCUMENT_ROOT"].'/img/';
			$uploadfile = $uploaddir.basename($_FILES['mainimg']['name']);
			if (move_uploaded_file($_FILES['mainimg']['tmp_name'], $uploadfile)) {
				$mainimg = '/img/'.$_FILES['mainimg']['name'];
			}

			$res = put("INSERT INTO `news` (`title`, `date`, `tagID`, `url`, `mainimg`, `content`, `intro`, `code`) values ('$ttl', '$date', '$tag', '$url', '$mainimg', '$cnt', '$intr', '$code')");
			$getid = call("SELECT * FROM `news` WHERE `url`='$url'");
			$id = $getid[0]['id'];

			if ($_FILES['imgs']) {
				$file_ary = reArrayFiles($_FILES['imgs']);
				foreach ($file_ary as $file) {
					$uploadfile = $uploaddir.basename($file['name']);
					if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
						$img = '/img/'.$file['name'];
						put("INSERT INTO `img` (`url`, `newsid`) values ('$img', '$id')");
					}
				}
			}

			if($res) echo '<script>alert("ok");window.location.href = "/admin/news"</script>';
			else error();
		}
	}
	if($action[0]=='news' && $action[1]=='del') {
		//удаление новости
		$res = put("DELETE FROM `news` WHERE `id` = '$action[2]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/news"</script>';
		else error();
	}

	//работа с материалами
	if($action[0]=='materials' && $action[1]=='links' && $action[2]=='del') {
		//удаление полезной ссылки
		$res = put("DELETE FROM `links` WHERE `id` = '$action[3]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/materials/links"</script>';
		else error();
	}
	if($action[0]=='materials' && $action[1]=='links') {
		//ссылки
		if($_POST) {
			foreach($_POST['id'] as $key=>$value) {
				$name = $_POST['name'][$key];
				$url = $_POST['url'][$key];
				if(call("SELECT * FROM `links` WHERE id='$value' AND lang='$setlang'")) {
					$res = put("UPDATE `links` SET url='$url', name='$name' WHERE id='$value' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `links` (`url`, `name`, `lang`) values ('$url', '$name', '$setlang')");
				}
			}
			if($res) echo '<script>alert("ok");</script>';
			else error();
		}
		$result[0] = call("SELECT * FROM `links` WHERE lang='$setlang'");
		if(!$result[0]) $result[0] = array();
	}

	if($action[0]=='materials' && $action[1]=='new' && $_POST) {
		//новая запись материала
		$url = tourl($_POST['title']);
		$cnt = $_POST['content'];
		$ttl = $_POST['title'];
		$res = put("INSERT INTO `materials` (`url`, `title`, `content`, `lang`) values ('$url', '$ttl', '$cnt', '$setlang')");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/materials"</script>';
		else error();
	}

	if($action[0]=='materials' && $action[1]=='edit') {
		//изменение материала
		if($_POST) {
			$url = tourl($_POST['title']);
			$cnt = $_POST['content'];
			$ttl = $_POST['title'];
			$id = $_POST['id'];
			$res = put("UPDATE `materials` SET url='$url', content='$cnt' , title='$ttl' WHERE id='$id'");
			if($res) echo '<script>alert("ok");window.location.href = "/admin/materials"</script>';
			else error();
		}
		$result = call("SELECT * FROM `materials` WHERE id='$action[2]'");
	}

	if($action[0]=='materials' && $action[1]=='del') {
		//удаление материала
		$res = put("DELETE FROM `materials` WHERE `id` = '$action[2]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/materials"</script>';
		else error();
	}

	if($action[0]=='materials' && !$action[1]) {
		//список материалов
		$result[0] = call("SELECT * FROM `materials` WHERE lang='$setlang'");
		if(!$result[0]) $result[0] = array();
	}
	
	if($action[0]=='footer') {
		//подвал сайта
		if($_POST) {
			$cnt = mysql_real_escape_string($_POST['content']);
				if(call("SELECT * FROM `main_page` WHERE pos='footer' AND lang='$setlang'")) {
					$res = put("UPDATE `main_page` SET content='$cnt' WHERE pos='footer' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `main_page` (`content`, `pos`, `lang`) values ('$cnt', 'footer', '$setlang')");
				}
			if($res) echo '<script>alert("ok");</script>';
			else error();
		}
		$result[0] = call("SELECT * FROM `main_page` WHERE `pos`='footer' AND lang='$setlang'");
	}
	
	if($action[0]=='config') {
		// Настройки
		//print_r($result['password']);
		
		if($_POST) {
			$security='zagadka';
			$orgpass = $_POST['orgpass'];
			$orgpass = "$orgpass$security";
			$orgpass = md5($orgpass);
			$password = $_POST['password'];
			if ($orgpass == $password) {
			$login = $_POST['login'];
			$newpass = $_POST['newpass'];
			$newpass = "$newpass$security";
			$newpass = md5($newpass);
			$email = $_POST['email'];
			$id = 1;
			$res = put("UPDATE `user` SET login='$login', password='$newpass' , email='$email' WHERE id='$id'");
			if($res) echo '<script>alert("Успешно измененно");window.location.href = "/admin/config"</script>';
			else error();
			} else echo '<script>alert("Неправильный пароль, повторите попытку");window.location.href = "/admin/config"</script>';
		}
		
		$result[0] = call("SELECT * FROM `user` WHERE id='1'"); // WHERE id='$action[2]'
		//print_r($result[0]);
	}

	if($action[0] == 'lang') {
		//редактирование языков
		if($_POST['submit_lang']){
			foreach($_POST['id'] as $key=>$value) {
				$name = $_POST['name'][$key];
				if(call("SELECT * FROM `lang` WHERE id='$value'")) {
					$res = put("UPDATE `lang` SET name='$name' WHERE id='$value'");
				} else {
					$res = put("INSERT INTO `lang` (`name`) values ('$name')");
				}
			}
			if($res) echo '<script>alert("ok");window.location.href = "/admin/lang</script>';
			else error();
		}
		if($_POST['submit_tran']){
			foreach($_POST['clef'] as $key=>$value) {
				$clef = $_POST['clef'][$key];
				$values = $_POST['values'][$key];
				if(call("SELECT * FROM `translate` WHERE clef='$clef' AND lang='$setlang'")) {
					$res = put("UPDATE `translate` SET value='$values' WHERE clef='$clef' AND lang='$setlang'");
				} else {
					$res = put("INSERT INTO `translate` (`value`,`clef`,`lang`) values ('$values','$clef','$setlang')");
				}
			}
			if($res) echo '<script>alert("ok");//window.location.href = "/admin/lang"</script>';
			else error();
		}
		$result[0]['lang'] = call("SELECT * FROM `lang`");
		$result[0]['tran'] = call("SELECT * FROM `translate` WHERE lang='$setlang'");
		$result[0]['res'] = call("SELECT * FROM `translate` WHERE lang='ru'");
		if(!$result[0]['tran']) $result[0]['tran'] = array();
	}
	
	if($action[0]=='lang' && $action[1]=='del') {
		//удаление материала
		$res = put("DELETE FROM `lang` WHERE `id` = '$action[2]';");
		if($res) echo '<script>alert("ok");window.location.href = "/admin/lang"</script>';
		else error();
	}
	
	if($action[0]=='exit') {
		session_destroy();
		echo '<script>window.location.href = "/"</script>';
	}
	
	if($action[0] == 'materials' && $action[1]) {
		$content = getTpl('admin.'.$action[0].'.'.$action[1],$result[0]);
	} elseif($action[0] == 'news' && $action[1]) {
		$content = getTpl('admin.'.$action[0].'.'.$action[1],$result[0]);
	} elseif($action[0]) {
		$content = getTpl('admin.'.$action[0],$result[0]);
	}
} else {
	$content = getTpl('admin.auth');
	if($_POST){
		$login = $_POST['login'];
		$password = $_POST['pass'];

		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$login = trim($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
		
		$security='zagadka';
		$password= md5("$password$security");

		$result = call("SELECT * FROM `user` WHERE login='$login'");
		
		if ($password == $result[0]['password']) {	
			$_SESSION["login"]=$login;
			$d = date('Y m d H i s');
			$keys = "$password$d";
			$keys = md5("$keys");
			$_SESSION["keys"]=$keys;
			$res = put("UPDATE `user` SET stels='$keys' WHERE login='$login'");
			echo '<script>alert("Добро пожаловать в Админ панель");</script>';
			echo '<script>window.location.href = "/admin" </script>';
		} else echo '<script>alert("Логин/пароль не действителен");</script>';
	}
}
	
?>