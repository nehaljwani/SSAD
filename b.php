<?php
$a=$_POST['number'];
include("essential.php");
dbconnect();
include "a.php";
echo "
	<html>
	<head>
	<center>
	<form action='present.php?tab=$a' method='post'>
	";
$i=0;
while($i<$a)
{
	$sql="select DISTINCT Tablem.Code,Tablem.Name from Tablem,Tableme where Tablem.Code=Tableme.Code and Type='UG2'";
	$result = mysql_query($sql);
	$j=$i+1;
	echo "Course $j : <select name='$i'>";
	while ($row = mysql_fetch_array($result)) 
	{
		$k=$row['Code']." - ".$row['Name'];
		echo "<option value='" . $row['Code'] . "'>" . $k . "</option>";
	}
	echo "</select><br>";
	$i++;
}
echo "
	<br>
	<input type='submit' value='Submit'>
	</form>
	</center>
	</head>
	</html>
	";
?>
