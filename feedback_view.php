<?php include("essential.php"); include("header.php"); 

$gID = getCurGroup();

if($gID != 2){
	die("You don't have the required privileges to access this page.");
}
//echo getGroup(phpCAS::getUser());

?>
<div class="post">
<h2 class="title">Feedback Details</h2>
<table id="box-table-a">                        
<thead>
<tr>
<th scope="col">Name</th>
<th scope="col">Email_id</th>
<th scope="col">Feedback</th>
<th scope="col">Time</th>
</tr>
</thead>
<?php //include("essential.php");     include for dbconnect and paginate function
if(isset($_GET['st']))
$mstart=$_GET['st'];    
else
$mstart=0;
$lim=10;
$table="Feedback_Form";
dbconnect();          //connecting db
$query="SELECT Name,Email_id,Comment,Time FROM $table"; //select table
$result=paginate("feedback_view.php",$query,$mstart,$lim);             //calling paging
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
			<td><?php 
			echo $col; echo " ";
		?></td>
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
