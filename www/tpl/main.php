<div class="searchform" id="searchform" >
				<form method="post" action="/main">
				<a href="#" title="Закрыть" class="close">X</a>
				<input name="login" type="text" placeholder="логин">
				<select size="3" multiple name="lane[]">
					<option disabled>Линия</option>
					<option value="Чебурашка">Чебурашка</option>
					<option selected value="Крокодил Гена">Крокодил Гена</option>
					<option value="Шапокляк">Шапокляк</option>
					<option value="Крыса Лариса">Крыса Лариса</option>
				</select>
				от <input name="" type="number" min="12" max="99"> до <input name="" type="number" min="12" max="99">
				
				<input name="" type="text" placeholder="страна">
				<input name="" type="text" placeholder="язык">
				<select size="3" multiple name="role[]">
					<option disabled>Роль</option>
					<option value="Чебурашка">Чебурашка</option>
					<option selected value="Крокодил Гена">Крокодил Гена</option>
					<option value="Шапокляк">Шапокляк</option>
					<option value="Крыса Лариса">Крыса Лариса</option>
				</select>
				
				<select size="3" multiple name="cel[]">
					<option disabled>цель</option>
					<option value="Чебурашка">Чебурашка</option>
					<option selected value="Крокодил Гена">Крокодил Гена</option>
					<option value="Шапокляк">Шапокляк</option>
					<option value="Крыса Лариса">Крыса Лариса</option>
				</select>
				
				<select name="elo[]">
					<option disabled>Ранг</option>
					<option value="Чебурашка">даймонд</option>
					<option selected value="Крокодил Гена">платина</option>
					<option value="Шапокляк">серебро</option>
					<option value="Крыса Лариса">брынза</option>
				</select>
				
				<input name="" type="number" min="0" max="15000"> до <input name="" type="number" min="0" max="15000">
				<select name="time">
					<option disabled>часовой пояс</option>
					<option value="Чебурашка">1</option>
					<option selected value="Крокодил Гена">2</option>
					<option value="Шапокляк">3</option>
					<option value="Крыса Лариса">4</option>
				</select>
				
				<select name="timegame">
					<option disabled>время игры</option>
					<option value="Чебурашка">1</option>
					<option selected value="Крокодил Гена">2</option>
					<option value="Шапокляк">3</option>
					<option value="Крыса Лариса">4</option>
				</select>
				
				<select name="timegames">
					<option disabled>время игры 2</option>
					<option value="Чебурашка">1</option>
					<option selected value="Крокодил Гена">2</option>
					<option value="Шапокляк">3</option>
					<option value="Крыса Лариса">4</option>
				</select>
				
				<input name="sub" type="submit"  value="поиск">
				
				</form>
</div>
<div class="content">
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
	<div class="line"></div>
	<div class="rightbar">fgfffffffffffffffffffffffffffffffff</div>
</div>