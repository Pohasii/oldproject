	<div class="tab">

			<div class="tabs" align="center">логин</div>
			<div class="tabs" align="center">догин</div>
			<div class="tabs" align="center">фогин</div>
			<div class="tabs" align="center">могин</div>
			<div class="tabs" align="center">слогин</div>

			<?php foreach($result['all'] as $value) { ?>
			<div class="tabss">
			<a href="/user/<?=$value['nic_name'];?>"><div class="tabs" align="center"><?=$value['nic_name']; ?></div>
			<div class="tabs" align="center"><?=$value['email'];?></div>
			<div class="tabs" align="center"><?=$value['aga'];?></div>
			<div class="tabs" align="center"><?=$value['strana'];?></div>
			<div class="tabs" align="center"><?=$value['role'];?></div></a>

			</div>
			<?php } ?> 

	</div>
 