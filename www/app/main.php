<?php
//main controller
if ($_POST) {
	
	$login=$_POST["login"];
	$lane=$_POST["lane"];
	$firstage=$_POST["firstage"];
	$secondage=$_POST["secondage"];
	$country=$_POST["country"];
	$laung=$_POST["laung"];
	$elo=$_POST["elo"];
	$cel=$_POST["cel"];
	$role=$_POST["role"];
	$serv=$_POST["server"];
	$time=$_POST["time"];
	$timegame1=$_POST["timegame1"];
	$timegame2=$_POST["timegame2"];
	
	$lane1 = $lane[0];
	$lane2 = $lane[1];
	$lane3 = $lane[2];
	$lane4 = $lane[3];
	
	$role1 = $role[0];
	$role2 = $role[1];
	$role3 = $role[2];
	$role4 = $role[3];
	
	$cel1 = $cel[0];
	$cel2 = $cel[1];
	$cel3 = $cel[2];
	$cel4 = $cel[3];
	
	
	if (isset($login) AND $login != '') {
		$q = "`nic_name` = '$login'";
	}
	
	if (isset($firstage) AND $firstage != '') {
		$b=$q;
		$q = "`aga` > '$firstage'";
		if ($b != '') {
			$q = " AND `aga` > '$firstage'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($secondage) AND $secondage != '') {
		$b=$q;
		$q = "`aga` < '$secondage'";
		if ($b != '') {
			$q = " AND `aga` < '$secondage'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($country) AND $country != '') {
		$b=$q;
		$q = "`strana` = '$country'";
		if ($b != '') {
			$q = " AND `strana` = '$country'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($laung) AND $laung != '') {
		$b=$q;
		$q = "`lang` = '$laung'";
		if ($b != '') {
			$q = " AND `lang` = '$laung'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($elo) AND $elo != '') {
		$b=$q;
		$q = "`elo` = '$elo'";
		if ($b != '') {
			$q = " AND `elo` = '$elo'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($time) AND $time != '') {
		$b=$q;
		$q = "`time` = '$time'";
		if ($b != '') {
			$q = " AND `time` = '$time'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($timegame1) AND $timegame1 != '') {
		$b=$q;
		$q = "`needtime` = '$timegame1'";
		if ($b != '') {
			$q = " AND `needtime` = '$timegame1'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($timegame2) AND $timegame2 != '') {
		$b=$q;
		$q = "`needtimetwo` = '$timegame2'";
		if ($b != '') {
			$q = " AND `needtimetwo` = '$timegame2'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($serv) AND $serv != '') {
		$b=$q;
		$q = "`server` = '$serv'";
		if ($b != '') {
			$q = " AND `server` = '$serv'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
	}
	
	if (isset($lane1) or isset($lane2) or isset($lane3) or isset($lane4)) {
		if ($lane1!='') {
		$b=$q;
		if ($b != '') {
			$q = "AND `lan` in ('$lane1'";
			$c="$b $q";
		} else { $q = "`lan` in ('$lane1'"; $c="$q";}
		$q=$c;
		}
		
		if ($lane2!='') {
		$b=$q;
		$q = ", '$lane2'";
		if ($b != '') {
			$q = ", '$lane2'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		
		if ($lane3!='') {
		$b=$q;
		$q = ", '$lane3'";
		if ($b != '') {
			$q = ", '$lane3'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		
		if ($lane4!='') {
		$b=$q;
		$q = ", '$lane4'";
		if ($b != '') {
			$q = ", '$lane4'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		$q="$q)";	
			/*if ($lane4!='') {
			$b=$q;
			$q = "`lan` = '$lane1' or '$lane2' or '$lane3' or '$lane4'";
			if ($b != '') {
				$q = " AND `lan` = '$lane1' or '$lane2' or '$lane3' or '$lane4'";
				$c="$b $q";
			} else $c="$q";
			$q=$c;
			}*/
	}
	
	/*if (isset($role1) or isset($role2) or isset($role3) or isset($role4)) {
		if($role1!='' or $role2!='' or $role3!='' or $role4!='') {
			$b=$q;
			$q = "`role` = '$role1' or '$role2' or '$role3' or '$role4'";
			if ($b != '') {
				$q = " AND `role` = '$role1' or '$role2' or '$role3' or '$role4'";
				$c="$b $q";
			} else $c="$q";
			$q=$c;
		}
	}*/
	
	if (isset($role1) or isset($role2) or isset($role3) or isset($role4)) {
		if ($role!='') {
		$b=$q;
		if ($b != '') {
			$q = "AND `role` in ('$role1'";
			$c="$b $q";
		} else { $q = "`role` in ('$role1'"; $c="$q";}
		$q=$c;
		}
		
		if ($role2!='') {
		$b=$q;
		$q = ", '$role2'";
		if ($b != '') {
			$q = ", '$role2'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		
		if ($role3!='') {
		$b=$q;
		$q = ", '$role3'";
		if ($b != '') {
			$q = ", '$role3'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		
		if ($role4!='') {
		$b=$q;
		$q = ", '$role4'";
		if ($b != '') {
			$q = ", '$role4'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		$q="$q)";	
	}
	
	/*if (isset($cel1) or isset($cel2) or isset($cel3) or isset($cel4)) {
		if($cel1!='' or $cel2!='' or $cel3!='' or $cel4!='') {
			$b=$q;
			$q = "`goal` = '$cel1' or '$cel2' or '$cel3' or '$cel4'";
			if ($b != '') {
				$q = " AND `goal` = '$cel1' or '$cel2' or '$cel3' or '$cel4'";
				$c="$b $q";
			} else $c="$q";
			$q=$c;
		}
	}*/
	
	if (isset($cel1) or isset($cel2) or isset($cel3) or isset($cel4)) {
		if ($cel!='') {
		$b=$q;
		if ($b != '') {
			$q = "AND `goal` in ('$cel1'";
			$c="$b $q";
		} else { $q = "`goal` in ('$cel1'"; $c="$q";}
		$q=$c;
		}
		
		if ($cel2!='') {
		$b=$q;
		$q = ", '$cel2'";
		if ($b != '') {
			$q = ", '$cel2'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		
		if ($cel3!='') {
		$b=$q;
		$q = ", '$cel3'";
		if ($b != '') {
			$q = ", '$cel3'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		
		if ($cel4!='') {
		$b=$q;
		$q = ", '$cel4'";
		if ($b != '') {
			$q = ", '$cel4'";
			$c="$b $q";
		} else $c="$q";
		$q=$c;
		}
		$q="$q)";	
	}
	
	print_r($q);
	
	$result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users` WHERE $q");
	
	//$asd = "$login / $lane1 ! $lane2 ! $lane3 ! $lane4 / $firstage / $secondage / $country / $laung / $elo / $cel1 ! $cel2 ! $cel3 ! $cel4 / $role1 ! $role2 ! $role3 ! $role4 / $gametime1 / $gametime2 / $time / $timegame1 / $timegame2";
	//print_r($asd);
} else {
	$result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
	if(!$result['all']) $result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
}

$title = $result['img'][0]['title'];
$content = getTpl('main',$result);