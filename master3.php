<?php
include('essential.php');
include('header.php');
dbconnect();
include("master2_nocss.php");
echo "<br/>";
$a=$_POST['a'];
echo "
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
";
include("footer.php");
?>
