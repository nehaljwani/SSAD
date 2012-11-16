<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
session_start();
echo "
<h2>TUTORIALS<br></h2>
<center>
<h1 id='myBig'>SELECT TYPE OF COURSE :<br><br></h1>
<form action='tut2.php' method='post'>
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
include("footer.php");
?>
