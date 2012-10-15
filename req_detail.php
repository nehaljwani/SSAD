<?php
include("essential.php");
dbconnect();
if(isset($_GET['id'])){
$id=$_GET['id'];
}
//$id=19;
$sq="select * from Requests where reqNo =".$id.";";
//echo $sq;
$res=execute($sq);
$col1=array("RequestNO","hash","Creator","creatorEmail","creatorPhone ","creatorPhone ","concernedPersonEmail"," concernedPPhone","appStatus"," reqGId","reqDate","eventStartDate","eventEndDate","eventStartTime","eventEndTime ","eventTitle","eventDesc","eventDays","concernedAdmin","room","reqType");
$num_row=mysql_num_fields($res);
$col=mysql_fetch_row($res);


?> 
<html>
<title>Request Details</title>
<body>
<?php include("header.php"); ?>
<h2 align='center'>Request Details</h2>
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
<?php include("footer.php"); ?>
</body>
</html>

