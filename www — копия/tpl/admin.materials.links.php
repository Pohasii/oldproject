<div class="wrap material-links">
	<form action="/admin/materials/links" method="POST">
		<label class="admin-labels">полезные ссылки</label>
		<?php foreach ($result as $value): ?>
			<div class="link-form">
				<input class="admin-input-text" name="url[]" type="text" placeholder="адрес" value="<?=$value['url']?>">
				<input class="admin-input-text" name="name[]" type="text" placeholder="имя" value="<?=$value['name']?>">
				<input name="id[]" type="hidden" value="<?=$value['id']?>">
				<div class="del-butt"><a href="/admin/materials/links/del/<?=$value['id']?>">удалить</a></div>
			</div>
		<?php endforeach; ?>
		<div id="butt"></div>
		<div class="material-links-buttons">
			<a class="admin-input-submit" onclick="morebut()">еще</a>
			<input class="admin-input-submit" type="submit" name="submit" value="сохранить">
		</div>
	</form>
	<script>
	function morebut() {
		var str='\
		<div class="link-form">\
			<input class="admin-input-text" name="url[]" type="text" placeholder="адрес">\
			<input class="admin-input-text" name="name[]" type="text" placeholder="имя">\
			<input name="id[]" type="hidden" value="0">\
		</div>'
		var div=document.createElement('div');
		div.innerHTML=str;
		document.getElementById('butt').appendChild(div);
	}

	</script>
</div>