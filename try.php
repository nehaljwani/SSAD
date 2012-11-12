<?php
session_start();
$_SESSION["del_cou"]=5;
$a=$_POST['a'];
include "deleting.php";
include('essential.php');
dbconnect();

echo "
<html>
<head>
<br>
<script>
function myFunction()
{
	alert('COURSE SUCCESSFULLY DELETED!');
}
</script>
</head>
<body>
<center>
<br><h2 id='mybody'>SELECT COURSE :</h2>
<br>
<form action='damn.php' method='post'>
";
$sql="select DISTINCT Code,Name from CourseRooms where Type='$a'";
$result = mysql_query($sql);
echo "<select name='a'>";
while ($row = mysql_fetch_array($result)) 
{
	$k=$row['Code']." - ".$row['Name'];
	echo "<option value='" . $row['Code'] . "'>" . $k . "</option>";
}
echo "</select><br><br>";
echo "
<input type='submit' onclick='myFunction()' value='Delete' />
<form>
</center>
";
$_SESSION["del_cou"]=10;
include("footer.php");
?>
