<!doctype html>
<html lang="<?=$setlang?>" class="<?=$help?>">

<head>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
</head>

<body>
<div class="page-wrapper">
<header class="main">
    <div class="wrap">
        <a class="layout-link" href="/"> <div class="logo"> </div> </a>
        <div class="menu">
            <a class="<?=$priQuery[0]==''?'active':'' ?>" href="/"><?=t('main');?></a>
            <a class="<?=$priQuery[0]=='news'?'active':'' ?>" href="/news"><?=t('news');?></a>
            <a class="<?=$priQuery[0]=='materials'?'active':'' ?>" href="/materials"><?=t('materials');?></a>
            <a class="<?=$priQuery[1]=='about'?'active':'' ?>" href="/p/about"><?=t('about');?></a>
            <a class="<?=$priQuery[1]=='help'?'active':'' ?>" href="/p/help"><?=t('help');?></a>
            <a class="<?=$priQuery[1]=='contacts'?'active':'' ?>" href="/p/contacts"><?=t('contacts');?></a>
			<div class="language">
				<a class="eye <?=($help)?'active':''?>" href="#" onclick="sethelp();return false;">hp</a>
				<div class="divider"></div>
				<?php foreach ($lang as $value): ?>
					<a class="<?=($setlang==$value['name'])?'active':''?>" href="#" onclick="setlang('<?=$value['name']?>');return false;"><?=$value['name']?></a>
				<?php endforeach; ?>
			</div>
			
			<!-- нетрожрукиотрубает -->
			<?php
			$login = $_SESSION["login"];
			$result = call("SELECT * FROM `user` WHERE `login`='$login'");
			if(isset($_SESSION["login"]) && isset($_SESSION["keys"]) && $_SESSION["login"] == $result[0]['login'] && $_SESSION["keys"] == $result[0]['stels']) {		
			echo '<div class="die-sess">
				<a href="/admin/" > в панель администратора </a>
				<div class="divider"></div>
				<a href="/admin/exit" > выйти </a>
			</div>';
			} ?>
			<!-- дальше уже можешь:) -->
        </div>
	</div>
</header>

<?php 
echo $admin;
echo $content;
//echo print_r(call("SELECT * FROM `links`"));
?>
<div class="page-buffer"></div>
</div>
<footer class="foot">
    <div class="wrap">
        <div class="text_foot"><?php echo $footer[0]['content']; ?></div>
    </div>
</footer>
<script>
function setCookie(name, value, options) {options = options || {};var expires = options.expires;if (typeof expires == "number" && expires) {var d = new Date();d.setTime(d.getTime() + expires*1000);expires = options.expires = d;}if (expires && expires.toUTCString) {options.expires = expires.toUTCString();}value = encodeURIComponent(value);var updatedCookie = name + "=" + value;for(var propName in options) {updatedCookie += "; " + propName;var propValue = options[propName];if (propValue !== true) {updatedCookie += "=" + propValue;}}document.cookie = updatedCookie;}
function getCookie(name) {var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));return matches ? decodeURIComponent(matches[1]) : undefined;}
function deleteCookie(name) {setCookie(name, "", { expires: -1, 'path':'/' })}

function setlang(lang) {
	setCookie('lang',lang, {'path':'/'});
	location.reload();
}

function sethelp() {
	if(getCookie('help')) {
		deleteCookie('help');
	} else {
		setCookie('help', 'true', {'path':'/'});
	};
	location.reload();
}
</script>
</body>

</html>