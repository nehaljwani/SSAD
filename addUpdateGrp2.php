<?php
include("essential.php");
include("header.php");

$gID = getCurGroup();

if($gID != 2){ 
	        die("You do not have sufficient privileges to access this page");
}


$group=$_POST['Gpname'];
$query = "select * from Groups where groupName='$group' ;";
$rv=execute($query);
if(mysql_num_rows($rv)==0)
{
	        header("Location:addUpdateGrp.php?msg='Group $group  does not exist'");
		die();
}

$name=$_POST['Mname'];
if(empty($name))
{
	        header("Location:addUpdateGrp.php?msg='Name  cannot be empty'");
		die();
}
$Email=$_POST['email'];
if(empty($Email))
{
	        header("Location:addUpdateGrp.php?msg='Email  cannot be empty'");
		die();
}
if (!(filter_var($Email, FILTER_VALIDATE_EMAIL))) {
	        header("Location:addUpdateGrp.php?msg='Email is not valid'");
		die();
}
$query1="select level from Groups where groupName='".$group."';";
//echo $query1;
$level=10;
$result1=execute($query1);
while($row =mysql_fetch_row($result1))
{
	$level =$row[0];
}
$query2="insert into User values('','".$name."','".$Email."',".$level.");";
execute($query2);
header("Location:addUpdateGrp.php");
?>

