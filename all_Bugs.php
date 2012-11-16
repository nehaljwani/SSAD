<?php include_once('essential.php'); 
include("header.php"); 
dbconnect();
?>
<div class="post">
<h2 class="title"><a href="#">Bugs</a></h2>
<script type='text/javascript' src='js/bugs.js'></script>
<button type="button" id='addbugs' >add bug</button>
<button type="button" id='viewbugs' >view bugs</button>
<script  type="text/javascript">

$on_pager1=<?php echo $_GET['js1'];?>;
$on_pager2=<?php echo $_GET['js2'];?>;
$(document).ready(function() {
	if($on_pager1){
		$('#'+$on_pager1).show();
		$('#'+$on_pager2).hide();
		
	}
	else{
		$('#addBugs').show();
		$('#viewBugs').hide();
	}
})
</script>
<div id="viewBugs">
<h2>View Bugs</h2>
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
		<tr >
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
			if($col=="Pending"){ ?>
				<td><a class='button red' href="addselect.php?id='<?php echo $pri;?>' & status0='<?php echo $col ;?>'"><?php echo $col;?></a></td>
			<?php;
			} 
			else if ($col=="Solved"){ ?>
				<td><a class='button green' href="addselect.php?id='<?php echo $pri;?>' & status0='<?php echo $col ;?>'"><?php echo $col;?></a></td>
			<?php ;
			}
			else
			{ ?>
				<td><a class='button orange' href="addselect.php?id='<?php echo $pri;?>' & status0='<?php echo $col ;?>'"><?php echo $col;?></a></td>
				<?php;
			}
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
<form action="confirmBug.php" method="post" id="addBugs">
<h2> Report a Bug</h2>
<table>
<tr>
<td>
Email:
</td>
<td>
<input type="text" readonly value="<?php echo phpCAS::getUser();?>" name="email"/>
</td>
</tr>
<tr>
<td>
Bug Details:
</td>
<td>
<textarea name="bug" rows="10" cols="50" value=""></textarea>
</td>
<td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" value="submit"/>
</td>
</tr>
</table>
</form>
</div>
<?php require_once('footer.php'); ?>

