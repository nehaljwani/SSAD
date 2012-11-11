<?php
include("essential.php");
require_once('header.php');
dbconnect();
$query = "select groupName,level from Groups;";
$r='Gpname';
$list1=generateGroupList($query,$r);
?>

<html>
<title>Update Group</title>
<head>
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/delmem.js"></script>
<script type='text/javascript' src='js/livevalidation_standalone.js'></script>

<script type="text/javascript">
 
function timedMsg()
{
	        var t=setTimeout("document.getElementById('kapi').style.display='none';",4000);
}

</script>


</head>
<body>
<?php if(isset($_GET['msg'])){
	echo "<p id='kapi' style='background-color:#1C478E;font-size:14pt;color:#FFFFFF;text-align:right;'>" . $_GET['msg']. "</p>";
	?>
	 <script> timedMsg(); </script>
	<?php
}?>

<h2 align='center'> Modify Group </h2>
<br>
<br>
<form name='modifyGrp'  action='addUpdateGrp2.php' method='post'>
<table align='center'>
<tr><td>
Group Name: </td>
<td><?php echo $list1 ?></td>
</tr>

<tr><td><br ></td><td><br ></td></tr>
<tr>
<td>
<h2 align='center' id='heade'>Add New Member</h2>
</td>
<td>
</td>
</tr>
<tr>
<td id='td1'>Name :</td>
<td><input type='text' id='Mname' name = 'Mname' /></td>
</tr>
<tr>
<td id='td2'>Email: </td>
<td><input type='text' id='email' name =  'email'/> </td>
</tr>
<tr><td></td><td><input type='submit' name='add' value='Add' id='submit'/></td>
</tr></table>
<script type="text/javascript">
        var f21 = new LiveValidation('Mname');
	        f21.add( Validate.Presence );
		        var f11 = new LiveValidation('email');
			        f11.add(Validate.Presence);
			        f11.add(Validate.Email);
				        </script>

</form><br/><br/><br/>
<div class="post">
  <h2 class="title" id="deleteform"><a href="#">Delete Group Members</a></h2>
<?php
session_start();
if(isset($_GET['st']))
    $mstart=$_GET['st'];    
else
    $mstart=0;
$lim=10;
$gr=$_POST['Gpname'];
if(isset($gr))
$_SESSION['grp1']=$gr;
$grp=$_SESSION['grp1'];
$grp="'".$grp."'";
dbconnect();          //connecting db

function tBody($grp,$gid)
{

	$grpi="grop";
	$grpi=$grpi.$gid;
	
	echo "<tbody name='$grp' id='$grpi'>";
	$query="SELECT userID,name,email FROM User where User.level=$gid";
	//echo $query;
	//$result=paginate("auGrp.php",$query,$mstart,$lim);             //calling paging
	$result=execute($query);
	$num=mysql_numrows($result);

	while ($row=mysql_fetch_row($result)){                 //fetching rows from result query
        ?>  
                <tr>
                <?php
                $i=0;
                foreach($row as $col){        //for columns printing purposes
			if($i==0){
				$pri=$col;
			}
		
                        ?>
				<?php 
				if($i==1 || $i==2)
				{?>

                <td><?php echo $col; echo " "; ?></td>
                <?php
				}
		
                $i++;
}?>
<td><a href='deletemember.php?SNO=<?php echo "$pri";?>' style='text-align:right'>Del</a></td>
</tr>
<?php
}
?>
</tbody>
<?php
}
	?>

<table id="box-table-a">	
<thead id="tablehead">
<tr>
<th scope="col">Name</th>
<th scope="col">Email</th>
<th scope="col">Delete</th>
</thead>
<?php
$que="select distinct groupName,level from Groups";
$res=execute($que);
while($row=mysql_fetch_row($res)){
	
		tBody($row[0],$row[1]);
//	echo $row[0];
//	echo $row[1];
}
		?>

<?php

mysql_close();   //closing
?>

</table>
</div>
<?php require_once('footer.php');?>
</body>
</html>
