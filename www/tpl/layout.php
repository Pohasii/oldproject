<!doctype html>
<html lang="<?=$setlang?>" class="<?=$help?>">
<head>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
</head>

<body>
	<header class="main">
		<div class="side">
				<div class="language">
					<?php foreach ($lang as $value): ?>
						<a class="<?=($setlang==$value['name'])?'active':''?>" href="#" onclick="setlang('<?=$value['name']?>');return false;"><?=$value['name']?></a>
					<?php endforeach; ?>
				</div>
				<a class="enter" href="#searchform">Поиск</a>
				</div>
			</div>
		<div class="menu1">
			<div class="menu">
				<a href="/"><?=t('main');?></a>
				<a href="/news">Новости</a>
				<a href="/p/help">Помощь</a>
			</div>
			<?php 
			$login = $_SESSION["login"];
			$result = call("SELECT * FROM `users` WHERE `nic_name`='$login'");
			if(isset($_SESSION["login"]) && isset($_SESSION["keys"]) && $_SESSION["login"] == $result[0]["nic_name"] && $_SESSION["keys"] == $result[0]["keys"]) {
				echo "Добро пожаловать сэр <a href='/user/".$_SESSION["login"]."'>".$_SESSION["login"]."</a> <a href='/layout/exit' > выйти </a>";
			} else { echo '
			<div class="signup">
				<a class="enter" href="#authform">Вход</a>
				<a href="#signform">Регистрация</a>
			</div>
			'; } ?>
			<div class="authform" id="authform" >
				<form method="post" action="/layout">
				<a href="#" title="Закрыть" class="close">X</a>
				<div class="tittle-forma"> Форма авторизации </div>
					<input name="login" type="text" autofocus="autofocus"  placeholder="логин" required>
					<input name="pass" type="password" placeholder="пароль" required>
					<input name="sub" type="submit"  value="вход">
				</form>
			</div>
			<div class="signform" id="signform" >
				<form method="post" action="/layout">
					<a href="#" title="Закрыть" class="close">X</a>
					<input name="login" type="text" autofocus="autofocus"  placeholder="логин" required onBlur="alert('asd')">
					<input name="pass" type="password"  placeholder="пароль" required>
					<input name="pass2" type="password"  placeholder="пароль" required>
					<input name="email" type="text" autofocus="autofocus" placeholder="email" required>
					<input name="sub" type="submit" value="Регистрация">
				</form>
			</div>
	</header>
	
	<?php 
echo $admin;
echo $content;
//echo print_r(call("SELECT * FROM `links`"));
?>
	
	<footer>footer</footer>
</body>
</html>
