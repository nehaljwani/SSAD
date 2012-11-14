<?php
include("essential.php");

                        $rname=escape($_POST['roomName']);
	//		echo $rname;

if(!isset($_POST['roomName']))
{
	header("Location:editRoom.php?msg='Room Name not mentione'");
}
if(!isset($_POST['cap']))
{
	header("Location:editRoom.php?msg='Capacity not given'");
}

$qu = "select buildId from Building where buildingName='".$_POST['buildingName']."';" ;
	$r = execute($qu);

                $row = mysql_fetch_array($r);
                $id =  $row[0];
		//echo $id;
	//	$q2="select roomId from Room where roomName='".$_POST['roomName']."';";
	//	echo $q2;
	//	$res=execute($q2);
	//	$row2=mysql_fetch_row($res);
		$id2=$_POST['roomID'];
	//	echo $id2;

//echo "roomname";
//echo $rname;
//echo "roomid";
//echo $id2;
//echo "buiding";
//echo "$id";
$q = "update Room set roomName='" .$rname. "', buildingName='" . $id . "', capacity='".$_POST['cap']."', description='".$_POST['description']."' where roomId =".$id2.";";
                    
   		/* else{
                        $q = "update Room set roomName='" .$rname. "', capacity='".$_POST['cap']."', description='".$_POST['description']."' where roomName ='".$_POST['Room']."';" ;
		}  */   
echo $q;
 		execute($q);
                $del="delete from Room_Cat where roomId=".$id2.";";
//		echo $del;

                execute($del);
                
                if(empty($_POST['Category']))
                {

                        //header("Location:allForm.php?msg='Room edited'");
                         die();
                }
                else{                                                   // adding categories to the room.
                        $count=count($_POST['Category']);
                        for($i=0;$i<$count;$i++)
                        {
                                $query2="insert into Room_Cat values('".$id2."','" .$_POST['Category'][$i]. "');";
				//echo $query2;
                                execute($query2);
                        }
                        header("Location:allForm.php?msg='Room edited'");
                        die();
                }
       // }


?>

