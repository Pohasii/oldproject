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

		<div class="tab">

			<div class="tabs" align="center">логин</div>
			<div class="tabs" align="center">догин</div>
			<div class="tabs" align="center">фогин</div>
			<div class="tabs" align="center">могин</div>
			<div class="tabs" align="center">слогин</div>

			<?php foreach($result['all'] as $value) { ?>
			<div class="tabss">
			<a href="/user/<?=$value['nic_name'];?>"><div class="tabs" align="center"><?=$value['nic_name']; ?></div>
			<div class="tabs" align="center"><?=$value['email'];?></div>
			<div class="tabs" align="center"><?=$value['aga'];?></div>
			<div class="tabs" align="center"><?=$value['strana'];?></div>
			<div class="tabs" align="center"><?=$value['role'];?></div></a>

			</div>
			<?php } ?> 

	</div>
		<div class="rightbar">medium</div>
	</div>
</div>
 