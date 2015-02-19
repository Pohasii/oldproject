
<main class="article" >
<div class="wrap">
	<h1><?php echo $result['title'] ?></h1>
	<div class="breadcrumbs">
		<a href="/"><?=t('main');?></a>
		<span> \ </span>
		<a href="/materials"><?=t('materials');?></a>
		<span> \ </span>
		<span><?php echo $result['title'] ?></span>
	</div>
	<article><?php echo $result['content'] ?></article>
</div>
</main>
