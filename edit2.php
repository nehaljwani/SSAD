<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
$a=$_POST['number'];
echo "
	<center>
	<form action='edit3.php?tab=$a' method='post'>
	";
$i=0;
while($i<$a)
{
	$sql="select distinct Code,Name,Room from CourseRooms where Study='course' and Type not like 'UG1'";
	$result = mysql_query($sql);
	$j=$i+1;
	echo "Course $j : <select name='$i'>";
	while ($row = mysql_fetch_array($result)) 
	{
		$k=$row['Code']." - ".$row['Name']." - ".$row['Room'];
		echo "<option value='" . $row['Code'] . "'>" . $k . "</option>";
	}
	echo "</select><br><br><br>";
	$i++;
}
echo "
	<br>
	<input type='submit' value='Edit Rooms'>
	</form>
	</center>
	";
include("footer.php");
?>
