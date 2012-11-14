<?php
include("essential.php");
$email=$_POST['email'];
$detail=$_POST['bug'];
$status="Pending";
//$query="insert into BugTracker values('','".$email."','".$detail."','".$status."');";
$query="insert into BugTracker values('','".$detail."','".$status."','".$email."');";
execute($query);
header("Location:reportBug.php?msg='Bug reported'");
?>
