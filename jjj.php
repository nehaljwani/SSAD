<?php
include('essential.php');
session_start();
dbconnect();
$saver=$_SESSION['realsaver'];
//$code=$_POST['1'];
//$name=$_POST['2'];
$i=1;
$del=0;
while($i<=$saver)
{
	$arr[$i-1]=$_POST[$i];
	if($arr[$i-1]==="Delete")
	{
		$del=$i-1;
	}
	$i++;
}
$i=$del-3;
if($i>0)
{
	while($i<$saver-3)
	{
		$arr[$i]=$arr[$i+4];
		$i++;
	}
	$saver=$saver-4;
}
$code=$_SESSION['patacode'];
$name=$_SESSION['pataname'];
/*$i=0;
while($i<$saver)
{
	echo $i." ".$arr[$i]."<br>";
	$i++;
}*/
mysql_query("delete from dassod");
$i=2;
$k=$saver-6;
while($i<=$k)
{
	$z1=$arr[$i];
	$z2=$arr[$i+1];
	$z3=$arr[$i+2];
	$i=$i+4;
	$z4=$_SESSION['modroom'];
	$z5=$_SESSION['modtyper'];
	$z6=$_SESSION['modpreroom'];
	mysql_query("insert into dassod values ('$code','$name','$z4','$z1','$z2','$z3','$z5','$z6')");
}
if($arr[$saver-2]==="Add a Slot")
{
	mysql_query("insert into dassod values ('$code','$name','$z4','Mon','00.00','00.00','$z5','$z6')");
	header('location:hon1.php');
}
else if($arr[$saver-1]==="Submit")
{
	header('location:star.php');
}
else
{
	header('location:hon1.php');
}
?>
