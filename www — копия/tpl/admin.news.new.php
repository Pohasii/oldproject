<!--Здесь создание новостей-->
<div class="wrap">
	<div class="new-news">
		<form action="/admin/news/new" method="POST" enctype="multipart/form-data">
			<label class="admin-labels">Новая новость</label>
			<input class="admin-input-text" name="title" placeholder="заголовок" type="text">
			<input class="admin-input-text" name="date" placeholder="дата" type="date">
			<select class="admin-input-text" name="tag">
				<?php print_r($result[0]); foreach ($result as $value): ?>
					<option value="<?=$value['id']?>"><?=$value['name']?></option>
				<?php endforeach; ?>
			</select>
			<textarea class="admin-textarea" name="content"></textarea>
			<label class="admin-labels">Вставка кодов: (youtube, vkontacte...) </label>
			<div class="code"><textarea class="admin-textarea" name="code"></textarea></div>
			<div class="news-upload">
				<input type="file" name="mainimg">
				<label class="tip">главное изображение</label>
			</div>
			<div class="news-upload">
			<input type="file" name="imgs[]" multiple="multiple">
			<label class="tip">дополнительные изображения</label>
			</div>
			<input class="admin-input-submit" type="submit" name="submit" value="сохранить">
		</form>
	</div>
</div>