<div class="wrap material-links">
	<form action="/admin/config/" method="POST">
		<label class="admin-labels">Настройки</label>
		<?php foreach ($result as $value): ?>
			<div class="link-">
				<div class="config">
					<input class="admin-input-text" name="login" type="text" placeholder="login" value="<?=$value['login']?>"> 
					<input class="admin-input-text" name="password" type="hidden" placeholder="password" value="<?=$value['password']?>">
					<input class="admin-input-text" name="orgpass" type="password" placeholder="password" value="" required> 
					<input class="admin-input-text" name="newpass" type="password" placeholder="password" value="" required> 
					<input class="admin-input-text" name="email" type="text" value="<?=$value['email']?>"> 
				</div>
				<div class="config">
					<label class="tip">login</label>
					<label class="tip">Для изменения введите текущий пароль </label>
					<label class="tip">введите новый</label>
					<label class="tip">email</label>
				</div>
		<?php endforeach; ?>
		<div id="butt"></div>
		<div class="material-links-buttons">
			<input class="admin-input-submit" type="submit" name="submit" value="сохранить">
		</div>
	</form>
</div>