<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
$b=$_POST['0'];
$c=$_POST['1'];
$d=$_POST['2'];
mysql_query("insert into Tableme values ('$c','$d','$b')");
header('Location:master.php');
?>
