<?php 
//user controller
if (@$action[0]=='') {
	echo '<script>window.location.href = "/" </script>';
} else {
	if(@$action[0]) {
		$result = call("SELECT * FROM `users` WHERE `nic_name`='$action[0]'");
		if(isset($_SESSION["keys"]) and $_SESSION["keys"]==$result[0]['keys'] and $_SESSION["ip"]==$ip){
		$title = $result[0]['title'];
		$content = getTpl('profile',$result[0]/*,$result2*/);
		} else echo '<script>window.location.href = "/" </script>';
	}
}
 ?>