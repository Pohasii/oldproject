<!-- подключение редактора -->
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded( nicEditors.allTextAreas);</script>
<!-- конец подключения редактора-->

<div class="wrap admin-menu">
	<div class="column">
		<span>страницы</span>
			<a class="<?=$result[1]=='main'?'active':'' ?>" href="/admin/main">главная</a>
			<a class="<?=$result[1]=='about'?'active':'' ?>" href="/admin/about">о нас</a>
			<a class="<?=$result[1]=='help'?'active':'' ?>" href="/admin/help">помощь</a>
			<a class="<?=$result[1]=='contacts'?'active':'' ?>" href="/admin/contacts">контакты</a>
	</div>
	<div class="column">
		<span>новости</span>
			<a class="<?=$result[1]=='news' && $result[2]=='new'?'active':'' ?>" href="/admin/news/new">новая</a>
			<a class="<?=$result[1]=='news' &&!$result[2]?'active':'' ?>" href="/admin/news/">изменить</a>
			<a class="<?=$result[1]=='news' && $result[2]=='tags'?'active':'' ?>" href="/admin/news/tags">темы</a>
	</div>
	<div class="column">
		<span>материалы</span>
			<a class="<?=$result[1]=='materials' && $result[2]=='new'?'active':'' ?>" href="/admin/materials/new">создать</a>
			<a class="<?=$result[1]=='materials' &&!$result[2]?'active':'' ?>" href="/admin/materials">изменить</a>
			<a class="<?=$result[1]=='materials' && $result[2]=='links'?'active':'' ?>" href="/admin/materials/links">ссылки</a>
	</div>	
	<div class="column">
		<span>дополнительно</span>
			<a class="<?=$result[1]=='footer'?'active':'' ?>" href="/admin/footer">подвал сайта</a>
			<a class="<?=$result[1]=='config'?'active':'' ?>" href="/admin/config">настройки</a>
			<a class="<?=$result[1]=='lang'?'active':'' ?>" href="/admin/lang">языки</a>
	</div>
</div>
