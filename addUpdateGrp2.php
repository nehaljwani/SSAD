<?php include("header.php"); ?>

<div class="post">
  <h2 class="title"><a href="#">Delete Group Members</a></h2>
<?php include("essential.php");     //include for dbconnect and paginate function
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

$query="SELECT userID,name,email FROM User,Groups where Groups.groupName=$grp and Groups.level=User.level order by userID";
$result=paginate("addUpdateGrp2.php",$query,$mstart,$lim);             //calling paging
$num=mysql_numrows($result);
?>
<table id="box-table-a">
<thead>
<tr>
<th scope="col">UserID</th>
<th scope="col">Name</th>
<th scope="col">Email</th>
<th scope="col">Delete</th>
</thead>
<?php
$pri=0;
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
                <td><?php echo $col; echo " "; ?></td>
                <?php
                $i++;
}
?>
<td><a href='deletemember.php?SNO=<?php echo "$pri";?>' style='text-align:right'>Del</a></td>

</tr>
<?php
}
mysql_close();   //closing
?>

</table>
</div>
<?php include("footer.php"); ?>
