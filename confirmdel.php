<?php
include("essential.php");
dbconnect();
$pri=$_GET['SNO'];
 $query = "DELETE FROM Requests WHERE reqNo=$pri";
 execute($query);
header("Location:tabledel.php");
?>

