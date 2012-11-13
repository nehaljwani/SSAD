<?php
session_start();
include("header.php");
include("essential.php");
dbconnect();
$saver=1;
$rr=$_SESSION['modtyper'];
$weeks=array('Mon','Tue','Wed','Thu','Fri','Sat');
echo "
<center>
<h1>COURSE TYPE : ".$_SESSION['modtyper']." </h1>
<form action='jjj.php' method=post>
";
$sql1=mysql_query("select * from dassod");
while($row=mysql_fetch_array($sql1))
{
	$code=$row['Code'];
	$name=$row['Name'];
}
echo"
<table>
<tr><td>
<h1 id='myBig'> Code:</h1></td><td><h1 id='capital_mybody'>$code</h1></td><table>";
//echo "Code : <input type='text' value='$code' name='$saver'><br><br>";
$saver++;
echo "<h1 id='myBig'>Name : $name<br></h1>";
//echo "Name : <input type='text' value='$name' name='$saver'><br><br>";
$saver++;
$sql1=mysql_query("select * from dassod");
while($row=mysql_fetch_array($sql1))
{
	$st=$row['StartTime'];
	$et=$row['EndTime'];
	$da=$row['Day'];
	echo "<select name='$saver'>";
	foreach($weeks as $val)
	{
		if($val!=$da)
		{
			echo "
				<option value='$val'>" .$val. "</option>
				";
		}
		else
		{
			echo "
				<option selected='selected' value='$val'>" .$val. "</option>
				";
		}
	}
	$saver++;
	echo "</select>
		<input type='text' value='$st' name='$saver'>
		";
	$saver++;
	echo "<input type='text' value='$et' name='$saver'>";
	$saver++;
	echo "<input type='submit' value='Delete' name='$saver'><br>";
	$saver++;
}
echo "<br><input type='submit' value='Add a Slot' name='$saver'><br>";
$saver++;
echo "<br><input type='submit' value='Submit' name='$saver'><br>";
$_SESSION['realsaver']=$saver;
echo "
</form>
</center>
";
include("footer.php");
?>
