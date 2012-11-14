<?php
include("essential.php");
dbconnect();

if(isset($_GET['hash'])){
	$hash=$_GET['hash'];
}
else{
  die("You followed a wrong link to get to this page. Please notify the administrators.");
}
/*function getidfromhash($hash)
{
$sq2="select reqNo from Requests where hash='".$hash."';";
//echo $sq2;
$res2=execute($sq2);
$aa=mysql_fetch_row($res2);
return $aa[0];

}*/
$id=getIDFromHash($hash);
//execute($sq2);
//$id=19;
$sq="select * from Requests where reqNo =".$id.";";
//echo $sq;
$res=execute($sq);
$col1=array("RequestNO","hash","Creator","creatorEmail","creatorPhone ","creatorPhone ","concernedPersonEmail"," concernedPPhone","appStatus"," reqGId","reqDate","eventStartDate","eventEndDate","eventStartTime","eventEndTime ","eventTitle","eventDesc","eventDays","concernedAdmin","room","reqType");
$num_row=mysql_num_fields($res);
$col=mysql_fetch_row($res);

$cAdmin = getConcernedAdmin($id);

$gID = mysql_real_escape_string($_GET['gID']);

?> 

<?php include("header_noCAS.php"); ?>
<?php

$reqStatus = getRequestStatus($id);

if( $reqStatus != "Pending" ){
	if($gID != 0){
		echo "<h2 class=\"title\">Already processed</h2>This request has already been processed. Request status: {$reqStatus}";
	}
}
else{
	if(($gID != $cAdmin) && ($gID == 2)){
		echo "This request has been delegated to admin group - {$groups[$cAdmin]}. If you still want to take an action, select an option below.";
	}

?>
<?php if($gID == $cAdmin || $gID == 2){ ?>
<div class = "post">
	<h2 class="title">Take an action</h2>
	<div class="entry">
		<form name="action" method="post" action="acceptRejectHash.php">
		<table>
		<tr>
			<td><input type="radio" name="reqAction" value="accept"></td>
			<td>Accept</td>
		</tr>
		<?php if(getNextGroup($gID) != -1){ ?>
		<tr>
			<td><input type="radio" name="reqAction" value="forward"></td>
			<td>Forward</td>
		</tr>
		<tr>
			<td></td>
			<td><select name="forwardID"><?php printNextGroupOptions($gID); ?></select></td>
		</tr>
		<?php } ?>
		<tr>
			<td></td>
			<td><input type="hidden" name="reqID" value="<?php echo $id; ?>"></td>
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
			<td><input type="hidden" name="reqID" value="<?php echo $hash; ?>"></td>
		</tr>
		<tr>
			
		</tr>
		</table>
			<input type="submit" value="submit">

		</form>


	</div>
</div>
<?php }} ?>
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
