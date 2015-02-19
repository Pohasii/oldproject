<div class="searchform" id="searchform" >
				<form>
				<a href="#" title="Закрыть" class="close">X</a>
				<input name="" type="text">
				<select name="">  </select>
				<select name="">  </select>
				<select name="">  </select>
				<input name="" type="text">
				<input name="" type="text">
				<select name="">  </select>
				<select name="">  </select>
				<input name="" type="text">
				<input name="" type="text">
				<input name="" type="text">
				<select name="">  </select>
				<select name="">  </select>
				<select name="">  </select>
				</form>
</div>
<div class="content">
	<div class="tab">
		<table border=1>
			<tr>
				<div class="tabs" align="center">логин</div>
				<div class="tabs" align="center">догин</div>
				<div class="tabs" align="center">фогин</div>
				<div class="tabs" align="center">могин</div>
				<div class="tabs" align="center">слогин</div>
			<tr>
			<?php foreach($result['all'] as $value) { ?>
			<tr> 
				<a href="/user/<?=$value['nic_name'];?>"><div class="tabs" align="center"><?=$value['nic_name']; ?></div>
				<div class="tabs" align="center"><?=$value['name'];?></div>
				<div class="tabs" align="center"><?=$value['aga'];?></div>
				<div class="tabs" align="center"><?=$value['strana'];?></div>
				<div class="tabs" align="center"><?=$value['role'];?></div></a>
			</tr>
			<?php } ?> 
		</table>
	</div>
	<div class="line"></div>
	<div class="rightbar">fgfffffffffffffffffffffffffffffffff</div>
</div>