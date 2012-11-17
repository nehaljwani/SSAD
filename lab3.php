<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
session_start();
$a=$_SESSION['tuttype'];
$b=$_POST['a'];
$_SESSION['tutcode']=$b;
$sql=mysql_query("select DISTINCT Tablem.Name from Tablem,Tableme where Tablem.Code=Tableme.Code and Tablem.Code='$b'");
while($row=mysql_fetch_array($sql))
{
	$c=$row['Name'];
}
$_SESSION['tutname']=$c;
include("footer.php");
header('Location:lab4.php');
?>
