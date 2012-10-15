<?php

include("essential.php");
dbconnect();
if(isset($_GET['msg'])){
                echo "<p style='background-color:#1C478E;font-size:14pt;color:#FFFFFF;text-align:right;'>" . $_GET['msg'] . "</p>";
        }

$query4="select DISTINCT roomName from Room;";
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
$st =  generate_list($q,$x);
//require_once('footer.php');


?>


<html>
<title>Add room</title>
<head>
<script type='text/javascript' src='/js/livevalidation_standalone.js'></script>
</head>
<body>
<?php require_once('header.php'); ?>

<form name='a_uroom' action=s_addroom2.php method='post'>
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
<tr><td></td><td> <input type='submit' name='submit' id='submit' value='Add/UpdateRoom'/></td></tr>
                </table>
                </form>
<form name='deleteroom' method='POST' action ='s_addroom2.php'  >
 <h2 align='center'>Delete Room</h2>
 <table align='center'><tr><td>Select Room: </td>
                           <td><?php echo $list2 ?></td></tr>
                           <tr><td></td><td><input type='submit' name='deleteroom' value='Delete'/i></td></tr>
                </table></form>
<?php require_once('footer.php'); ?>
</body>
</html>
