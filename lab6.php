<?php
include("essential.php");
include("header.php");
dbconnect();
session_start();
$a=$_POST['day'];
$b=$_POST['st'];
$c=$_POST['et'];
$d=$_POST['sec'];
$f=$_SESSION['tuttype'];
$e=$_SESSION['tutcode'];
$g=$_SESSION['tutname'];
$_SESSION['tutday']=$a;
$_SESSION['tutst']=$b;
$_SESSION['tutet']=$c;
$_SESSION['tutpr']=$d;
$j=150;
$m=0;
$Rlab=array("TL1","TL2","N131","N125","Science Lab","H203");
$rooms=1;
$arr[0]="***";
while($m<=5)
{
	$flag=0;
	$p=$Rlab[$m];
	$sql2=mysql_query("select * from CourseRooms where Room='$p'");
	while($row1 = mysql_fetch_array($sql2))
	{
		if((($row1['StartTime']>$b and $row1['StartTime']<$c) or ($row1['EndTime']>$b and $row1['EndTime']<$c) or ($row1['StartTime']>=$c and $row1['EndTime']<=$c) or ($row1['StartTime']<=$b and $row1['EndTime']>=$c)) and $row1['Day']===$a)
		{
			$flag=1;
			break;
		}
	}
	if($flag===0)
	{
		$arr[$rooms]=$Rlab[$m];
		$rooms++;
	}
	$m++;
}
echo "
<center>
<h2 id='myBig'>Type :$f<br><br>Code :$e<br>Name :$g<br><br></h2>
<form action='lab7.php' method='post'> ";
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
$sql=mysql_query("select * from CourseRooms where Code='$e' and Study='lab'");
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
echo "<tr><td align='center'>$i</td>
<td align='center' width='$j'>$a</td>
<td align='center' width='$j'>$b</td>
<td align='center' width='$j'>$c</td>
<td align='center' width='$j'><select name='room'>";
for($i=1;$i<$rooms;$i++)
{
	$h=$arr[$i];
	echo "<option value='$h'>$h</option>";
}
echo "
</select></td>
<td align='center' width='$j'>$d</td>
</tr></table>";
echo "
<br><br><input type='submit' value='Allot Lab'>
<form>
</center>
";
include("footer.php");
?>
