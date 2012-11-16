<?php
include("essential.php");
$pri=$_POST['id'];
$status=$_POST['status'];
$query="update BugTracker set Status='$status' where BugId=$pri;";
execute($query);
header("Location:all_Bugs.php?msg='Status updated Successfully' & js1=viewBugs & js2=addBugs");

?>

