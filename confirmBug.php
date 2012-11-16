<?php
include("essential.php");
$email=$_POST['email'];
$detail=$_POST['bug'];
$status="Pending";
//$query="insert into BugTracker values('','".$email."','".$detail."','".$status."');";
$query="insert into BugTracker values('','".$detail."','".$status."','".$email."');";
execute($query);
header("Location:all_Bugs.php?msg='Bug reported' & js2='addBugs' & js1='viewBugs'");
?>

