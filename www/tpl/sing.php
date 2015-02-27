<div class="authform">
	<form method="post" action="/authentication" id="authform" name="authform">
		<div class="tittle-forma"> Форма авторизации </div>
		<input name="login" type="text" pattern="[A-Fa-f0-9]{5,20}" autofocus="autofocus"  placeholder="login" required>
		<input name="pass" type="password" pattern="{5,20}" placeholder="password" required>
		<input name="sub" type="submit"  value="Sing in">
	</form>	
	<?=$result['passErrorSingIn'];?>
</div>

<div class="signform">
				<form method="post" action="/authentication">
				<div class="tittle-forma"> Форма регистрации </div>
					<input name="login" type="text" pattern="[A-Fa-f0-9]{5,20}" autofocus="autofocus"   placeholder="login" required onBlur=""><?php if(isset($result['errorlogin'])) echo $result['errorlogin'];?>
					<input name="pass" type="password" pattern="{5,20}"  placeholder="password" required> <?php if(isset($result['errorpass'])) echo $result['errorpass'];?>
					<input name="pass2" type="password" pattern="{5,20}"  placeholder="password" required> <?php if(isset($result['errorpass'])) echo $result['errorpass'];?>
					<input name="email" type="email" autofocus="autofocus" placeholder="e-mail@email.com" required> <?php if(isset($result['erroremail'])) echo $result['erroremail'];?>
					<input name="emailsecond" type="email" autofocus="autofocus" placeholder="e-mail@email.com" required> <?php if(isset($result['notidenticalemail'])) echo $result['notidenticalemail'];?>
					<input name="sub" type="submit" value="Sing up">
				</form>
			</div>
			<?php if(isset($result['ok'])) echo $result['ok'];?>