<!--подвал сайта - редактирование-->
<div class="wrap">
	<form action="/admin/footer" method="POST">
		<label class="admin-labels">Подвал сайта</label>
		<textarea class="admin-textarea" name="content"><?=$result[0]['content'] ?></textarea>
		<input class="admin-input-submit" name="" type="submit" value="сохранить">
	</form>
</div>