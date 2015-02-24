<?php
//main controller
if ($_POST) {
	
	$login=$_POST["login"];
	$login=che($login);
	if(isset($_POST["login"]) && $_POST["login"]!=NULL){
	$result = call("SELECT `id`, `nic_name`, `aga`, `rating`, `time`,  `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal` FROM `users` WHERE `nic_name`='$login'");
	} else $result = call("SELECT `id`, `nic_name`, `aga`, `rating`, `time`,  `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal` FROM `users`");
	
	function sampleArrSeccondTime($result,$samplingunit='',$samplingUnitSeccond='',$field='',$field2=''){
		$resultcount = count($result);
		if(isset($samplingunit) && $samplingunit!=NULL) {
			for($i=0;$i<$resultcount;$i++){
				if($result[$i][$field]>=$samplingunit){
						$result2[$i]=$result[$i];
				}
			}
		} else $q=1;
		if(isset($samplingUnitSeccond) && $samplingUnitSeccond!=NULL){
			for($i=0;$i<$resultcount;$i++){
				if($result[$i][$field2]<=$samplingUnitSeccond){
						$result2[$i]=$result[$i];
				}
			}	
		} else $w=1;
		if($q+$w==2) {
			return $result;
		} else {
		unset($result);
		unset($resultcount);
		if($result2==FALSE) return FALSE;
		else return $result2;
		}
	}
	
	function sampleArrSeccond($result,$samplingunit='',$field='',$samplingUnitSeccond=''){
		$resultcount = count($result);
		if(isset($samplingunit) && $samplingunit!=NULL) {
			for($i=0;$i<$resultcount;$i++){
				if($result[$i][$field]>=$samplingunit){
						$result2[$i]=$result[$i];
				}
			}
		} $q=1;
		if(isset($samplingUnitSeccond) && $samplingUnitSeccond!=NULL){
			for($i=0;$i<$resultcount;$i++){
				if($result[$i][$field]<=$samplingUnitSeccond){
						$result2[$i]=$result[$i];
				}
			}	
		} $w=1;
		if($q+$w==2) {
			return $result;
		} else {
		unset($result);
		unset($resultcount);
		if($result2==FALSE) return FALSE;
		else return $result2;
		}
	}
	
	function sampleArr($result,$samplingunit='',$field=''){
		if(isset($samplingunit) && $samplingunit!=0){
		$counts = count($samplingunit);
		$resultcount = count($result);
			for($j=0;$j<$counts;$j++){
				for($i=0;$i<$resultcount;$i++){
					if($result[$i][$field]==$samplingunit[$j]){
						$result2[$i]=$result[$i];
					}
				}
			}
		unset($result);
		unset($resultcount);
		} else return $result;
		if($result2==FALSE) return FALSE;
		else return $result2;
	}
	$result = sampleArrSeccond($result, $_POST["firstage"], 'aga', $_POST["secondage"]);
	$result = sampleArrSeccondTime($result,$_POST["timegame1"],$_POST["timegame2"],'needtime','needtimetwo');
	$result = sampleArr($result,$_POST["lane"],'lan');
	$result = sampleArr($result,$_POST["goal"],'goal');
	$result = sampleArr($result,$_POST["role"],'role');
	$result = sampleArr($result,$_POST["country"],'strana');
	$result = sampleArr($result,$_POST["language"],'lang');
	$result = sampleArr($result,$_POST["division"],'elo');
	$result = sampleArr($result,$_POST["server"],'server');
	$result3 = count($result);
	$result = array_slice($result, 0, 150);
} else {
	$result = call("SELECT `id`, `nic_name`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
	$result3 = count($result);
	$result = array_slice($result, 0, 150);
//	if(!$result) $result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
}

$result2 = call("SELECT * FROM `stats`");
$title = 'main';
$content = getTpl('main',$result,$result2,$result3);