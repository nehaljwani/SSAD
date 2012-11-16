<?php
include('essential.php');
include('header.php');
session_start();
$_SESSION["mod_cou"]=5;
$a=$_POST['a'];
include "modifying_nocss.php";
dbconnect();
echo "
<center>
<br><h1 id='myBig'>SELECT COURSE :</h2><br/>
<form action='hon.php' method='post'>
";
$sql="select DISTINCT Code,Name from CourseRooms where Type='$a'";
$_SESSION['modtype']=$a;
$result = mysql_query($sql);
echo "<select name='a'>";
while ($row = mysql_fetch_array($result)) 
{
	$k=$row['Code']." - ".$row['Name'];
	echo "<option value='" . $row['Code'] . "'>" . $k . "</option>";
}
echo "</select><br><br>";
echo "
<input type='submit' value='Modify'>
<form>
</center>
";
$_SESSION["mod_cou"]=10;
include("footer.php");
?>
