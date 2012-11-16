<?php
session_start();
include("essential.php");
include("header.php");
dbconnect();
$a=$_SESSION['tuttype'];
$b=$_SESSION['tutcode'];
$c=$_SESSION['tutname'];
$i=1;
$j=150;
$flag=0;
$weeks=array('Mon','Tue','Wed','Thu','Fri','Sat');
$l=$_SESSION['value'];
for($k=1;$k<$l;$k++)
{
	$g=$_POST[$k];
	if($g==="Delete" or $g==="Edit" or $g==="Add a Lab")
	{
		break;
	}
}
if($g==="Delete")
{
	$i=1;
	$sql=mysql_query("select * from CourseRooms where Code='$b' and Study='Lab'");
	while($row=mysql_fetch_array($sql))
	{
		if($k===$i)
		{
			$z1=$row['Day'];
			$z2=$row['StartTime'];
			$z3=$row['EndTime'];
			$z4=$row['Room'];

			$sql1=mysql_query("select hash from CourseRooms where Code='$b' and Day='$z1' and StartTime='$z2' and EndTime='$z3' and Room='$z4'");
			$row1 = mysql_fetch_array($sql1);
			$delhash = $row1['hash'];
			delCourse2InstanceSingle($delhash);

			mysql_query("delete from CourseRooms where Code='$b' and Day='$z1' and StartTime='$z2' and EndTime='$z3' and Room='$z4'");
			header('Location:lab4.php');
			break;
		}
		$i++;
	}
}
if($g==="Edit")
{
	$i=1;
	$sql=mysql_query("select * from CourseRooms where Code='$b' and Study='Lab'");
	while($row=mysql_fetch_array($sql))
	{
		if($k===$i)
		{
			$z11=$row['Day'];
			$z12=$row['StartTime'];
			$z13=$row['EndTime'];
			$z14=$row['Room'];
			$z15=$row['PrevRoom'];

			$sql1=mysql_query("select hash from CourseRooms where Code='$b' and Day='$z1' and StartTime='$z2' and EndTime='$z3' and Room='$z4'");
			$row1 = mysql_fetch_array($sql1);
			$delhash = $row1['hash'];
			delCourse2InstanceSingle($delhash);

			mysql_query("delete from CourseRooms where Code='$b' and Day='$z11' and StartTime='$z12' and EndTime='$z13' and Room='$z14'");
		}
		$flag=1;
		$i++;
	}
	echo "
		<html>
		<body>
		<center>
		<h2 id='myBig'>Type :$a<br><br>Code :$b<br>Name :$c<br><br></h2>
		<form action='lab6.php' method='post'> ";
	if($flag===1)
	{
		echo "
			<table border='0'>
			<tr>
			<th width='$j'>S.No</th>
			<th width='$j'>Day</th>
			<th width='$j'>Start Time</th>
			<th width='$j'>End Time</th>
			<th width='$j'>Lab</th>
			<th width='$j'>Section</th>
			</tr>
			";
		$i=1;
		$sql=mysql_query("select * from CourseRooms where Code='$b' and Study='Lab'");
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
				</tr>";
			$i++;
		}
//		echo "</table>";
	}
	echo "<tr><td align='center'>$i</td>";
	echo "
	<td align='center'>	<select name='day'> ";
	foreach($weeks as $val)
	{
		if($val!=$z11)
		{
			echo "
				<option value='$val'>" .$val. "</option>
				";
		}
		else
		{
			echo "
				<option selected='selected' value='$val'>" .$val. "</option>
				";
		}
	}
	echo "
		</td></select>
		<td align='center'><input type='text' value='$z12' name='st' size=1></td>
		<td align='center'><input type='text' value='$z13' name='et' size=1></td>
		<td align='center'><select></select></td>
		<td align='center'><input type='text' value='$z15' name='sec' size=1></td>
		</tr></table>
		<br><br><input type='submit' value='Check Labs'>";
}
if($g==="Add a Lab")
{
	echo "
		<html>
		<body>
		<center>
		<h2 id='myBig'>Type :$a<br><br>Code :$b<br>Name :$c<br><br></h2>
		<form action='lab6.php' method='post'> ";
		echo "
			<table border='0'>
			<tr>
			<th width='$j'>S.No</th>
			<th width='$j'>Day</th>
			<th width='$j'>Start Time</th>
			<th width='$j'>End Time</th>
			<th width='$j'>Lab</th>
			<th width='$j'>Section</th>
			</tr>
			";
		$i=1;
		$sql=mysql_query("select * from CourseRooms where Code='$b' and Study='Lab'");
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
				</tr>";
			$i++;
		}
	echo "<tr><td align='center'>$i</td>";
	echo "
	<td align='center'>	<select name='day'> ";
	foreach($weeks as $val)
	{
			echo "
				<option value='$val'>" .$val. "</option>
				";
	}
	echo "
		</td></select>
		<td align='center'><input type='text' value='00.00' name='st' size=1></td>
		<td align='center'><input type='text' value='00.00' name='et' size=1></td>
		<td align='center'><select></select></td>
		<td align='center'><input type='text' value='NONE' name='sec' size=1></td>
		</tr></table>
		<br><br><input type='submit' value='Check Labs'>";
}
echo "
</form>
</center>
";
include("footer.php");
?>
