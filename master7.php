<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
$a=$_POST['a'];
$sql=mysql_query("select distinct Name from Tableme where Code='$a'");
while($row=mysql_fetch_array($sql))
{
	$b=$row['Name'];
}
echo "<script>
function myFunction()
{
	alert('Course Successfully Modified!');
}
</script><center><form action='master8.php?tab=$a&tab1=$b' method='post'>
<h3>Code : <input type='text' value='$a' name=1><br><br>
Name : <input type='text' value='$b' name=2></h3><br>
<input type='submit' onclick=myFunction() value='submit'></form></center>";
include('footer.php');
?>
