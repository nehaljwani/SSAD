<?php
include("essential.php");
session_start();
$code=$_POST['a'];
dbconnect();
	$sql2="CREATE TABLE dassod
	(
	 Code varchar(10),
	 Name varchar(100),
	 Room varchar(10),
	 Day varchar(10),
	 StartTime varchar(10),
	 EndTime varchar(10),
	 Type varchar(10),
	 PrevRoom varchar(10)
	)
	";
	execute($sql2);
	$sql1=mysql_query("select * from CourseRooms where Code='$code'");
if($code==="UG1" or $code==="UG2" or $code==="PG1" or $code==="BC" or $code==="ELECTIVE")
{
	$_SESSION['modtyper']=$code;
	$_SESSION['pataroom']="ab";
	$_SESSION['patacode']="ab";
}
while($row=mysql_fetch_array($sql1))
{
	$z1=$row['Code'];
	$_SESSION['patacode']=$z1;
	$_SESSION['pataname']=$z2;
	$z2=$row['Name'];
	$z3=$row['Room'];
	$_SESSION['pataroom']=$z3;
	$_SESSION['modroom']=$z3;
	$z4=$row['Day'];
	$z5=$row['StartTime'];
	$z6=$row['EndTime'];
	$z7=$row['Type'];
	$_SESSION['modtyper']=$z7;
	$code = $z7;
	$z8=$row['PrevRoom'];
	$_SESSION['modpreroom']=$z8;
	mysql_query("insert into dassod values ('$z1','$z2','$z3','$z4','$z5','$z6','$z7','$z8') ");
}
header("location:hon1.php");
mysql_close($con);
?>
