<?php
include "master2.php";
$a=$_POST['a'];
echo "
<html>
<head>
<script>
function myFunction()
{
	alert('COURSE SUCCESSFULLY DELETED!');
}
</script>
</head>
<body>
<center>
<form action='master4.php' method='post'>
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
<input type='submit' onclick='myFunction()' value='Delete'>
</form>
</center>
</body>
</html>
";
?>
