<?php
include("essential.php");
dbconnect();
$arr=array("Mon","Tue","Wed","Thu","Fri","Sat");
$i=0;
foreach($arr as $val)
{
	$j=0;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from CourseRooms where Day='$val' and Type not like 'UG1' and StartTime='08.30'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$j=1;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from CourseRooms where Day='$val' and Type not like 'UG1' and StartTime='10.00'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$j=2;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from CourseRooms where Day='$val' and Type not like 'UG1' and StartTime='11.30'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$j=3;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from CourseRooms where Day='$val' and Type not like 'UG1' and StartTime='14.00'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$i++;
}
echo "
<html>
<body>
<font=10>
<table border='1' cellspacing='0'>
<tr>
<th height='50'>DAY<br></th>
<th>08.30 AM - 09.55 AM<br></th>
<th>10.00 AM - 11.25 AM<br></th>
<th>11.30 AM - 12.55 PM<br></th>
<th>02.00 PM - 03.25 PM<br></th>
</tr>
";
for($i=0;$i<3;$i++)
{
	$h=$arr[$i];
	echo "<tr><td>$h</td>";
	for($j=0;$j<4;$j++)
	{
		echo "<td>".$ans[$i][$j]."</td>";
	}
	echo "</tr>";
}
echo "
</table><b><br><br>
<div style='color:#0000FF'>
LUNCH: 01.00-02.00</div><br>
Class Rooms: N104 in Nilgiri Building<br>
Class Rooms: SH1, SH2, CR1, CR2, B4-301, B4-304, B6-309 in Vindhya Building<br>
Class Rooms: H101,H102,H103,H104,H201,H202,H203,H204,H301,H302,H303,H304 in Himalaya Building<br><br><br><br><br><br><br><br><br><br></b>
";
echo "
<table border='1' cellspacing='0'>
<tr>
<th height='50'>DAY</th>
<th>08.30 AM - 09.55 AM</th>
<th>10.00 AM - 11.25 AM</th>
<th>11.30 AM - 12.55 PM</th>
<th>02.00 PM - 03.25 PM</th>
</tr>
";
for($i=3;$i<6;$i++)
{
	$h=$arr[$i];
	echo "<tr><td>$h</td>";
	for($j=0;$j<4;$j++)
	{
		echo "<td>".$ans[$i][$j]."</td>";
	}
	echo "</tr>";
}
echo "
</table><b><br>
<div style='color:#0000FF'>
LUNCH: 01.00-02.00</div><br>
Class Rooms: N104 in Nilgiri Building<br>
Class Rooms: SH1, SH2, CR1, CR2, B4-301, B4-304, B6-309 in Vindhya Building<br>
Class Rooms: H101,H102,H103,H104,H201,H202,H203,H204,H301,H302,H303,H304 in Himalaya Building
</font>
</body>
</html>
";
?>
