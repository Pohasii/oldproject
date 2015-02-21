<?php 
//user controller
function callt($query) { //SELECT * FROM `ad` WHERE `id`='$id'
	$return;
	$result=mysql_query($query) or $return = FALSE;
	if(mysql_num_rows($result)==0) {
		$return = FALSE;
	} else while($row = mysql_fetch_array($result)) $return[] = $row;
	return $return;
}

if (@$action[0]=='') {
//	echo '<script>window.location.href = "/" </script>';
} else {
	if(@$action[0]) {
	$result = callt("SELECT * FROM `users` WHERE `nic_name`='123123'");
		$content = getTpl('test',$result/*,$result2*/);
	}
}
 ?>