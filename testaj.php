<?php include_once('essential.php'); include("header.php"); 

$gID = getCurGroup();

if($gID != 2){
	die("You do not have sufficient privileges to access this page");
}

?>
<div class="post">
  <h2 class="title"><a href="#">Request Details</a></h2>
<?php //include("essential.php");     //include for dbconnect and paginate function
if(isset($_GET['st']))
    $mstart=$_GET['st'];    
else
    $mstart=0;
$lim=10;
$table="Requests";
dbconnect();          //connecting db

$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM $table order by eventStartDate ASC";

$result=paginate("tabledel.php",$query,$mstart,$lim);             //calling paging
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
<th scope="col">Status</th>
<th scope="col">Delete</th>
</thead>
<?php
$pri=0;
while ($row=mysql_fetch_row($result)){                 //fetching rows from result query
        ?>  
                <tr>
                <?php
                $i=0;
                foreach($row as $col){        //for columns printing purposes
			if($i==0){
				$pri=$col;
			}
                        ?>  	
                <td><?php echo $col; echo " "; ?></td>
                <?php
                $i++;
}
?>
<td><a href='confirmdel.php?SNO=<?php echo "$pri";?>' style='text-align:right'>Del</a></td>

</tr>
<?php
}
mysql_close();   //closing
?>

</table>
</div>
<?php include("footer.php"); ?>
