<?php
//main controller
if ($_POST) {
	
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
	$country=$test["country"];
	$laung=$test["laung"];
	$elo=$test["elo"];

	$serv=$test["server"];
	$time=$test["time"];
	$timegame1=$test["timegame1"];
	$timegame2=$test["timegame2"];
	
	$laneone = $test["lane"][0];
	$lanetwo = $test["lane"][1];
	$lanefree = $test["lane"][2];
	$lanefot = $test["lane"][3];
	
	$roleone = $test["role"][0];
	$roletwo = $test["role"][1];
	$rolefree = $test["role"][2];
	$rolefot = $test["role"][3];
	
	//print_r($goal[0]);
	
	$goalone = $test["goal"][0];
	$goaltwo = $test["goal"][1];
	$goalfree = $test["goal"][2];
	$goalfot = $test["goal"][3];
	
	if (isset($login) AND $login != '') {
		$q1 = " `nic_name`='$login'";
	}
	
	if (isset($firstage) AND $firstage != '') {
		$q2 = " `aga`>'$firstage'";
	}
	
	if (isset($secondage) AND $secondage != '') {
		$q3 = " `aga`<'$secondage'";
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
	
	if (isset($timegame1) AND $timegame1 != '') {
		$q8 = " `needtime`>'$timegame1'";
	}
	
	if (isset($timegame2) AND $timegame2 != '') {
		$q9 = " `needtimetwo`<'$timegame2'";
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
	
	$resultss=substr_replace($resultss, '', 1, 4);
//	$q26="<script>var char=$resultss.charAt(0)+$resultss.charAt(1)+$resultss.charAt(2); if(char == 'AND') $resultss.substring(3); </script>";
	
	print_r($resultss);
	
	
	$result = call("SELECT `nic_name`,`aga`,`strana`, `lan`, `role` FROM `users` WHERE $resultss LIMIT 0,40");
//	print_r($result);
	//$asd = "$login / $lane1 ! $lane2 ! $lane3 ! $lane4 / $firstage / $secondage / $country / $laung / $elo / $cel1 ! $cel2 ! $cel3 ! $cel4 / $role1 ! $role2 ! $role3 ! $role4 / $gametime1 / $gametime2 / $time / $timegame1 / $timegame2";
	//print_r($asd);
} else {
	$result = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users` LIMIT 0,40");
//	if(!$result) $result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
}

$title = 'main';
$content = getTpl('main',$result);