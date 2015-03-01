<div class="rightbar">	
	
	<div class="rightbar-top10">	
		<div class="rightbar-top10-titl" align=center>Статистика</div>

			<div class="stats" align="center">
			<div class="rightbar-top10-str" align="center"> <?=$statsRight[0]['account'];?> пользователей</div>
			<div class="rightbar-top10-str" align="center"> <?=$statsRight[0]['chelick'];?> Челенджера</div>
			<div class="rightbar-top10-str" align="center"> Керри:<?=$statsRight[0]['adc'];?></div>
			<div class="rightbar-top10-str" align="center"> Саппорта:<?=$statsRight[0]['sup'];?> </div>
			<div class="rightbar-top10-str" align="center"> Мидера:<?=$statsRight[0]['mid'];?> </div>
			<div class="rightbar-top10-str" align="center"> Топера:<?=$statsRight[0]['top'];?> </div>
			<div class="rightbar-top10-str" align="center"> Джанглеров:<?=$statsRight[0]['jungl'];?></div>
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