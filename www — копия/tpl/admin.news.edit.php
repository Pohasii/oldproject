<!--здесь редактирование новости-->
<div class="wrap">
	<div class="new-news">
		<form action="/admin/news/edit/<?=$result['id']?>" method="POST" enctype="multipart/form-data">
			<label class="admin-labels">Изменение новости</label>
			<input class="admin-input-text" name="title" placeholder="заголовок" type="text" value="<?=$result['title']?>">
			<input class="admin-input-text" name="date" placeholder="дата" type="date" value="<?=$result['date']?>">
			<select name="tag" class="admin-input-text tag-margin ">
				<?php foreach ($result['tags'] as $value): ?>
					<option value="<?=$value['id']?>" <?=($result['tagID']==$value['id'])?'selected':''?> ><?=$value['name']?></option>
				<?php endforeach; ?>
			</select>
			<textarea class="admin-textarea" name="content"><?=$result['content']?></textarea>
			<label class="admin-labels label2">Вставка кодов: (youtube, vkontakte...) </label>
			<div class="code"><textarea class="admin-textarea" name="code"><?=$result['code']?></textarea></div>
			<label for="mainimg"> <img src="<?=$result['mainimg']?>" class="main-img-margin"> </label>
			<input class="new-upload" type="file" name="mainimg" id="mainimg">			
			<div class="news-min-img">
				<?php if($result['imgs']) foreach($result['imgs'] as $value) { ?>
					<a href="/admin/news/imgdel/<?=$value['id'];?>/<?=$result['id'];?>"> <span class="cross"><img src="<?=$value['url'];?>" alt="<?=$result['title'];?> <?=$value['id'];?>" class="min-img"></span></a>
				<?php } ?>
			</div>
			<input class="news-upload" type="file" name="imgs[]" multiple="multiple">
			<input class="admin-input-submit" type="submit" name="submit" class="submit-margin">
		</form>
	</div>
</div>