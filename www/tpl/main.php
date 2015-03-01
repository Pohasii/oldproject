			<div class=searchformblock style="" id="item1">
			<?php formSearch();?>
			</div>
<div class="tab">
			<div class="litlestats" align="center"> 
			<?php if($result3==1) {
				echo "По вашему запросу найдено: $result3";
			} elseif($result3>1 and $result3<150) {
				echo "По вашему запросу найдено: $result3";
			} else {
				if ($result == FALSE) {
				echo 'Ивините по вашему запросу ничего не найдено';
				} else {
				echo "По вашему запросу найдено: $result3 из них показано 150";
				}
			}
			?></div>
			<div class="tab-headings">
				<div class="tabs" align="center" onBlur="alert('asd')">Логин</div>
				<div class="tabs" align="center" onBlur="alert('asd')">линия</div>
				<div class="tabs" align="center" onBlur="alert('asd')">Возраст</div>
				<div class="tabs" align="center" onBlur="alert('asd')">страна</div>
				<div class="tabs" align="center" onBlur="alert('asd')">роль</div>
			</div>
			<?php if ($result == FALSE) {
				echo 'Ивините по вашему запросу ничего не найдено';
				} else { ?>
			

			<?php foreach($result as $value) { ?>
			<div class="tabss">
				<div class="tab-line">
					<a href="/user/<?=$value['nic_name'];?>">
						<div class="tabs" align="center"><?=$value['nic_name']; ?></div>
						<div class="tabs" align="center"><?=$value['lan'];?></div>
						<div class="tabs" align="center"><?=$value['aga'];?></div>
						<div class="tabs" align="center"><?=$value['strana'];?></div>
						<div class="tabs" align="center"><?=$value['role'];?></div>
					</a>
				</div>
			</div>
				<?php }
				} ?> 
		
		</div>
