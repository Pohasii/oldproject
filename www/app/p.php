<?php
//page controller
if(file_exists('tpl/'.$action[0].'.php')) {
	$result = call("SELECT * FROM `pages` WHERE `url`='$action[0]' AND lang='$setlang'");
	if(!$result) $result = call("SELECT * FROM `pages` WHERE `url`='$action[0]' AND lang='ru'");
	$title = $result[0]['title'];
	$content = getTpl($action[0], $result[0]);
	if($_POST) {
		$user = call("SELECT * FROM `user`");
		$title = "Вам прислали сообщение"; 
		$mess = 'Вам отправил сообщение: '.htmlspecialchars(trim($_POST['name'])).PHP_EOL.
				'С адреса: '.htmlspecialchars(trim($_POST['email'])).PHP_EOL.
				'Текст сообщения: '.htmlspecialchars(trim($_POST['email']));
		$to = $user[0]['email']; 
		$from = $user[0]['email']; 
		$ml = mail($to, $title, $mess, 'From:'.$from); 
		if($ml) echo '<script>alert("Спасибо, ваше сообщение отправлено!");window.location.href = "/p/contacts";</script>';
		else echo '<script>alert("При отправке произошла ошибка.");window.location.href = "/p/contacts";</script>';
	}
} else {
	$content = 'error';
}