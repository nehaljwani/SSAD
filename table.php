<?php include("header.php"); ?>
<?php include("essential.php"); ?> 
			<div class="post">
				<h2 class="title">Requests</h2>
<button type='button' id='All'>All Requests</button>
<button type='button' id='Pending'>Pending Requests</button>
<button type='button' id='Rejected'>Rejected Requests</button>
<button type='button' id='nonConflicts'>Non Conflicting Requests</button>
<button type='button' id='Conflicts'>Conflicting Requests</button>
<br><br>
				<table id="box-table-a">                        
<script language="javascript" type="text/javascript" src="js/table.js"></script>
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
<?php  if($_GET['view']=='Conflicts'){
?>	<th scope="col">Details</th> <?php
	}
?>
</tr>
</thead>
<?php
if(!isset($_GET['view']))
	$_GET['view']='All';
switch ($_GET[view]){
	case 'All':
		$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM Requests ";
		getRequests("All",$query); 
		break;
	case 'Pending':
		$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM Requests where appStatus = 'Pending'";
		getRequests("Pending",$query); 
		break;
	case 'Rejected':
		$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM Requests where appStatus = 'Rejected'";
		getRequests("Rejected",$query);
		break;
	case 'nonConflicts':
		$nonConflicts="(".arrayToCSV(checkNonConflicts()).")";
		$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM Requests where reqNo in ".$nonConflicts."";
		getRequests("nonConflicts",$query);
		break;
	case 'Conflicts':
		clashMux(checkConflicts());
		if(isset($_GET['st']))
			    $mstart=$_GET['st'];    
		else
			    $mstart=0;

}
?>
</table>
			</div>
<?php include("footer.php"); ?>
