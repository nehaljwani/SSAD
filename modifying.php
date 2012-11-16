<?php
include("essential.php");
session_start();
include('header.php');
echo "
<center>
<h1>MODIFYING A COURSE<br><br></h1>
<h2 id='myBig'>SELECT TYPE OF COURSE :<br><br></h2>
<form action='mopl.php' method='post'>
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
if($_SESSION["mod_cou"]==10)
{
	echo "<br><br><br><br><br><br>";
	include('footer.php');
}
?>
