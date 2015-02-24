<?php
//main controller
if ($_POST) {
	print_r($_POST);
	function ches($result){
	foreach($result as $value) {
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	$value = trim($value);
	}
	return $result;
}

	$test=ches($_POST);
	
	//print_r($test);
	
	$login=$test["login"];

	$firstage=$test["firstage"];
	$secondage=$test["secondage"];
	
	$timegame1=$test["timegame1"];
	$timegame2=$test["timegame2"];
	
	$lane=$test["lane"];
	
	$goal=$test["goal"];
	
	$role=$test["role"];
	
	$country=$test["country"];
	
	$language=$test["language"];
	
	$division=$test["division"];

	$server=$test["server"];
	
	$result = call("SELECT `id`, `nic_name`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users` LIMIT 0,100");
	
	/*unset($array['foo']);*/
	$result = array_intersect($result, $lane,$goal,$role,$country,$language,$division,$server);
	/*
	if (isset($login) AND $login != '') {
		$q1 = " `nic_name`='$login'";
	}
	
	if (isset($firstage) AND $firstage != '') {
		$q2 = " `aga`>'$firstage'";
	}
	
	if (isset($secondage) AND $secondage != '') {
		$q3 = " `aga`<'$secondage'";
	}
	
	if (isset($timegame1) AND $timegame1 != '') {
		$q8 = " `needtime`>'$timegame1'";
	}
	
	if (isset($timegame2) AND $timegame2 != '') {
		$q9 = " `needtimetwo`<'$timegame2'";
	}
	
	for($i=0;$i<7;$i++) {
		$q="q$i"
		
	}
	
	if (isset($country) AND $country != '') {
		$q4 = " `strana`='$country'";
	}
	
	if (isset($laung) AND $laung != '') {
		$q5 = " `lang`='$laung'";
	}
	
	if (isset($elo) AND $elo != '') {
		$q6 = " `elo`='$elo'";
	}
	
	if (isset($time) AND $time != '') {
		$q7 = " `time`='$time'";
	}
	
	
	
	if (isset($serv) AND $serv != '') {
		$q10 = " `server`='$serv'";
	}
	

	if (isset($laneone) or isset($lanetwo) or isset($lanefree) or isset($lanefot)) {
		if ($laneone!='') {
		$q11 = " `lan`in('$laneone'";
		}
		if ($lanetwo!='') {
		$q12 = ",'$lanetwo'";
		}
		if ($lanefree!='') {
		$q13 = ",'$lanefree'";
		}
		if ($lanefot!='') {
		$q14 = ",'$lanefot'";
		}
		if($q11!='') $q15=")";	
	}
	
	if (isset($roleone) or isset($roletwo) or isset($rolefree) or isset($rolefot)) {
		if ($roleone!='') {
		$q16 = " `role`in('$roleone'";
		}
		
		if ($roletwo!='') {
		$q17 = ",'$roletwo'";
		}
		
		if ($rolefree!='') {
		$q18 = ",'$rolefree'";
		}
		
		if ($rolefot!='') {
		$q19 = ",'$rolefot'";
		}
		if($q16!='')$q20=")";	
	}
	
	if (isset($goalone) or isset($goaltwo) or isset($goalfree) or isset($goalfot)) {
		if ($goalone !='') {
		$q21 = " `goal`in('$goalone'";
		}
		
		if ($goaltwo!='') {
		$q22 = ",'$goaltwo'";
		}
		
		if ($goalfree!='') {
		$q23 = ",'$goalfree'";
		}
		
		if ($goalfot!='') {
		$q24 = ",'$goalfot'";
		}
		if($q21!='')$q25=")";	
	}
	
	$q="$q1$q2$q3$q4$q5$q6$q7$q8$q9$q10$q11$q12$q13$q14$q15$q16$q17$q18$q19$q20$q21$q22$q23$q24$q25";
	
	function tourls($text) {
    $cyr = array(' ');
    $lat = array(' AND ');
    return str_replace($cyr, $lat, $text);
	}
	
	$resultss=tourls($q);
	
	$resultss=substr_replace($resultss, '', 1, 4);*/

} else {
	
	
	$result = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users` LIMIT 0,100");
//	if(!$result) $result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
}

$result2 = call("SELECT * FROM `stats`");
$title = 'main';
$content = getTpl('main',$result,$result2);