<?php 
include("essential.php");
include('header.php'); ?>
<div id="msgbox"><span id="msg"></span></div>
<h2 > lectures - Pre Allocate Rooms </h2><br/>
<center>
<form name='predef' action="my.php" method='post'>
<table align='center'>
<script language="javascript" type="text/javascript" src="js/predef.js"></script> 
<tr>

<?php
$val=0;
$sql_60 = mysql_query("select * from Room ");
while($row_60=mysql_fetch_array($sql_60))
{
	$rooms[$val]=$row_60['roomName'];
	$val++;
}

//$rooms=array("H101","H102","H201","H202","H301","H302","B4-304","B4-301","B6-309","C1-302","SH1","SH2","CR1","CR2","H103","H104","H203","H204","H303","H304","N104");
//$val=21;

$i=0;
echo "
<td>UG1_GRPA &nbsp; &nbsp; &nbsp; </td> <td><select name='ug1seca'>";
while($i<$val)
{
	$h=$rooms[$i];
	echo "<option value='$h' id='$h'>".$h."</option>";
	$i++;
}
echo "</select></td></tr>
	<td>UG1_GRPB &nbsp; &nbsp; &nbsp; </td> <td><select name='ug1secb'>";
$i=0;
while($i<$val)
{
	$h=$rooms[$i];
	echo "<option value='$h' id='$h'>".$h."</option>";
	$i++;
}
echo "</select></td></tr>
<td>PG1 &nbsp; &nbsp; &nbsp; </td> <td><select name='pg1'>";
$i=0;
while($i<$val)
{
	$h=$rooms[$i];
	echo "<option value='$h' id='$h'>".$h."</option>";
	$i++;
}
echo "</select></td></tr>
<td>UG2_CSE &nbsp; &nbsp; &nbsp; </td> <td><select name='ug2cse'>";
$i=0;
while($i<$val)
{
	$h=$rooms[$i];
	echo "<option value='$h' id='$h'>".$h."</option>";
	$i++;
}
echo "</select></td></tr>
	<td>UG2_ECE &nbsp; &nbsp; &nbsp; </td> <td><select name='ug2ece'>";
$i=0;
while($i<$val)
{
	$h=$rooms[$i];
	echo "<option value='$h' id='$h'>".$h."</option>";
	$i++;
}
echo "</select></td></tr></table><br/><br/>";
echo "<input type='submit' value='submit'>
<!-- <button type='reset' value='submit'>Reset</button> -->
 </form></center><br/>";
include('footer.php');
?>

