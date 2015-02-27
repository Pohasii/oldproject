<div class="personal">
	<h1>My page</h1>
	<div class="mypersonal">
		<?php if ($result['img']=='') { $scr='avatar.png'; } else $scr=$result['img'];?>
			<img src="/img/<?=$scr?>">
		<form>
			<div class="personal-data">
				<label>Имя</label>
				<input name="" type="text" value="<?=$result['name'];?>">
				<label>Фамилия</label>
				<input name="" type="text" value="<?=$result['fname'];?>">
			</div>
			<div class="location">
				<label>Возраст</label>
				<input name="" type="text" value="<?=$result['aga'];?>">
				<label>Страна</label>
				<input name="" type="text" value="<?=$result['strana'];?>">
				<label>Язык</label>
				<input name="" type="text" value="<?=$result['lang'];?>">
			</div>
			<div class="login">
				<label>Логин</label>
				<input name="" type="text" value="<?=$result['nic_name']; ?>">
			</div>
			<div class="passwords">
				<label>Новый пароль</label>
				<input name="" type="password">
				<label>Повторите новый пароль</label>
				<input name="" type="password">
				<label>Текущий пароль</label>
				<input name="" type="password"> 
			</div>
			<div class="purpose">
				<label>Цель</label>
				<input name="" type="text" value="<?=$result['fname'];?>">
			</div>
			<div class="role">
				<label>Роль</label>
				<input name="" type="text" value="<?=$result['role'];?>">
			</div>
			<div class="category">
				<label>Дивизион</label>
				<input name="" type="text" value="<?=$result['elo'];?>">
			</div>
			<div class="line">
				<label>Линия</label>
				<input name="" type="text" value="<?=$result['lan']; ?>">
			</div>
			<div class="line">
				<label>email</label>
				<input name="" type="text" value="<?=$result['email'];?>">
			</div>
			
			<div class="line">
				<label>MMR</label>
				<input name="" type="text" value="<?=$result['rating'];?>">
			</div>
			
			<div class="line">
				<label>Часовой пояс</label>
				<input name="" type="text" value="<?=$result['time'];?>">
			</div>
			
			<div class="line">
				<label>дата регистрации</label>
				<input name="" type="text" value="<?=$result['regdate'];?>">
			</div>
			
			<div class="line">
				<label>с какого времени играю </label>
				<input name="" type="text" value="<?=$result['needtime'];?>">
			</div>
			
			<div class="line">
				<label>По какое время играю</label>
				<input name="" type="text" value="<?=$result['needtimetwo']; ?>">
			</div>
			
			<div class="line">
				<label>skype</label>
				<input name="" type="text" value="<?=$result['skype'];?>">
			</div>
			
			
			
			<div class="line">
				<label>сервер</label>
				<input name="" type="text" value="<?=$result['server'];?>">
			</div>
			
			<div class="line">
				<label>Цель</label>
				<input name="" type="text" value="<?=$result['goal'];?>">
			</div>
			
			<div class="line">
				<label>Ищу</label>
				<input name="" type="text" value="<?=$result['I_was_looking_for'];?>">
			</div>
			
			<div class="line">
				<label>команда</label>
				<input name="" type="text" value="<?=$result['team'];?>">
			</div>
			
			<div class="line">
				<label>фейсбук</label>
				<input name="" type="text" value="<?=$result['fc'];?>">
			</div>
			
			<div class="line">
				<label>фейсбук</label>
				<input name="" type="text" value="<?=$result['vk'];?>">
			</div>
			
			
			<div class="desription">
				<label>Описание</label>
				<textarea name=""><?=$result['title']; ?></textarea>
			</div>
		</form>
	</div>
</div>
