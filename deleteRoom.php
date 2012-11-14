<?php
include("essential.php");
$id=$_GET['SNO'];
$q1="delete from Room_Cat where roomId=".$id;
execute($q1);
$q2="delete from Room where roomId=".$id;
execute($q2);
header("Location:allForm.php?msg='Room deleted'");
?>
