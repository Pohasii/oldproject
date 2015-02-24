
			<div class="stats" align="center">У нас
			<div class="litlestats" align="center"> <?=$result2[0]['account'];?> пользователя</div>
			<div class="litlestats" align="center"> из них <?=$result2[0]['chelick'];?> Челенджеры</div>
			<div class="litlestats" align="center"> Керри:<?=$result2[0]['adc'];?></div>
			<div class="litlestats" align="center"> Саппорта:<?=$result2[0]['sup'];?> </div>
			<div class="litlestats" align="center"> Мидера:<?=$result2[0]['mid'];?> </div>
			<div class="litlestats" align="center"> Топера:<?=$result2[0]['top'];?> </div>
			<div class="litlestats" align="center"> Джанглеров:<?=$result2[0]['jungl'];?></div>
			
			</div>
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
			<div id="content">
			
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
			
			<script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#example-1').click(function(){
                    jQuery(this).load('ajax/example.html');                
                }) 
            });
			</script>
			
			<div id="pagingControls"></div>