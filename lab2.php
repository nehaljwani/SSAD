<?php
include("essential.php");
include("header.php");
dbconnect();
session_start();
include("lab1_nocss.php");
$a=$_POST['a'];
$_SESSION['tuttype']=$a;
echo "
<center>
<br><h2>SELECT COURSE :</h2>
<form action='lab3.php' method='post'>
";
$sql="select DISTINCT Tablem.Code,Tablem.Name,Type,Day,StartTime,EndTime,PrevRoom from Tablem,Tableme where Tablem.Code=Tableme.Code and Type='$a'";
$result = mysql_query($sql);
echo "<select name='a'>";
while ($row = mysql_fetch_array($result)) 
{
	$k=$row['Code']." - ".$row['Name'];
	echo "<option value='" . $row['Code'] . "'>" . $k . "</option>";
}
echo "</select><br><br>";
echo "
<input type='submit' value='Select' />
<form>
</center>
";
include("footer.php");
?>
