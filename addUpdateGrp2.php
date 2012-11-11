<?php
include("essential.php");
$group=$_POST['Gpname'];
$query = "select * from Groups where groupName='$group' ;";
$rv=execute($query);
if(mysql_num_rows($rv)==0)
{
	        header("Location:addUpdateGrp.php?msg='Group $group  does not exist'");
		die();
}
$name=$_POST['Mname'];
$Email=$_POST['email'];
$query1="select level from Groups where groupName='".$group."';";
//echo $query1;
$level=10;
$result1=execute($query1);
while($row =mysql_fetch_row($result1))
{
	$level =$row[0];
}
$query2="insert into User values('','".$name."','','".$Email."',".$level.");";
execute($query2);
header("Location:addUpdateGrp.php");
?>

