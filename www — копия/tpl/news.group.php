<main class="article">
<div class="wrap">
    <div class="new-block-head">
		<h1 class="h1"><?=t('news');?></h1>
		<p class="sort"><?=t('grouping by');?><a class="new-block-head-pad"href="/news/group/date"><?=t('date');?></a><span> \ </span><a href="/news/group"><?=t('topic');?></a></p>
	</div>
    <div class="news_blocks"> 
		<?php foreach($result2 as $group) { ?>
			<div class="new-block-tidings-group">
				<div class="news-date">
					<span class="sub-date"><?php echo $group['name']; echo $group['YEAR(`date`)'];?></span>
				</div>	
				<div class="news-groups">
					<?php foreach($result as $value) { if( ( $group[0]==substr($value['date'], 0, 4) || $group[0]==$value['tagID'] ) ) { ?>
						<div class="sub-news" style="background-image:url(<?php echo $value['mainimg']; ?>);">
							<a href="/news/<?php echo $value['url']; ?>">
								<span class="sub-title"><?php echo $value['title'];?></span>
								<span class="sub-anounce"><span class="new-date"><?php echo date_format(date_create($value['date']), 'd.m.y'); ?></span><?php echo $value['intro'];?></span>
							</a>
						</div>
					<?php }} ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
</main>

