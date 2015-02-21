<?php 
//user controller
if (@$action[0]=='') {
	echo '<script>window.location.href = "/" </script>';
} else {
	if(@$action[0]) {
	$result = call("SELECT * FROM `users` WHERE `nic_name`='$action[0]'");

		$title = $result[0]['title'];
		$content = getTpl('profile',$result[0]/*,$result2*/);
	}
}
 ?>