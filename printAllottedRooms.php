<?php
include("essential.php");
include("header.php");
dbconnect();
?>
<h2> Allotted Rooms </h2>
<div class="post">
<h2 class="title"></h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">CODE</th>
<th scope="col">NAME</th>
<th scope="col">TYPE</th>
<th scope="col">DAY</th>
<th scope="col">START-TIME</th>
<th scope="col">END-TIME</th>
<th scope="col">ROOM</th>
</tr>
</thead>
<?php
$result = mysql_query("SELECT * FROM CourseRooms order by Name");
while($row = mysql_fetch_array($result))
{
	$co=$row['Code'];
	$na=$row['Name'];
	$da=$row['Day'];
	$st=$row['StartTime'];
	$et=$row['EndTime'];
	$ro=$row['Room'];
	$ty=$row['Type'];
	echo"
		<tr>
		<td>$co</td>
		<td>$na</td>
		<td>$ty</td>
		<td>$da</td>
		<td>$st</td>
		<td>$et</td>
		<td>$ro</td>
		</tr>";
}
mysql_close($con);
?>
	</table>
	</div>
<?php include("footer.php"); ?>
