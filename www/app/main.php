<?php
//main controller
if ($_POST) {
	$login=$_POST["login"];

	$firstage=$_POST["firstage"];
	$secondage=$_POST["secondage"];
	
	$timegame1=$_POST["timegame1"];
	$timegame2=$_POST["timegame2"];
	
	$server=$_POST["server"];
	
	$result = call("SELECT `id`, `nic_name`, `aga`, `rating`, `time`,  `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal` FROM `users`");

	function sampleArr($result,$samplingunit='',$field=''){
		if(isset($samplingunit)){
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
		} else $result;
		if($result2==FALSE) return FALSE;
		else return $result2;
	}
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
	
	
	$result = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
	$result3 = count($result);
	$result = array_slice($result, 0, 150);
//	if(!$result) $result['all'] = call("SELECT `id`, `nic_name`, `password`, `keys`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `img`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk` FROM `users`");
}

$result2 = call("SELECT * FROM `stats`");
$title = 'main';
$content = getTpl('main',$result,$result2,$resultcounts);