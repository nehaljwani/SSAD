<?php
include('essential.php');
include('header.php');
include('adminOnly.php'); 
$a=$_POST['a'];
mysql_query("delete from CourseRooms where Code='$a'");
mysql_query("delete from Tablem where Code='$a'");
mysql_query("delete from Tableme where Code='$a'");
header('Location:master.php');
include("footer.php");
?>
