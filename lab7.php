<?php
include("essential.php");
dbconnect();
session_start();
$a=$_SESSION['tutcode'];
$b=$_SESSION['tutname'];
$c=$_POST['room'];
$d=$_SESSION['tutday'];
$e=$_SESSION['tutst'];
$f=$_SESSION['tutet'];
$g=$_SESSION['tuttype'];
$h=$_SESSION['tutpr'];
$hash=sha1(uniqid(mt_rand(), true));
mysql_query("insert into CourseRooms values ('$a','$b','$c','$d','$e','$f','$g','$h','Lab','$hash')");
updateCourse2Instance($a,$b,$c,$d,$e,$f,$g,$h,'Lab',$hash);
header('Location:lab4.php');
?>
