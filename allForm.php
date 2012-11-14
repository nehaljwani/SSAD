<?php 

require_once('essential.php');
if(isset($_GET['msg2'])){
	$message=unserialize($_GET['msg2']);
	$_GET['msg']=$message[4];
}
require_once('header.php');

$gID = getCurGroup();

if($gID != 2){ 
	        die("You do not have sufficient privileges to access this page");
		}


dbconnect();
?>
<div class="post">
  <h2 class="title"><a href="#">All forms </a></h2>
  <div class="entry">
  </div>
</div>
<script type='text/javascript' src='js/livevalidation_standalone.js'></script>
<script type="text/javascript">

function confirm_delete(x){

	var conf = confirm("Are you sure to delete?");

	if(conf == true){
		window.location = 'deleteRoom.php?SNO='+x;

	}

}

</script>

<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/calendarDateInput.js"></script>
<script type='text/javascript' src='js/brand.js'></script>
<script type='text/javascript' src='./js/livevalidation_standalone.js'></script>
<button type="button" id='editroom' >edit/delete Room</button>
<button type="button" id='addroom' >add/update Room</button>
<button type="button" id='delroom' >delete Room</button>
<button type="button" id='addbuild' >Add Building</button>
<button type="button" id='delbuild' >Delete Building</button>
<script  type="text/javascript">

$on_pager=<?php echo json_encode($message);?>;
$(document).ready(function() {
	if($on_pager){
		$('#'+$on_pager[1]).hide();
		$('#'+$on_pager[2]).hide();
		$('#'+$on_pager[3]).hide();
		$('#'+$on_pager[5]).hide();
		$('#'+$on_pager[0]).show();
	}
	else{
		$('#deleteRoom').hide();
		$('#editRoom').show();
		$('#addRoom').hide();
		$('#deleteBuilding').hide();
		$('#addBuilding').hide();
	}
})
</script>

<!--script language="JavaScript" type="text/javascript">timedMsg()</script-->

<?php	$query4="select DISTINCT roomName from Room;";
$r="Room";
$r1='dRoom';
$list1=generate_list($query4,$r);
$list2=generate_list($query4,$r1);
$query = "select Category.catId, Category.catName from Category ;";                     // drop down of available rooms for update
$category = execute($query);

if(!mysql_num_rows($category))                  // checkboxes for categories
{
      $cat="No Available Categories";
}
else{
      while($row = mysql_fetch_array($category)){
               $cat=$cat."<input type='checkbox' name='Category[]' value='".$row['catId']."'>"  .$row['catName']. "<br/>";
 
     }
}

$q = "select buildingName from Building";
$x = "buildingName";
$st =  generate_list($q,$x);?>
<form name='a_uroom' action=s_addroom2.php method='post' id="addRoom">
<table align='center'>
 <h2 align='center'>Add/Update Room</h2>
<tr><td>Add/Update a Room:</td>
<td><input type='radio' name='a_u' value='add' checked>Add a new room<br>
    <input type='radio' name='a_u' value='update' >Update a room<br><?php echo $list1; ?></td></tr> 

<tr>
<br/>
<td><br/> Room Name(Add/New Name): </td>
<td> <input type='text' name='roomName' id='room' value=''/></td>
</tr>
<tr>
<td>Capacity: </td>
<td><input name='cap' type='number' id ='f1' min='0' max='2000' maxlength = 4 size = 4 value = 100>
<script type="text/javascript">
var f1 = new LiveValidation('f1');
f1.add( Validate.Presence );
f1.add( Validate.Numericality, { onlyInteger: true } );
</script>
</td>
</tr>
<tr><td>Description</td><td><input type='text' id='description' class='center' name='description' style='height:100px;width:300px' value='EMPTY' /> <br/>
<script type="text/javascript">
var f2 = new LiveValidation('description');
f2.add( Validate.Presence );
</script>
</td>
</tr>

<tr>
<td>Category: </td>
<td><br/><?php echo $cat ?></td>
</tr>
<tr>
<td>
select Building: </td>
<td>
<?php echo $st ?>
</td>
</tr>
<tr><td></td><td> <input type='submit' name='submit' id='submit' value='Add/UpdateRoom'/><button type='reset' value='Reset'/>Reset</td></tr>
                </table>
                </form>
<form name='deleteroom' method='POST' action ='s_addroom2.php' id="deleteRoom"  >
 <h2 align='center'>Delete Room</h2>
 <table align='center'><tr><td>Select Room: </td>
                           <td><?php echo $list2 ?></td></tr>
                           <tr><td></td><td><input type='submit' name='deleteroom' value='Delete'/i></td></tr>
                </table></form>

<?php
$query = "select buildingName from Building;";
$r='bname';
$list1=generate_list($query,$r);

?>
<form name='insert' action='s_addbuild2.php' method='post' id="addBuilding">
<h2 align='center'>Add Building</h2>
<table align='center'>
<tr><td>
Enter the new Building's Name : </td><td><input type='text' id='enter' name = 'Bname' />
<script type="text/javascript">
var f2 = new LiveValidation('enter');
f2.add( Validate.Presence );
</script>
</td>
</tr>
<tr><td></td><td><input type='submit' name='add' value='Add'/></td>
</tr></table>
</form><br/><br/><br/>

<form name='delete' action='s_addbuild2.php' method='post' id="deleteBuilding" >
<h2 align='center'> Delete Building </h2>
<table align='center'>
<tr><td>
Building Name: </td>
<td><?php echo $list1 ?></td>
</tr><tr><td></td><td><input type='submit' name='delete' value='Delete' /></td>
</tr></table>

</form>
<div id='editRoom'>
<table id="box-table-a">
<tr>
<thead>
<th scope="col">RoomId</th>
<th scope="col">RoomName</th>
<th scope="col">buildingName</th>
<th scope="col">blockName</th>
<th scope="col">capacity</th>
<th scope="col">Edit</th>
<th scope="col">delete</th>
</tr>
</thead>
<?php
$queue="select roomId,roomName,buildingName,blockName,capacity from Room;";
$resu=execute($queue);
$pri=0;
while($row=mysql_fetch_row($resu))
{
	?>
		<tr>
		<?php
		$i=0;
	foreach($row as $col){
		if($i==0){
			$pri=$col;
		}
		?>
			<td><?php echo $col?></td>
			<?php 
			$i++;
	} ?>
	<td><a href='editRoom.php?SNO=<?php echo "$pri";?>' style='text-align:right'>Edit</a></td>
		 <td><a href='#' onclick="confirm_delete('<?php echo "$pri";?>')" >Del</a></td>

		</tr>
		<?php }?>
		</table>
</div>
		<?php require_once('footer.php'); ?>

