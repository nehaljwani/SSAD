<?php

include("header.php");
include("essential.php");
dbconnect();
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
else{
	die("Invalid link");
}
//require_once("header.php");
//$id=19;
if($id==0)
{
	echo "This Room is alloted by Admins";
}
else
{
$sq="select * from Requests where reqNo =".$id.";";
//echo $sq;
$res=execute($sq);
$col1=array("RequestID","hash","Request made by:","Requester Email","Requester Phone ","Concerned Person Phone ","Concerned Person Email"," Concerned Person Phone","Request Status","Group of Requester","Request Date","Event Start Date","Event End Date","Event Start Time","Event End Time ","Title of the Event","Event Description","Days of Event","Id of Admin handling this request","Room","Request Type","Reason for accept/reject","Request last modified");
$num_row=mysql_num_fields($res);
$col=mysql_fetch_row($res);

?> 

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
	if($col[0]==0)
	{
		echo "This room is reserved for Admin";
		break;
	}
	else
	{
	if($i!=1)
	{
		if($i==17)
		{
			$col[$i]=explosion($col[$i]);
		}
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
}}
?>
</table>
</div>
<?php }
?>
<?php include("footer.php"); ?>
