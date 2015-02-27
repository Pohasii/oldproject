<div class="authform">
	<form method="post" action="/authentication" id="authform" name="authform">
		<div class="tittle-forma"> Форма авторизации </div>
		<input name="login" type="text" autofocus="autofocus"  placeholder="login" required>
		<input name="pass" type="password" placeholder="password" required>
		<input name="sub" type="submit"  value="Sing in">
	</form>	
	<?=$result['passErrorSingIn'];?>
</div>

<div class="signform">
				<form method="post" action="/authentication">
				<div class="tittle-forma"> Форма регистрации </div>
					<input name="login" type="text" autofocus="autofocus"  placeholder="login" required onBlur=""><?php if(isset($result['login'])) echo $result['login'];?>
					<input name="pass" type="password"  placeholder="password" required> <?php if(isset($result['passerror'])) echo $result['passerror'];?>
					<input name="pass2" type="password"  placeholder="password" required> <?php if(isset($result['passerror'])) echo $result['passerror'];?>
					<input name="email" type="text" autofocus="autofocus" placeholder="e-mail@email.com" required> <?php if(isset($result['email'])) echo $result['email'];?>
					<input name="email" type="text" autofocus="autofocus" placeholder="e-mail@email.com" required> <?php if(isset($result['email'])) echo $result['email'];?>
					<input name="sub" type="submit" value="Sing up">
				</form>
			</div>
			<?php if(isset($result['ok'])) echo $result['ok'];?>