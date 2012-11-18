<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
$a=$_GET['tab'];
$b=$_GET['tab1'];
$c=$_POST['1'];
$d=$_POST['2'];
mysql_query("update CourseRooms set Code='$c',Name='$d' where Code='$a'");
mysql_query("update Tableme set Code='$c',Name='$d' where Code='$a'");
mysql_query("update Tablem set Code='$c',Name='$d' where Code='$a'");
header('Location:master.php');
?>
