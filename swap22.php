<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
session_start();
//include "swap1.php";
$flag=0;
$c1=$_POST['0'];
$c2=$_POST['1'];
$sql1=mysql_query("select distinct Room from CourseRooms where Code='$c1' and Study='course'");
while($row=mysql_fetch_array($sql1))
{
	$p1=$row['Room'];
}
$sql=mysql_query("select * from CourseRooms where Code='$c2' and Study='course'");
while($row=mysql_fetch_array($sql))
{
	$b=$row['StartTime'];
	$c=$row['EndTime'];
	$a=$row['Day'];
//	echo "1".$row['Code']." ".$a." ".$b." ".$c."<br>";
	$sql2=mysql_query("select * from CourseRooms where Room='$p1' and Code not like '$c1' and Study='course'");
	while($row1 = mysql_fetch_array($sql2))
	{
//		echo "2".$row1['Code']." ".$row1['Day']." ".$row1['StartTime']." ".$row1['EndTime']."<br>";
		if((($row1['StartTime']>$b and $row1['StartTime']<$c) or ($row1['EndTime']>$b and $row1['EndTime']<$c) or ($row1['StartTime']>=$c and $row1['EndTime']<=$c) or ($row1['StartTime']<=$b and $row1['EndTime']>=$c)) and $row1['Day']===$a)
		{
			$flag=1;
			break;
		}
	}
}
$sql1=mysql_query("select distinct Room from CourseRooms where Code='$c2' and Study='course'");
while($row=mysql_fetch_array($sql1))
{
	$p2=$row['Room'];
}
$sql=mysql_query("select * from CourseRooms where Code='$c1' and Study='course'");
while($row=mysql_fetch_array($sql))
{
	$b=$row['StartTime'];
	$c=$row['EndTime'];
	$a=$row['Day'];
	$sql2=mysql_query("select * from CourseRooms where Room='$p2' and Code not like '$c2' and Study='course'");
	while($row1 = mysql_fetch_array($sql2))
	{
		if((($row1['StartTime']>$b and $row1['StartTime']<$c) or ($row1['EndTime']>$b and $row1['EndTime']<$c) or ($row1['StartTime']>=$c and $row1['EndTime']<=$c) or ($row1['StartTime']<=$b and $row1['EndTime']>=$c)) and $row1['Day']===$a)
		{
			$flag=1;
			break;
		}
	}
}
$_SESSION['room1']=$p1;
$_SESSION['room2']=$p2;
$_SESSION['code1']=$c1;
$_SESSION['code2']=$c2;
if($flag===0)
{
	mysql_query("update CourseRooms set Room='$p1' where Code='$c2' and Study='course'");
	mysql_query("update CourseRooms set Room='$p2' where Code='$c1' and Study='course'");
	echo "<script>alert('ROOMS SUCCESSFULLY SWAPPED!');
	window.location='swap1.php';
		</script>";
}
else
{
	echo "<center><h1 id='myBig'>CLASHES OCCUR!<br><br>STILL CONTINUE?<br><br>
		<form action='swap3.php' method='post'>
		<input type='submit' value='YES' name=1>
		<input type='submit' value='NO' name=1></h2></center>
		";
}
include("footer.php");
?>
