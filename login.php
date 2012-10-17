
<?php require_once('essential.php'); ?>

<?php

if(isset($_POST['id']))
{
	$boxMsg = "";
	dbconnect();
	$query = "select password, level from User where email = \"{$_POST['id']}\"";
	$result = execute($query);
	$array = mysql_fetch_row($result);
	if($array[0] == $_POST['password']){
		$boxMsg = "Login successful";
		session_start();
		$_SESSION['username'] = $_POST['id'];
		$_SESSION['level'] = $array[1];
	}
}
print_r($_SESSION);
?>
<?php 
if(isset($_SESSION['username'])){
	header("Location: table.php");
}
?>
<?php require_once('header.php'); ?>
<div class="post">
<?php echo $boxMsg; ?>
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
