<?php
//materials controller
if(@$action[0]=='group') {
		$result = call("SELECT * FROM `news` ORDER BY '$action[1]' DESC");
	if ($action[1]=='date') {
		$result2 = call("SELECT DISTINCT YEAR(`date`) FROM `news` ORDER BY '$action[1]' DESC");
		$title = 'sort date';
		$content = getTpl('news.group',$result,$result2);
	} else {
		$result2 = call("SELECT DISTINCT * FROM `tags`");
		$title = 'sort tagID';
		$content = getTpl('news.group',$result,$result2);
	}
} elseif(@$action[0]) {
	$result = call("SELECT * FROM `news` WHERE `url`='$action[0]'");
	$id = $result[0]['id'];
	$result2 = call("SELECT * FROM `img` WHERE `newsid`='$id'");
	$tagID = $result[0]['tagID'];
	$tagName = call("SELECT * FROM `tags` WHERE `id`='$tagID'");
	$result[0]['tagName']=$tagName[0]['name'];
	$title = $result[0]['title'];
	$content = getTpl('news.one',$result[0],$result2);
} else {
	$result = call("SELECT * FROM `news` ORDER BY `date` DESC");
	$title = 'list news';
	$content = getTpl('news.index',$result);
}