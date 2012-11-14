<?php require_once('essential.php'); ?>
<?php require_once('header.php'); ?>
<div class="post">
<?php echo $boxMsg; ?>
<h2 class="title">ROOM &nbsp; ALLOTMENT &nbsp; PORTAL</h2>
</div>
<div class="post">
	<div class="entry">
	<!--form name="login" method="post" action="login.php">
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
	</form-->
	Welcome to Room Allocation Portal. <br /><br />You are logged in as <?php echo phpCAS::getUser(); ?>. <a href="?logout=true">Click here</a> to logout. <br /><br />Otherwise, click on the navigation links at the top or side to browse the portal. In case of any suggestions, queries, or bugs, contact us at ra_ssad@googlegroups.com.
	</div>
</div>
<?php require_once('footer.php'); ?>
<br/>
