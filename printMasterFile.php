<?php
include("essential.php");
include("header.php");
dbconnect();
?>
<h2> Master-File: </h2>
<div class="post">
<h2 class="title"></h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">CODE</th>
<th scope="col">NAME</th>
<th scope="col">TYPE</th>
</tr>
</thead>
<?php
$result = mysql_query("SELECT * FROM Tableme order by Name");
while($row = mysql_fetch_array($result))
{
	$co=$row['Code'];
	$na=$row['Name'];
	$ty=$row['Type'];
	echo"
		<tr>
		<td>$co</td>
		<td>$na</td>
		<td>$ty</td>
		</tr>";
}
mysql_close($con);
?>
	</table>
	</div>
<?php include("footer.php"); ?>
