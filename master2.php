<?php
include('essential.php');
include('header.php');
include('adminOnly.php'); 
dbconnect();
echo "
<center>
<h1>DELETE A COURSE<br><br></h1>
<h1 id='myBig'>SELECT TYPE OF COURSE :<br><br></h1>
<form action='master3.php' method='post'>
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
