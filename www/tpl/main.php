
			<div class="tabs" align="center">логин</div>
			<div class="tabs" align="center">линия</div>
			<div class="tabs" align="center">возраст</div>
			<div class="tabs" align="center">страна</div>
			<div class="tabs" align="center">роль</div>
			
			<div id="content">
			
			<?php foreach($result['all'] as $value) { ?>
			<div class="tabss">
			<a href="/user/<?=$value['nic_name'];?>"><div class="tabs" align="center"><?=$value['nic_name']; ?></div>
			<div class="tabs" align="center"><?=$value['lan'];?></div>
			<div class="tabs" align="center"><?=$value['aga'];?></div>
			<div class="tabs" align="center"><?=$value['strana'];?></div>
			<div class="tabs" align="center"><?=$value['role'];?></div></a>

			</div>
			<?php } ?> 
			</div>
			
<?php for($i=0;$i<50;$i++) {
	$password = md5("user$i");
	$email = "email$i@gmail.ru";
	$name = "name$i";
	$fname = "фамилия$i";
	$skype = "skype$i";
	$aga = rand(12, 35);
	$title = "Я игрок №$i";
	$rating = rand(1000, 3000);
	$time = rand(00, 23);
	$time = "$time:00:00";
	$m = rand(01, 12);
	$d = rand(01, 31);
	$regdate =
	$query="INSERT INTO `users`(`nic_name`, `password`, `email`, `name`, `fname`, `skype`, `aga`, `title`, `rating`, `time`, `regdate`, `needtime`, `needtimetwo`, `strana`, `lang`, `elo`, `server`, `role`, `lan`, `goal`, `I_was_looking_for`, `team`, `fc`, `vk`) 
	VALUES ('user$i','$password','$email','$name','$fname','$skype',$aga,'$title','$rating','$time',[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25],[value-26],[value-27])";
	put($query);
}
 