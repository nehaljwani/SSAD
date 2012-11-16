<?php
include("essential.php");
$id=mysql_real_escape_string($_POST['id']);
$email=mysql_real_escape_string($_POST['email']);
$comment=mysql_real_escape_string($_POST['bug']);
$query="insert into BugComments values('',".$id.",'".$comment."','".$email."');";
execute($query);
 header("Location:addcomment.php?msg='Comment added' & js1='viewBugs' & js2='addBugs' & id=$id");

?>
