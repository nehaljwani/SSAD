<?php
require("header.php");
session_start();
include('essential.php');
dbconnect();
echo "
<center>
";
$a=$_SESSION['god1'];
$b=$_SESSION['dev1'];
$i=0;
while($i<$a)
{
	$x1=$b[$i];
	$x2=$b[$i+1];
	$x3=$_POST[$i];
	$x4=$_POST[$i+1];
	$x5=$_POST[$i+2];
	$x6=$b[$i+2];
	mysql_query("insert into Tablem values ('$x1','$x2','$x3','$x4','$x5','$x6')");
	$i=$i+3;
}
echo "
<br>
<form action='present.php' method='post'>
<input type='submit' value='check clashes again'>
</form>
<br>
<br>
<form action='a.php' method='post'>
<input type='submit' value='Add common courses for UG2'>
</form>
</center>
";
echo "<br/><br/><br/><br/>
<br/><br/><br/><br/>";
include("footer.php");
?>
