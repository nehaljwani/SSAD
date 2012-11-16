<?php
include("essential.php");
include("header.php");
dbconnect();
session_start();
$a=$_POST['1'];
if($a==="NO")
{
	echo "<script>alert('ROOMS REMAIN SAME!');
	window.location='swap1.php';
	</script>";
}
else
{
	$p1=$_SESSION['room1'];
	$p2=$_SESSION['room2'];
	$c1=$_SESSION['code1'];
	$c2=$_SESSION['code2'];
	mysql_query("update CourseRooms set Room='$p1' where Code='$c2' and Study='course'");
	mysql_query("update CourseRooms set Room='$p2' where Code='$c1' and Study='course'");
	echo "<script>alert('ROOMS SUCCESSFULLY SWAPPED!');
	window.location='swap1.php';
	</script>";
}
?>
