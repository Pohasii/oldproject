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

<!-- form -->

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

<!-- content -->

<div class="content">
	<!--a class="searchbut" href="#searchform">Поиск</a-->
	<a class="searchbut" onclick="_click(1); return false;" href="#" align=center>Search</a>
	<div class=searchformblock style=" display:none" id="item1">

	<div class="searchform" id="searchform" >
					<form method="post" action="/main">
						<!--a href="#" title="Закрыть" class="close">X</a-->
						<div class="form-field">
						
							<input name="login" type="text" placeholder="логин">
							
							<select size="3" multiple name="lane[]">
								<option selected disabled>Линия</option>
								<option value="top">TOP</option>
								<option value="jungl">jungl</option>
								<option value="mid">MID</option>
								<option value="bot">BOT</option>
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
						
							<select name="elo">
								<option selected disabled>Ранг</option>
								<option value="Unranket">Unranket</option>
								<option value="bronze5">Бронза 5</option>
								<option value="bronze4">Бронза 4</option>
								<option value="bronze3">Бронза 3</option>
								<option value="bronze2">Бронза 2</option>
								<option value="bronze1">Бронза 1</option>
								<option value="silver5">серебро 5</option>
								<option value="silver4">серебро 4</option>
								<option value="silver3">серебро 3</option>
								<option value="silver2">серебро 2</option>
								<option value="silver1">серебро 1</option>
								<option value="gold5">голд 5</option>
								<option value="gold4">голд 4</option>
								<option value="gold3">голд 3</option>
								<option value="gold2">голд 2</option>
								<option value="gold1">голд 1</option>
								<option value="platina5">платина 5</option>
								<option value="platina4">платина 4</option>
								<option value="platina3">платина 3</option>
								<option value="platina2">платина 2</option>
								<option value="platina1">платина 1</option>
								<option value="Diamond5">Даймонд 5</option>
								<option value="Diamond4">Даймонд 4</option>
								<option value="Diamond3">Даймонд 3</option>
								<option value="Diamond2">Даймонд 2</option>
								<option value="Diamond1">Даймонд 1</option>
								<option value="master5">Мастер</option>
								<option value="chelik4">Челик</option>
							</select>
							
							<select size="3" multiple name="cel[]">
								<option selected disabled>цель</option>
								<option value="dou">duo</option>
								<option value="proteam">pro team</option>
								<option value="produo">pro duo</option>
								<option value="learning">учеба</option>
							</select>
							
							<!--input name type="checkbox" value="">
							<input type="checkbox" value="">
							<input type="checkbox" value="">
							<input type="checkbox" value=""-->
							
						</div>
						
						<div class="form-field">
						
							<select size="3" multiple name="role[]">
								<option selected disabled>Роль</option>
								<option value="top">top-tank</option>
								<option value="jungl">jungl</option>
								<option value="mid">mid</option>
								<option value="sup">bot sup</option>
								<option value="adc">bot adc</option>
							</select>

							
							<div class="little">
							
							<select name="server">
								<option selected disabled>server</option>
								<option value="all">любой</option>
								<option value="ru">RU</option>
								<option value="eu">EU</option>
								<option value="amer">AMER</option>
							</select>
							
							<!--time game <input name="gametime1" type="number" min="0" max="15000"> до <input name="gametime2" type="number" min="0" max="15000">
							-->	
							</div>
							
						</div>
						
						<div class="form-field">
						
							<select name="time">
								<option selected disabled>часовой пояс</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="-1">-1</option>
								<option value="-2">-2</option>
								<option value="-3">-3</option>
								<option value="-4">-4</option>
								<option value="-5">-5</option>
								<option value="-6">-6</option>
								<option value="-7">-7</option>
								<option value="-8">-8</option>
								<option value="-9">-9</option>
								<option value="-10">-10</option>
								<option value="-11">-11</option>
								<option value="-12">-12</option>	
							</select>
							
							<input type=time name=timegame1>
							<input type=time name=timegame2>
							
							<!--
							<select name="timegame1">
								<option selected disabled>время игры</option>
								
								<option value="1">c 1</option>
								<option value="2">c 2</option>
								<option value="3">c 3</option>
								<option value="4">c 4</option>
								<option value="5">c 5</option>
								<option value="6">c 6</option>
								<option value="7">c 7</option>
								<option value="8">c 8</option>
								<option value="9">c 9</option>
								<option value="10">c 10</option>
								<option value="11">c 11</option>
								<option value="12">c 12</option>
								
							</select>
							-->
							<!--
							<select name="timegame2">
							
								<option selected disabled>время игры</option>
								
								<option value="1">по 1</option>
								<option value="2">по 2</option>
								<option value="3">по 3</option>
								<option value="4">по 4</option>
								<option value="5">по 5</option>
								<option value="6">по 6</option>
								<option value="7">по 7</option>
								<option value="8">по 8</option>
								<option value="9">по 9</option>
								<option value="10">по 10</option>
								<option value="11">по 11</option>
								<option value="12">по 12</option>
								
							</select>
							-->
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
