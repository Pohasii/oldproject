				<div class="user-info">
					<div class="user-avatar">
						<div class="">
							<?php if ($result['img']==NULL){$scr='avatar.png';} else $scr=$result; ?>
							<div><img src="/img/<?=$scr;?>"></img></div>
						</div>
					</div>
						<div class="info-block">
						<div class="personal-menu">
							<ul>
								<li><a class="but1" href="#pers">Личное</a></li>
								<li><a class="but2" href="#game">Игра</li>
								<li><a class="but3" href="#cont">Контакты</li>
							</ul>
						</div>
						<div class="personal-info" id="pers">
							<div class="user-lines">
								<label class="user-label">ник</label>
								<div class="user-divider"><?=$result['nic_name']; ?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">имя</label>
								<div class="user-divider"><?=$result['name'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">фамилия</label>
								<div class="user-divider"><?=$result['fname'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">возраст</label>
								<div class="user-divider"><?=$result['aga'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">титле</label>
								<div class="user-divider"><?=$result['title']; ?></div>
							</div>
						</div>
						<div class="game-info">
							<div class="user-lines">
								<label class="user-label">рейтинг</label>
								<div class="user-divider"><?=$result['rating'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">часовой пояс</label>
								<div class="user-divider"><?=$result['time'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">дата регистрации</label>
								<div class="user-divider"><?=$result['regdate'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">с какого времени играю</label>
								<div class="user-divider"><?=$result['needtime'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">по какое время играю</label>
								<div class="user-divider"><?=$result['needtimetwo']; ?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">страна</label>
								<div class="user-divider"><?=$result['strana'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">язык</label>
								<div class="user-divider"><?=$result['lang'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">ранг</label>
								<div class="user-divider"><?=$result['elo'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">сервер</label>
								<div class="user-divider"><?=$result['server'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">роль</label>
								<div class="user-divider"><?=$result['role'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">линия</label>
								<div class="user-divider"><?=$result['lan']; ?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">кого ищу</label>
								<div class="user-divider"><?=$result['goal'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">я ищу</label>
								<div class="user-divider"><?=$result['I_was_looking_for'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">команда</label>
								<div class="user-divider"><?=$result['team'];?></div>
							</div>
						</div>
						<div class="contacts">
							<div class="user-lines email">
								<label class="user-label">почта</label>
								<div class="user-divider"><?=$result['email'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">скайп</label>
								<div class="user-divider"><?=$result['skype'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">фейсбук</label>
								<div class="user-divider"><?=$result['fc'];?></div>
							</div>
							<div class="user-lines">
								<label class="user-label">вконтакте</label>
								<div class="user-divider"><?=$result['vk'];?></div>
							</div>
						</div>
				</div>
			</div>

 