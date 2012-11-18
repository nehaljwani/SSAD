<?php
include('essential.php');
include('header.php');
include('adminOnly.php'); 
dbconnect();
include('master5_nocss.php');
$a=$_POST['a'];
echo "
<center>
<h1 id='myBig'><br>SELECT COURSE :<br><br></h1>
<form action='master7.php' method='post'>
";
$sql="select DISTINCT Code,Name from Tableme where Type='$a'";
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
</form>
</center>
";
include("footer.php");
?>
