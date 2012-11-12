<?php require_once('header.php'); ?>
<div class="post">
<?php echo $boxMsg; ?>
<h2 class="title">ROOM &nbsp; ALLOTMENT &nbsp; PORTAL</h2>
</div>
<div class="post">
<h2 class="title">login</h2>
	<div class="entry">
	<form name="login" method="post" action="login.php">
	<table>	
	<tr>
		<td>Username</td>
		<td><input type="text" name="id"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password"></td>
	</tr>
	</table>
	<input type="submit" name="submit" value="Submit">
	</form>
	</div>
</div>
<?php require_once('footer.php'); ?>
<br/>
