<?php
//main controller
if ($_POST) {
	
} else {
	echo '<script>window.location.href = "/" </script>';
}

$result2 = call("SELECT * FROM `stats`");
$title = 'authentication';
$content = getTpl('authentication',$result,$result2,$result3);