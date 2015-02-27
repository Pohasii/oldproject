<div class="rightbar">	

<div class="rightbar-top10">	
ТОП10 - ADC <hr>
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
ТОП10 - MID <hr>
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
ТОП10 - Jungl <hr>
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