<?php
include("../essential.php");     //include for dbconnect and paginate function
if(isset($_GET['st']))
    $mstart=$_GET['st'];      
else
    $mstart=0;
$lim=1;
$table="Requests";
dbconnect();          //connecting db
$query="SELECT reqNo,creator,room,eventTitle,reqDate,eventStartTime,reqType FROM $table"; //select table
$result=paginate("table.php",$query,$mstart,$lim);             //calling paging
$num=mysql_numrows($result);
?>
<?php
//include("request.html");
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
</tr></table>
<?php
}
mysql_close();   //closing
?>
