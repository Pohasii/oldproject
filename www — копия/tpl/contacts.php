
<main class="article">
	<div class="wrap">
		<h1><?php echo $result['title'] ?></h1>
		<div class="breadcrumbs">
		<a href="/"><?=t('main');?></a><span> \ </span><span> <?php echo $result['title'] ?></span> 
		</div>
		<article><?php echo $result['content'] ?></article>
		<form action="/p/contacts" method="POST">
			<h2><?=t('feedback form');?></h2>
			<div class="form">
				<input class="email" name="email"	type="text" placeholder="<?=t('email');?>">
				<input class="name"  name="name"	type="text" placeholder="<?=t('your name');?>">
				<label><?=t('message');?></label>
				<textarea name="mess" wrap="soft"></textarea>
			</div>
			<input type="submit" value="<?=t('to send');?>" class="button-submit">
		</form>
	</div>
</main>
