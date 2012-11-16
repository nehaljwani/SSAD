<?php
include("essential.php");
include("header.php");
dbconnect();
session_start();
$a=$_GET['tab'];
$b=$_SESSION['editco'];
$c=$_SESSION['editna'];
$d=$_SESSION['editro'];
for($i=0;$i<$a;$i++)
{
	$e=$_POST[$i];
//	echo $b[$i].$c[$i].$d[$i].$e;
	$aa=$b[$i];
	$ss=$d[$i];
	mysql_query("update CourseRooms set Room='$e' where Room='$ss' and Code='$aa' and Study='course'");
}
header('Location:edit1.php');
?>
