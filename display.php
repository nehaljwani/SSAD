<?php
include("essential.php");
include("header.php");
session_start();
$num=$_SESSION['coursenum']; ?>

<table align='left'>
<h2 align='left'>lectures</h2><br/>
<tr>
<td><a href="printAllottedRooms.php" id="mybody">View Allotted Rooms</a></td></tr>
</table>
<?php
if($num===0)
{
	echo "
		<center>
		<br/><br/>
	<h2>	ROOMS ARE ALLOCATED TO ALL COURSES SUCCESFULLY!<h2>
		";
}
else
{
	echo "<h2><br/>ROOMS HAVE NOT BEEN ALLOCATED TO THESE COURSES<h2>";

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
//echo "</table></div>";
// if </div> is removed , layout is correct.
echo "</table>";
include("footer.php");
?>
