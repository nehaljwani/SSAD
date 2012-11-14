<?php include_once('essential.php'); 
include("header.php"); 
?>
<div class="post">
<h2 class="title"><a href="#">Bugs</a></h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">Id</th>
<th scope="col">Details</th>
<th scope="col">Status</th>
<th scope="col">Creator Email</th>
<th scope="col">Comment</th>
</thead>
<?php
if(isset($_GET['st']))
$mstart=$_GET['st'];    
else
$mstart=0;
$lim=10;
$table="BugTracker";
dbconnect();          //connecting db

$query="SELECT * FROM $table";

$result=paginate("Bugs_view.php",$query,$mstart,$lim);             //calling paging
$num=mysql_numrows($result);

$pri=0;
while ($row=mysql_fetch_row($result)){                 //fetching rows from result query
	?>
		<tr>
		<?php
		$i=0;
		$pri=0;
	foreach($row as $col){        //for columns printing purposes
		if($i==0){
			$pri=$col;
		?>
			<td><a href="addcomment.php?id='<?php echo $pri;?>'"><?php echo $col;?></a></td>
				
		<?php
		}
		else if($i==2){
			?>
			<td><a href="addselect.php?id='<?php echo $pri;?>'"><?php echo $col;?></a></td>
				<?php
		}
		else{
		?>
			<td><?php echo $col; echo " "; ?></td>
			<?php
		}
			$i++;
	}
	?>
		<td><button type="submit" onClick="javascript:window.location.href='addcomment.php?id=<?php echo "$pri" ?>'">Comment </button></td>
		

		</tr>
		<?php
}?>
</table>
</div>
<?php include("footer.php"); ?>



