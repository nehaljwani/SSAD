<?php
include("essential.php");
require_once("header.php");
?>
<h2>Edit Room</h2>
<?php
$id=$_GET['SNO'];
//echo $id;
$query1="select * from Room where roomId=".$id.";";
$q = "select buildingName from Building";
$x = "buildingName";
$st =  generate_list($q,$x);

$result1=execute($query1);
while($row=mysql_fetch_row($result1))
{

	
?>
<form action="s_addroom3.php" method="post">
<table>
<tr>
<td>
RoomId:</td>
<td><input type='text' name='roomID' readonly value=<?php echo $id?>></td>
</tr>
<tr>
<td> Room Name</td>
<td> <input type='text' name='roomName' id='room' value=<?php echo $row[1] ?>></td>
</tr>
<tr>
<tr>
<td>Capacity: </td>
<td><input name='cap' type='number' id ='f1' min='0' max='2000' maxlength = 4 size = 4 value = <?php echo $row[5]?>>
<script type="text/javascript">
var f1 = new LiveValidation('f1');
f1.add( Validate.Presence );
f1.add( Validate.Numericality, { onlyInteger: true } );
</script>
</td>
</tr>
<tr>
<td>Description</td>
<td><input type='text' id='description' class='center' name='description' style='height:100px;width:300px' value = <?php echo $row[4]?>>
<br/>
<script type="text/javascript">
var f2 = new LiveValidation('description');
f2.add( Validate.Presence );
</script>
</td>
</tr>
<td>Category: </td>
<?php
$query2 = "select Category.catId, Category.catName from Category ;"; 
//echo $query2;// drop down of available rooms for update
$category = execute($query2);
$query3 = "select catId from Room_Cat where roomId=".$id.";";
//echo $query3;
$result3=execute($query3);
$ar=array();
$in=0;
while($roww=mysql_fetch_row($result3))
{
	$ar[$in]=$roww[0];
	$in++;
}


      while($row = mysql_fetch_array($category)){
	      $flag=0;
               $cat=$cat."<input type='checkbox' name='Category[]' value='".$row['catId']."'";
	       //>"  .$row['catName']. "<br/>";
	       //echo $row[0];
	       $ind=0;
	       while($ind<count($ar))
	       {
		      
		       if($row[0]==$ar[$ind]){
			       $flag=1;
		       //echo $row['catId'];
		       //echo $roww[0];
			       break;
		       }
		       $ind++;
	       }
		       if($flag==1)
		       {
			       $cat=$cat." checked>" .$row['catName']."<br/>";
		       }
		       else
		       {
			       $cat=$cat.">" .$row['catName']."<br/>";
		       }
	       }

?>     
<td><br/><?php echo $cat ?></td>
</tr>
<tr>
<td>
select Building: 
</td>
<td>
<?php
$q = "select buildingName from Building";
$x = "buildingName";
$query4="select Building.buildingName from Room,Building where roomId=".$id." and Room.buildingName=Building.buildId";
$result4=execute($query4);
$b="";
while($roww4=mysql_fetch_row($result4))
{
	$b=$roww4[0];
}

$st =  generate_select_list($q,$x,$b);
echo $st ?>
</td>
</tr>
<tr><td>
</td><td> 
<input type='submit' name='submit' id='submit' value='Edit Room'/><button type='reset' value='Reset'/>Reset</td></tr>
</table></form>
<?php
}
require_once("footer.php");
?>
