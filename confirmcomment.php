<?php
include("essential.php");
$id=$_POST['id'];
$email=$_POST['email'];
$comment=$_POST['bug'];
$query="insert into BugComments values('',".$id.",'".$comment."','".$email."');";
execute($query);
header("Location:addcomment.php?id=$id & msg='Comment added'");
?>
