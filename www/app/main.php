<?php
//main controller
if ($_POST) {
	
	function ches($result){
		foreach($result as $value) {
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	$value = trim($value);
		}
	return $value;
}
	$test=$_POST['formserach'];
	$test=ches($test);
	
	$login=$test["login"];
	$lane=$test["lane"];
	$firstage=$test["firstage"];
	$secondage=$test["secondage"];
	$country=$test["country"];
	$laung=$test["laung"];
	$elo=$test["elo"];
	$goal=$test["goal"];
	$role=$test["role"];
	$serv=$test["server"];
	$time=$test["time"];
	$timegame1=$test["timegame1"];
	$timegame2=$test["timegame2"];
	
	$lane1 = $lane[0];
	$lane2 = $lane[1];
	$lane3 = $lane[2];
	$lane4 = $lane[3];
	
	$role1 = $role[0];
	$role2 = $role[1];
	$role3 = $role[2];
	$role4 = $role[3];
	
	//print_r($goal[0]);
	
	$cel1 = $goal;
	$cel2 = $goal[1];
	$cel3 = $goal[2];
	$cel4 = $goal[3];
	
	
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
	
	if (isset($lane1) or isset($lane2) or isset($lane3) or isset($lane4)) {
		if ($lane1!='') {
		$q11 = " `lan`in('$lane1'";
		}
		if ($lane2!='') {
		$q12 = ",'$lane2'";
		}
		if ($lane3!='') {
		$q13 = ",'$lane3'";
		}
		if ($lane4!='') {
		$q14 = ",'$lane4'";
		}
		if($q11!='') $q15=")";	
	}
	
	if (isset($role1) or isset($role2) or isset($role3) or isset($role4)) {
		if ($role1!='') {
		$q16 = " `role`in('$role1'";
		}
		
		if ($role2!='') {
		$q17 = ",'$role2'";
		}
		
		if ($role3!='') {
		$q18 = ",'$role3'";
		}
		
		if ($role4!='') {
		$q19 = ",'$role4'";
		}
		if($q16!='')$q20=")";	
	}
	
	if (isset($cel1) or isset($cel2) or isset($cel3) or isset($cel4)) {
		if ($cel1 !='') {
		$q21 = " `goal`in('$cel1'";
		}
		
		if ($cel2!='') {
		$q22 = ",'$cel2'";
		}
		
		if ($cel3!='') {
		$q23 = ",'$cel3'";
		}
		
		if ($cel4!='') {
		$q24 = ",'$cel4'";
		}
		if($q21=!'')$q25=")";	
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
	
	
	$result = call("SELECT `id`, `nic_name`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users` WHERE $resultss LIMIT 0,40");
//	print_r($result);
	//$asd = "$login / $lane1 ! $lane2 ! $lane3 ! $lane4 / $firstage / $secondage / $country / $laung / $elo / $cel1 ! $cel2 ! $cel3 ! $cel4 / $role1 ! $role2 ! $role3 ! $role4 / $gametime1 / $gametime2 / $time / $timegame1 / $timegame2";
	//print_r($asd);
} else {
	$result = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users` LIMIT 0,40");
//	if(!$result) $result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
}

$title = 'main';
$content = getTpl('main',$result);