<?php

include("essential.php");
dbconnect();
if(isset($_GET['id'])){
	$id=$_GET['id'];
require_once("header.php");
}
//$id=19;
$sq="select * from Requests where reqNo =".$id.";";
//echo $sq;
$res=execute($sq);
$col1=array("RequestNO","hash","Creator","creatorEmail","creatorPhone ","creatorPhone ","concernedPersonEmail"," concernedPPhone","appStatus"," reqGId","reqDate","eventStartDate","eventEndDate","eventStartTime","eventEndTime ","eventTitle","eventDesc","eventDays","concernedAdmin","room","reqType");
$num_row=mysql_num_fields($res);
$col=mysql_fetch_row($res);

?> 

<?php include("header.php"); ?>
<?php 



if(1){ ?>
<!--<div class = "post">
	<h2 class="title">Take an action</h2>
	<div class="entry">
		<form name="action" method="post" action="acceptReject.php">
		<table>
		<tr>
			<td><input type="radio" name="reqAction" value="accept"></td>
			<td>Accept</td>
		</tr>
		<tr>
			<td><input type="radio" name="reqAction" value="forward"></td>
			<td>Forward</td>
		</tr>
		<tr>
			<td></td>
			<td><select name="forwardID"><?php// printNextGroupOptions(1); ?></select></td>
		<tr>
			<td></td>
			<td><input type="hidden" name="reqID" value="<?php// echo $_GET['id'] ?>"></td>
		</tr>
		</tr>
		<tr>
			<td><input type="radio" name="reqAction" value="reject"></td>
			<td>Reject</td>
		</tr>
		<tr>
			<td></td>
			<td><textarea name="reason" cols="40" rows="5">Specify a reason for rejection (optional)</textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="hidden" name="reqID" value="<?php //echo $_GET['id'] ?>"></td>
		</tr>
		<tr>
			
		</tr>
		</table>
			<input type="submit" value="submit">

		</form>


	</div>
</div>-->
<?php } ?>
<div class="post">
<h2 class="title">Request Details</h2>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">Fields</th>
<th scope="col">Details</th>
</tr>
</thead>


<?php while($i<$num_row){
	if($i!=1)
	{
?>
		<tr>
		<td>
<?php
		echo $col1[$i];
?>
		</td>
		<td>
<?php         
		echo $col[$i]; 
?>
		</td>
		</tr>
<?php
	}
	$i++;
}
?>
</table>
</div>
<?php include("footer.php"); ?>
