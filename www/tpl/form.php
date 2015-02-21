<?php

function formSearch() {

$f='<div class="searchform" id="searchform" >
					<form method="post" action="main">
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
							<div class="country-lang">
								<input name="country" type="text" placeholder="страна">
								<input name="laung" type="text" placeholder="язык">
							</div>
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

						</div>
						
						<input class="searchbutton" name="sub" type="submit"  value="поиск">
						
					</form>
	</div>';

	echo $f;
}

function formAuth() {

$f='<div class="authform" id="authform" >
				<form method="post" action="/layout">
				<a href="#" title="Закрыть" class="close">X</a>
				<div class="tittle-forma"> Форма авторизации </div>
					<input name="login" type="text" autofocus="autofocus"  placeholder="логин" required>
					<input name="pass" type="password" placeholder="пароль" required>
					<input name="sub" type="submit"  value="вход">
				</form>
			</div>';

	echo $f;
}

function formSing() {

$f='<div class="signform" id="signform" >
				<form method="post" action="/layout">
					<a href="#" title="Закрыть" class="close">X</a>
					<input name="login" type="text" autofocus="autofocus"  placeholder="логин" required onBlur="alert("asd")">
					<input name="pass" type="password"  placeholder="пароль" required>
					<input name="pass2" type="password"  placeholder="пароль" required>
					<input name="email" type="text" autofocus="autofocus" placeholder="email" required>
					<input name="sub" type="submit" value="Регистрация">
				</form>
			</div>';

	echo $f;
}

?>