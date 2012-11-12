<?php
session_start();
include('essential.php');
dbconnect();

$a=$_POST['1'];
$sql=mysql_query("select * from dassod");
while($row=mysql_fetch_array($sql))
{
	$z1=$row['Code'];
	$z2=$row['Name'];
	$z3=$a;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7=$row['Type'];
	$z8=$row['PrevRoom'];
	mysql_query("insert into CourseRooms values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8') ");
	mysql_query("insert into Tablem values ('$z1','$z2','$z4','$z5','$z6','$z8')");
	mysql_query("insert into Tableme values ('$z1','$z2','$z7') ");
}
mysql_query("drop table dassod");
header('Location:courses.php');
?>
