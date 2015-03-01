<div class="rightbar">	
	
	<div class="rightbar-top10">	
		<div class="rightbar-top10-titl" align=center>Статистика</div>

			<div class="stats" align="center">У нас
			<div class="litlestats" align="center"> <?=$statsRight[0]['account'];?> пользователя</div>
			<div class="litlestats" align="center"> из них <?=$statsRight[0]['chelick'];?> Челенджеры</div>
			<div class="litlestats" align="center"> Керри:<?=$statsRight[0]['adc'];?></div>
			<div class="litlestats" align="center"> Саппорта:<?=$statsRight[0]['sup'];?> </div>
			<div class="litlestats" align="center"> Мидера:<?=$statsRight[0]['mid'];?> </div>
			<div class="litlestats" align="center"> Топера:<?=$statsRight[0]['top'];?> </div>
			<div class="litlestats" align="center"> Джанглеров:<?=$statsRight[0]['jungl'];?></div>
			</div>
	</div>
	
	<div class="rightbar-top10">	
		<div class="rightbar-top10-titl" align=center>ТОП10 - ADC</div>

		<?php foreach($rightbarone as $value) { ?>
			<a href="/user/<?=$value['nic_name'];?>">
				<div class="rightbar-top10-str" align="center">
				<div class="rightbar-top10-block" align="center"><?=$value['nic_name']; ?></div>
				<div class="rightbar-top10-block" align="center"><?=$value['rating'];?></div>
				</div>
			</a>
		<?php } ?>
	</div>

	<div class="rightbar-top10">	
		<div class="rightbar-top10-titl" align=center>ТОП10 - MID</div>
		<?php foreach($rightbartwo as $value) { ?>
			<a href="/user/<?=$value['nic_name'];?>">
				<div class="rightbar-top10-str" align="center">
				<div class="rightbar-top10-block" align="center"><?=$value['nic_name']; ?></div>
				<div class="rightbar-top10-block" align="center"><?=$value['rating'];?></div>
				</div>
			</a>
		<?php } ?> 
	</div>

	<div class="rightbar-top10">	
		<div class="rightbar-top10-titl" align=center>ТОП10 - Jungl</div>
		<?php foreach($rightbarsecond as $value) { ?>
			<a href="/user/<?=$value['nic_name'];?>">
				<div class="rightbar-top10-str" align="center">
				<div class="rightbar-top10-block" align="center"><?=$value['nic_name']; ?></div>
				<div class="rightbar-top10-block" align="center"><?=$value['rating'];?></div>
				</div>
			</a>
		<?php } ?> 
		</div>
</div>