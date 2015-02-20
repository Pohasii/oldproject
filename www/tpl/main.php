	<div class="tab">

			<div class="tabs" align="center">логин</div>
			<div class="tabs" align="center">линия</div>
			<div class="tabs" align="center">возраст</div>
			<div class="tabs" align="center">страна</div>
			<div class="tabs" align="center">роль</div>

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
	<div class="resetsearch"><a href="/"><img src="img/reset.png"></a></div>
 