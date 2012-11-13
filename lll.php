<?php
include("essential.php");
dbconnect();
$arr=array("Mon","Tue","Wed","Thu","Fri","Sat");
$i=0;
foreach($arr as $val)
{
	$j=0;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from Rooms where Day='$val' and Type not like 'UG1' and StartTime='08.30'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$j=1;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from Rooms where Day='$val' and Type not like 'UG1' and StartTime='10.00'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$j=2;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from Rooms where Day='$val' and Type not like 'UG1' and StartTime='11.30'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$j=3;
	$ans[$i][$j]='';
	$sql=mysql_query("select Distinct Name,Room from Rooms where Day='$val' and Type not like 'UG1' and StartTime='14.00'");
	while($row=mysql_fetch_array($sql))
	{
		$ans[$i][$j]=$ans[$i][$j].$row['Name']."-"."<b>".$row['Room']."</b>"."<br>";
	}
	$i++;
}
echo "
<html>
<body>
<table border='1' cellspacing='0'>
<tr>
<th>DAY</th>
<th>08.30-09.55</th>
<th>10.00-11.25</th>
<th>11.30-12.55</th>
<th>02.00-03.25</th>
</tr>
";
for($i=0;$i<6;$i++)
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
</table>
</body>
</html>
";
?>
