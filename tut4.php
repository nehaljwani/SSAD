<?php
include("essential.php");
include("header.php");
session_start();
$a=$_SESSION['tuttype'];
$b=$_SESSION['tutcode'];
$c=$_SESSION['tutname'];
$i=1;
$j=125;
$flag=0;
$sql=mysql_query("select * from CourseRooms where Code='$b' and Study='tut'");
while($row=mysql_fetch_array($sql))
{
	$flag=1;
}
echo "
<html>
<body>
<center>
<h2 id='myBig'>Type :$a<br><br>Code :$b<br>Name :$c<br><br></h2>
<form action='tut5.php' method='post'> ";
if($flag===1)
{
	echo "
		<table border='0'>
		<tr>
		<th width='$j'>S.No</th>
		<th width='$j'>Day</th>
		<th width='$j'>Start Time</th>
		<th width='$j'>End Time</th>
		<th width='$j'>Room</th>
		<th width='$j'>Section</th>
		</tr>
		";
	$sql=mysql_query("select * from CourseRooms where Code='$b' and Study='tut'");
	while($row=mysql_fetch_array($sql))
	{
		$z1=$row['Day'];
		$z2=$row['StartTime'];
		$z3=$row['EndTime'];
		$z4=$row['Room'];
		$z5=$row['PrevRoom'];
		echo "
			<tr>
			<td width='$j' align='center'>$i</td>
			<td width='$j' align='center'>$z1</td>
			<td width='$j' align='center'>$z2</td>
			<td width='$j' align='center'>$z3</td>
			<td width='$j' align='center'>$z4</td>
			<td width='$j' align='center'>$z5</td>
			<td><input type='submit' value='Edit' name='$i'></td>
			<td><input type='submit' value='Delete' name='$i'></td>
			</tr>";
		$i++;
	}
	echo "</table>";
}
echo "<br><br><input type='submit' value='Add a Tutorial' name='$i'>";
$i++;
$_SESSION['value']=$i;
echo "
</form>
</center>
";
include("footer.php");
?>
