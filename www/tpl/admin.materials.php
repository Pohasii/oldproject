<div class="wrap adm-new">
	<label class="admin-labels">Список материалов</label>
	<table>
		<?php foreach ($result as $value): ?>
			<a href="materials/"></a>
			<tr>
				<td><?=$value['title']?></td>
				<td><a href="/admin/materials/del/<?=$value['id']?>">удалить</a></td>
				<td><a href="/admin/materials/edit/<?=$value['id']?>">изменить</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>