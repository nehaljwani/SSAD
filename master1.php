<?php
include('essential.php');
include('header.php');
include('adminOnly.php'); 
dbconnect();
$a=$_POST['1'];
if($a==="DELETE A COURSE")
{
	header('Location:master2.php');
}
else if($a==="MODIFY A COURSE")
{
	header('Location:master5.php');
}
else
{
	header('Location:master9.php');
}
include("footer.php")?>
