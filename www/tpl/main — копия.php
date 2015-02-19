<div class="searchform" id="searchform" >
				<form>
				<a href="#" title="Закрыть" class="close">X</a>
				<input name="" type="text">
				<select name="">  </select>
				<select name="">  </select>
				<select name="">  </select>
				<input name="" type="text">
				<input name="" type="text">
				<select name="">  </select>
				<select name="">  </select>
				<input name="" type="text">
				<input name="" type="text">
				<input name="" type="text">
				<select name="">  </select>
				<select name="">  </select>
				<select name="">  </select>
				</form>
</div>
<div class="content">
	<div class="tab">
		<table border=1>
			<tr>
				<th>логин</th>
				<th>догин</th>
				<th>фогин</th>
				<th>могин</th>
				<th>слогин</th>
			<tr>
			<?php foreach($result['all'] as $value) { ?>
			<tr> 
				<td align=center><a href="/user/<?php echo $value['nic_name'];?>"><?php echo $value['nic_name']; ?></a></td>
				<td align=center><?php echo $value['name']; ?></td>
				<td align=center><?php echo $value['aga']; ?></td>
				<td align=center><?php echo $value['strana']; ?></td>
				<td align=center><?php echo $value['role']; ?></td>
			</tr>
			<?php } ?> 
		</table>
	</div>
	<div class="line"></div>
	<div class="rightbar">fgfffffffffffffffffffffffffffffffff</div>
</div>