<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
session_start();
$a=$_GET['tab'];

$val=0;
$sql_60 = mysql_query("select * from Room ");
while($row_60=mysql_fetch_array($sql_60))
{
	$rooms[$val]=$row_60['roomName'];
	$val++;
}

// $rooms=array("SH1","SH2","CR1","CR2","H103","H104","H203","H204","H303","H304","N104","H101","H102","H201","H202","H301","H302","B4-304","B4-301","B6-309","C1-302");

echo "
<html>
<head>
<script>
function myFunction()
{
	alert('ROOMS SUCCESSFULLY CHANGED!');
}
</script>
</head>
<body>
<center>
<br><h2>CHANGE ROOMS :</h2>
<form action='edit4.php?tab=$a' method='post'>
<table border='0'>
<tr>
<th>Code</th>
<th>Name</th>
<th>Previous Room</th>
<th>New Room</th>
</tr><br>
";
for($i=0;$i<$a;$i++)
{
	$code=$_POST[$i];
	$co[$i]=$code;
	$sql=mysql_query("select distinct Name,Room from CourseRooms where Code='$code' and Study='course'");
	while($row=mysql_fetch_array($sql))
	{
		$name=$row['Name'];
		$room=$row['Room'];
	}
	$na[$i]=$name;
	$ro[$i]=$room;
	echo "<tr><td align='center' width=100>$code</td><td align='center' width=500>$name</td>
		<td align='center' width=150>$room</td><td align='center' width=150><select name=$i>";
	foreach($rooms as $val)
	{
		echo "<option value='$val'>$val</option>";
	}
	echo "</select></td></tr>";
}
$_SESSION['editco']=$co;
$_SESSION['editna']=$na;
$_SESSION['editro']=$ro;
echo "
</table>
<br><br><input type='submit' onclick='myFunction()' value='Change'>
</form>
</center>
";
include("footer.php");
?>
