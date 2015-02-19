<div class="wrap">
	<form action="/admin/materials/edit/<?=$result['id']?>" method="POST">
		<label class="admin-labels">Изменение материала</label>
		<input class="admin-input-text"	type="text" name="title" placeholder="заголовок" value="<?=$result['title']?>">
		<input type="hidden" name="id" value="<?=$result['id']?>">
		<textarea class="admin-textarea" name="content" placeholder="текст материала"><?=$result['content']?></textarea>
		<input class="admin-input-submit" type="submit" name="save" value="сохранить">
	</form>
</div>