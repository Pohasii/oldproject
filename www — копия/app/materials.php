<?php
//materials controller
if(@$action[0]) {
	$result = call("SELECT * FROM `materials` WHERE `url`='$action[0]' AND lang='$setlang'");
	if(!$result) $result = call("SELECT * FROM `materials` WHERE `url`='$action[0]' AND lang='ru'");
	$title = $result[0]['title'];
	$content = getTpl('materials.one',$result[0]);
} else {
	$result=call("SELECT * FROM `materials` WHERE lang='$setlang'");
	if(!$result) $result = call("SELECT * FROM `materials` WHERE lang='ru'");
	$result2=call("SELECT * FROM `links` WHERE lang='$setlang'");
	if(!$result2) $result2 = call("SELECT * FROM `links` WHERE lang='ru'");
	$title = 'Материалы';
	$content = getTpl('materials.index',$result,$result2);
}