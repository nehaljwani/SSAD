<?php
include("header.php");
session_start();
$num=$_SESSION['coursenum'];
if($num===0)
{
	echo "
		<html>
		<body>
		<center>
	<h2>	ROOMS ARE ALLOCATED TO ALL COURSES SUCCESFULLY!<h2>
		";
}
else
{
	echo "<h2>ROOMS HAVE NOT BEEN ALLOCATED TO THESE COURSES<h2>";

	$codes=$_SESSION['codes'];
	$names=$_SESSION['names'];?>
<div class="post">
<h2 class="title"></h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">CODE</th>
<th scope="col">NAME</th>
</tr>
</thead>
<?php
$i=0;
	while($i<$num)
	{
		$j=$codes[$i];
		$k=$names[$i];
		echo "
			<tr>
			<td>$j</td>
			<td>$k</td>
			</tr>
			";
		$i++;
	}
}
echo "</table></div><br/><br/><br/><br/><br/>";
include("footer.php");
echo "<br/><br/>";
?>
