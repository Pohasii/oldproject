<!-- языки-->
<div class="wrap adm-new">
	<form action="/admin/lang" method="POST">
		<label class="admin-labels">Языки</label>
		<?php foreach ($result['lang'] as $value): ?>
			<div class="link-form">
				<input class="admin-input-text" name="name[]" type="text" placeholder="код языка" value="<?=$value['name']?>">
				<input name="id[]" type="hidden" value="<?=$value['id']?>">
				<div class="del-butt"><a href="/admin/lang/del/<?=$value['id']?>">удалить</a></div>
			</div>
		<?php endforeach; ?>
		<div id="butt"></div>
		<div class="material-links-buttons">
			<a class="admin-input-submit" onclick="morebut()">еще</a>
			<input class="admin-input-submit" type="submit" name="submit_lang" value="сохранить">
		</div>
	</form>
	<form action="/admin/lang" method="POST">
		<label class="admin-labels label2">Перевод</label>
		<table>
		<tr><td>ключ</td><td>значение ключа</td></tr>
		<?php foreach ($result['res'] as $key => $value): ?>
			<div class="link-form">
				<tr>
				<td><input class="admin-input-text" name="clef[]" type="text" value="<?=$value['clef']?>" readonly></td>
				<td><input class="admin-input-text" name="values[]" type="text" value="<?=$result['tran'][$key]['value']?>"></td>
				</tr>
			</div>
		<?php endforeach; ?>
		</table>
		<div id="butt"></div>
		<div class="material-links-buttons">
			<input class="admin-input-submit" type="submit" name="submit_tran" value="сохранить">
		</div>
	</form>
	<script>
	function morebut() {
		var str='\
		<div class="">\
			<input class="admin-input-text" name="name[]" type="text" placeholder="код языка">\
			<input name="id[]" type="hidden" value="0">\
		</div>'
		var div=document.createElement('div');
		div.innerHTML=str;
		document.getElementById('butt').appendChild(div);
	}

	</script>
</div>