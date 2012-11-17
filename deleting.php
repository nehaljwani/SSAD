<?php
include("essential.php");
session_start();
include('header.php');
include("adminOnly.php");
echo "
<center>
<h1>DELETING A COURSE</h1><br/>
<h2 id='mybody''>SELECT TYPE OF COURSE :<br><br></h2>
<form action='try.php' method='post'>
<input type='submit' value='UG1' name='a'>
<input type='submit' value='UG2' name='a'>
<input type='submit' value='PG1' name='a'>
<input type='submit' value='BC' name='a'>
<input type='submit' value='ELECTIVE' name='a'>
</form>
";
echo "
	</center>
	";
if($_SESSION["del_cou"]==10)
{
	echo "<br><br><br><br><br><br><br><br>";
}
	include('footer.php');
?>
