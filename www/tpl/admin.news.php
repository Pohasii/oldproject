<!--здесь список новостей-->
<div class="wrap adm-new">
	<label class="admin-labels">Список новостей</label>
	<table>
		<?php foreach ($result as $value): ?>
			<tr>
				<td><?=$value['date']?></td>
				<td><?=$value['title']?></td>
				<td><a href="/admin/news/del/<?=$value['id']?>">удалить</a></td>
				<td><a href="/admin/news/edit/<?=$value['id']?>">изменить</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>