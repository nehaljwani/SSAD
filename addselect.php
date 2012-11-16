<?php
include("essential.php");
require_once("header.php");
?>
<div class='post'>
<h2> Change Bugs Status</h2>
<form action='confirm_update_status.php' method='POST'>
<?php 
$status=array();
$p=$_GET['status0'];
if($p == "'".'Pending'."'")
{
	$status[0]="Pending";
	$status[1]="Under Process";
	$status[2]="Solved";
}
else if($p == "'"."Solved"."'")
{
	$status[2]="Pending";
	$status[1]="Under Process";
	$status[0]="Solved";
}
else
{
	$status[1]="Pending";
	$status[0]="Under Process";
	$status[2]="Solved";
}

?>
<table align='center'>
<tr>
<td>
<?php echo "Please select status";?>
</td>
<td>
<select name='status'>
<option value='<?php echo $status[0];?>'><?php echo $status[0];?></option>
<option value='<?php echo $status[1];?>'><?php echo $status[1];?></option>
<option value='<?php echo $status[2];?>'><?php echo $status[2];?></option>
</select>
<td>
</tr>
<tr>
<td>
<input type='hidden' name='id' value=<?php echo $_GET['id'];?>/>
</td>
<td>
<input type='submit' name='update' value='Update'/>
</td>
</tr>
</table>
</form>
</div>
<?php
require_once("footer.php");
?>

