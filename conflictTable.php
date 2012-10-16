<?php include("header.php"); ?>
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/conflictTable.js"></script>
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
<th scope="col">Details</th>
</tr>
</thead>
<?php include("essential.php");     //include for dbconnect and paginate function
dbconnect();          //connecting db
clashMux(checkConflicts());

if(isset($_GET['st']))
    $mstart=$_GET['st'];    
else
    $mstart=0;
?>
</table>
			</div>
<?php include("footer.php"); ?>
