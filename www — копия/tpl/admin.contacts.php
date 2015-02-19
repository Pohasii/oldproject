<div class="wrap">
	<form action="/admin/contacts" method="POST">
		<label class="admin-labels">контакты</label>
		<input class="admin-input-text" type="text" name="title" placeholder="заголовок" value="<?=$result['title'] ?>">
		<textarea 	class="admin-textarea" name="content" placeholder="текст страницы"><?=$result['content'] ?></textarea>
		<input class="admin-input-submit" type="submit" name="about-save-but" value="сохранить">
	</form>
</div>