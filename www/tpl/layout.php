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
	
	<script>
	//список
	var show;
	function hidetxt(type){
	param=document.getElementById(type);
	if(param.style.display == "none") {
	if(show) show.style.display = "none";
	param.style.display = "block";
	show = param;
	}else param.style.display = "none"
	}
	</script>
	
	<script type="text/javascript">
	//выпад спис поиск
var _click = function () {
        var b = 1;
        return function (c) {
            var a = document.getElementById("item" + b);
            c == b && (a.style.display = "none" == a.style.display ? "" : "none");
            c != b && (a.style.display = "none", a = document.getElementById("item" + c), a.style.display = "", b = c)
        }
    }();
window.onload = function() {
    _click(1)
 }
 
 //http://javascript.ru/forum/misc/25996-zakrytie-i-otkrytie-diva-po-kliku.html
</script>
	
    <title><?= $title ?></title>
</head>

<body>
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

<div class=bodyfonblock>
<div class=bodyfon onclick="bg_set('/img/1.jpg');"></div>
<div class=bodyfon onclick="bg_set('/img/2.jpg');"></div>
<div class=bodyfon onclick="bg_set('/img/3.jpg');"></div>
</div>

<!-- content -->

<div class="content">
	<!--a class="searchbut" href="#searchform">Поиск</a-->
	<a class="searchbut" onclick="_click(1); return false;" href="#">Search</a>
	<div class=searchformblock style=" display:none" id="item1">

	<div class="searchform" id="searchform" >
					<form method="post" action="/main">
						<!--a href="#" title="Закрыть" class="close">X</a-->
						<div class="form-field">
							<input name="login" type="text" placeholder="логин">
							<select size="3" multiple name="lane[]">
								<option disabled>Линия</option>
								<option value="Чебурашка">Чебурашка</option>
								<option selected value="Крокодил Гена">Крокодил Гена</option>
								<option value="Шапокляк">Шапокляк</option>
								<option value="Крыса Лариса">Крыса Лариса</option>
							</select>
						</div>
						<div  class="form-field">
							<div class="little">
								<input name="firstage" type="number" min="12" max="99"> до <input name="secondage" type="number" min="12" max="99">
							</div>
						<input name="country" type="text" placeholder="страна">
						<input name="laung" type="text" placeholder="язык">
						</div>
						<div class="form-field">
							<select name="elo[]">
								<option disabled>Ранг</option>
								<option value="Чебурашка">даймонд</option>
								<option selected value="Крокодил Гена">платина</option>
								<option value="Шапокляк">серебро</option>
								<option value="Крыса Лариса">брынза</option>
							</select>
							<select size="3" multiple name="cel[]">
								<option disabled>цель</option>
								<option value="Чебурашка">Чебурашка</option>
								<option selected value="Крокодил Гена">Крокодил Гена</option>
								<option value="Шапокляк">Шапокляк</option>
								<option value="Крыса Лариса">Крыса Лариса</option>
							</select>
						</div>
						<div class="form-field">
							<select size="3" multiple name="role[]">
								<option disabled>Роль</option>
								<option value="Чебурашка">Чебурашка</option>
								<option selected value="Крокодил Гена">Крокодил Гена</option>
								<option value="Шапокляк">Шапокляк</option>
								<option value="Крыса Лариса">Крыса Лариса</option>
							</select>
							<div class="little">
								<input name="gametime1" type="number" min="0" max="15000"> до <input name="gametime2" type="number" min="0" max="15000">
							</div>
						</div>
						<div class="form-field">
							<select name="time">
								<option disabled>часовой пояс</option>
								<option value="Чебурашка">1</option>
								<option selected value="Крокодил Гена">2</option>
								<option value="Шапокляк">3</option>
								<option value="Крыса Лариса">4</option>
							</select>
							
							<select name="timegame1">
								<option disabled>время игры</option>
								<option value="Чебурашка">1</option>
								<option selected value="Крокодил Гена">2</option>
								<option value="Шапокляк">3</option>
								<option value="Крыса Лариса">4</option>
							</select>
							
							<select name="timegame2">
								<option disabled>время игры 2</option>
								<option value="Чебурашка">1</option>
								<option selected value="Крокодил Гена">2</option>
								<option value="Шапокляк">3</option>
								<option value="Крыса Лариса">4</option>
							</select>
						</div>
						<input name="sub" type="submit"  value="поиск">
						
					</form>
	</div>

	</div>
	<div class=clearf> </div>

	<div class="content second">
	
	
	<?php 
echo $admin;
echo $content;
//echo print_r(call("SELECT * FROM `links`"));
?>
			<div class="rightbar">medium</div>
	</div>
</div>

	<footer>footer</footer>
</body>
</html>
