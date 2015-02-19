<!doctype html>
<html lang="<?=$setlang?>" class="<?=$help?>">
<head>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta charset="UTF-8" />
	
	<script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
    <script type="text/javascript">
      var bg_ini = function () {
        if($$c.get('bg_style')!=undefined) {
          if($$c.get('bg_style').indexOf('#')===0) {
            $$($$().body,'background',$$c.get('bg_style'));
          }
          else {
          	$$($$().body,'backgroundImage','url('+$$c.get('bg_style')+')');
          }
        }
        else {
          //фон по умолчанию
          $$($$().body,'background','#555555');
        }
      }
      //ф-ция по умолчанию назначения 
      var bg_set = function (value) {
        $$c.set('bg_style', value, 60*60*24*30);
        bg_ini();
      }
      //ф-ция по умолчанию
      var bg_rem = function () {
        $$c.erase('bg_style');
        bg_ini();
      }

      
      $$r(function () {
        bg_ini();
      });
	  
	  //тамймер переключения
  var i = 1;
  var timer = setInterval(function() {
	  if (i==1){bg_set('/img/1.jpg');} 
	  if (i==2){bg_set('/img/2.jpg');} 
	  if (i==3){bg_set('/img/3.jpg');} 
	  i++; 
	  if (i==4) { i=1;} },
	  15000);
	  
//http://javascript.ru/blog/script_code/Smena-fonovogo-izobrazheniya-cveta-javascript-s-pomoshu-cookie-kliku
    </script>
	
    <title><?= $title ?></title>
</head>

<body id='ipboard_body'>
	<header class="main">
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
			
			<div class="language">
						<?php foreach ($lang as $value): ?>
							<a class="<?=($setlang==$value['name'])?'active':''?>" href="#" onclick="setlang('<?=$value['name']?>');return false;"><?=$value['name']?></a>
						<?php endforeach; ?>
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
