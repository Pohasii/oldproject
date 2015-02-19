<main class="article" >
<div class="wrap">
	<h1><?=t('materials');?></h1>
	<div class="list">
		<?php foreach ($result as $value): ?>
			<a href="materials/<?=$value['url']?>"><?=$value['title']?></a>
		<?php endforeach; ?>
	</div>
	<h2><?=t('Useful links');?></h2>
	<div class="list">
		<?php foreach ($result2 as $value): ?>
			<a href="<?=$value['url']?>" target = "_blank"><?=$value['name']?></a>
		<?php endforeach; ?>
	</div>
</div>
</main>