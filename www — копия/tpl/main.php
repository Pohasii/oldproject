<div class="block intro" style="background-image:url(<?=$result['img'][0]['img']?>)">
	<div class="wrap">
		<div class="intr-text">
			<?=$result['img'][0]['content']?>
		</div>
	</div>
	<div class="whiteboard">
		<div class="wrap">
			<div class="subblock x1">
				<h2><?=t('obv')?></h2>
 				<?php foreach($result['adv'] as $value) { ?>
				<?php if($value['status']) { ?>
				<p><span class="gray-adv"><?php echo date_format(date_create($value['date']), 'm.d.y'); ?></span> <?php echo $value['content'];?></p>
 				<?php } } ?> 
			</div>
			
			<div class="subblock x2">
				<h2><?php echo $result['intr'][0]['title']; ?></h2>
				<p><?php echo $result['intr'][0]['content']; ?></p>
			</div>
			
			<div class="subblock x3">
				<h2><?php echo $result['cont'][0]['title']; ?></h2>
				<p><?php echo $result['cont'][0]['content']; ?></p>
			</div>
		</div>
	</div>
</div>
<div class="block-news">
    <div class="wrap">
	<?php foreach($result['news'] as $value) { ?>
        <div class="sub-news" style="background-image:url(<?php echo $value['mainimg']; ?>);">
			<a href="/news/<?php echo $value['url']; ?>">
				<span class="sub-title"><?php echo $value['title'];?></span>
				<span class="sub-anounce"><span class="new-date"><?php echo date_format(date_create($value['date']), 'd.m.y'); ?></span><?php echo $value['intro'];?></span>
			</a>
		</div>
    <?php } ?> 
    </div>
</div>
<div class="map">
	<div class="wrap">
		<article><h2 class="map-h"><?php echo $result['bot'][0]['title']; ?></h2><?php echo $result['bot'][0]['content']; ?> </article>
	</div>
	<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=cdXj-jHKxbV1ooIHoyYhE0_gxbpindmh&height=354"></script>
</div>