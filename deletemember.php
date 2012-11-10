<?php
include("essential.php");
dbconnect();
$pri=$_GET['SNO'];
 $query = "DELETE FROM User WHERE userId=$pri";
 execute($query);
header("Location:addUpdateGrp2.php");
?>

