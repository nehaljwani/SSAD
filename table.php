<?php include("header.php"); ?>
			<div class="post">
				<h2 class="title"><a href="#">Welcome to TrendyBiz </a></h2>
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
<th scope="col">Status</th>
</tr>
</thead>
<?php include("essential.php");     //include for dbconnect and paginate function
if(isset($_GET['st']))
    $mstart=$_GET['st'];    
else
    $mstart=0;
$lim=10;
$table="Requests";
dbconnect();          //connecting db
$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM $table"; //select table
$result=paginate("table.php",$query,$mstart,$lim);             //calling paging
$num=mysql_numrows($result);
?>
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
mysql_close();   //closing
?>

</table>
			</div>
<?php include("footer.php"); ?>
