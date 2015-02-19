<!--здесь редактирование главной-->
 <div class="wrap">
	<div class="main-admin img">
		<form action="/admin/main" method="POST" enctype="multipart/form-data">
			<input class="admin-input-text" type="text" name="title" placeholder="заголовок страницы" value="<?=$result['img'][0]['title']?>">
			<label class="admin-labels">вступительное изображение</label>
			<input class="upload-button" name="image" type="file">
			<textarea class="admin-textarea" name="content" placeholder="текст на изображении"><?=$result['img'][0]['content']?></textarea>
			<input class="admin-input-submit" name="intro" type="submit" value="сохранить">
		</form>
	</div>

	<div class="main-admin advert">
		<form action="/admin/main" method="POST">
			<label class="admin-labels">блок объявления</label>
			<?php foreach ($result['advert'] as $k => $value): ?>
				<div>
					<input class="date-admin" name="date[]" type="date" placeholder="дата" value="<?=$value['date']?>">
					<input class="obyav" name="text[]" type="text" placeholder="текст" value="<?=$value['content']?>">
					<input name="status[<?=$k?>]" type="checkbox" <?if($value['status']) echo 'checked'?>>
					<div class="del-butt"><a href="/admin/main/del/<?=$value['id']?>">удалить</a></div>
					<input name="id[]" type="hidden" value="<?=$value['id']?>">
				</div>
			<?php endforeach; ?>
			<div id="butt"></div>
			<a class="admin-input-submit" onclick="morebut()">еще</a>
			<input class="admin-input-submit" name="advert" type="submit" value="сохранить">
		</form>
	</div>

	<div class="main-admin aboutt">
		<form action="/admin/main" method="POST">
			<label class="admin-labels">блок о нас</label>
			<input class="admin-input-text" type="text" name="title" placeholder="заголовок" value="<?=$result['intr'][0]['title']?>">
			<textarea class="admin-textarea" name="content" placeholder="текст"><?=$result['intr'][0]['content']?></textarea>
			<input class="admin-input-submit" name="about" type="submit" value="сохранить">
		</form>
	</div>

	<div class="main-admin cont">
		<form action="/admin/main" method="POST">
			<label class="admin-labels">блок контакты</label>
			<input class="admin-input-text"	type="text" name="title" placeholder="заголовок" value="<?=$result['cont'][0]['title']?>">
			<textarea class="admin-textarea" name="content"	placeholder="текст"><?=$result['cont'][0]['content']?></textarea>
			<input class="admin-input-submit" name="contact" type="submit" value="сохранить">
		</form>
	</div>

	<div class="main-admin dow">
		<form action="/admin/main" method="POST">
			<label class="admin-labels">блок внизу</label>
			<input class="admin-input-text"	type="text" name="title" placeholder="заголовок" value="<?=$result['bot'][0]['title']?>">
			<textarea class="admin-textarea" name="content"	placeholder="текст"><?=$result['bot'][0]['content']?></textarea>
			<input class="admin-input-submit" name="add" type="submit" value="сохранить">
		</form>
	</div>

	<div class="scheme" id="mini">
		<img src="/img/minimain.png">
		<div class="obyav"></div>
		<div class="about"></div>
		<div class="contacts"></div>
		<div class="down"></div>
		<div class="image" style="background-image:url(<?=$result['img'][0]['img']?>)"></div>
	</div>
	<script>
	function morebut() {
		var str='\
		<div class="">\
			<input class="date-admin" name="date[]" type="date" placeholder="дата">\
			<input class="obyav" name="text[]" type="text" placeholder="текст">\
			<input name="id[]" type="hidden" value="0">\
		</div>'
		var div=document.createElement('div');
		div.innerHTML=str;
		document.getElementById('butt').appendChild(div);
	}

	function $(id) {return document.getElementById(id);}
	window.onscroll=function () {
		var scrolled = (document.documentElement.scrollTop) ? document.documentElement.scrollTop : window.pageYOffset;
		if (scrolled > 260) $('mini').classList.add("fixed");
		else $('mini').classList.remove("fixed");
	}
	</script>
 </div>
