<?php
include("essential.php");
include("header.php");
$gID = getCurGroup();

if($gID != 2){ 
	        die("You do not have sufficient privileges to access this page");
}

dbconnect();
$pri=$_GET['SNO'];
 $query = "DELETE FROM Requests WHERE reqNo=$pri";
 execute($query);
header("Location:tabledel.php");
?>

