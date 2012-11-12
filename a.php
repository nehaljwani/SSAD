<?php
include('header.php');
include('essential.php');
dbconnect();
mysql_select_db("parse", $con);
$sql=mysql_query("select distinct Name from Tablem where PrevRoom='COMMON'");
echo "
<html>
<body>
<center>
<h3>Common courses already added are : <br></h3>
";
$c=0;
while($row=mysql_fetch_array($sql))
{
	$aa=$row['Name'];
	echo "<h3>$aa<br></h3>";
	$c++;
}
if($c===0)
{
	echo "<h3>NONE</h3><br>";
}
echo "
<form action='b.php' method='post'>
<h3>Number Of Common Courses for UG2 : <input type='text' name='number'></h3>
</form>
</center>";
include('footer.php');
?>
