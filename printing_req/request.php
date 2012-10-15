<!DOCTYPE html>
<html>
<head>
<style type="text/css">
<!--
@import url("style.css"); 
-->
</style>
</head>
<body>
<?php
include("essential.php");     //include for dbconnect and paginate function
if(isset($_GET['st']))
    $mstart=$_GET['st'];      
else
    $mstart=0;
$lim=1;
$table="Requests";
dbconnect();          //connecting db
$query="SELECT reqNo,creator,room,eventTitle,reqDate,eventStartTime,reqType FROM $table"; //select table
$result=paginate("all.php",$query,$mstart,$lim);             //calling paging
$num=mysql_numrows($result);
?>
<table id="box-table-a">                        
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Creator</th>
<th scope="col">Room</th>
<th scope="col">Event</th>
<th scope="col">Date</th>
<th scope="col">Time</th>
<th scope="col">Type</th>
</tr>
</thead>
<tbody>
<?php
while ($row=mysql_fetch_row($result)){                 //fetching rows from result query
	?>
		<tr>
		<?php
		$i=0;
		foreach($row as $col){        //for columns printing purposes
			?>
		<td><?php echo $col; echo " "; ?></td>
		<?php
		$i++;
}
?>
</tr>
<?php
}
?>
		<?php
mysql_close();   //closing
?>
</tbody>
		</table>
</body>
</html>
