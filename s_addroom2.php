<?php
include("essential.php");
$on_page=array();
if(isset($_POST['deleteroom']))                         //if clicks on delete button
        {
                if(($_POST['dRoom']) == null || $_POST['dRoom'] == ''){
			$on_page[1]="addRoom";
			$on_page[0]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Room name not specified";
			$p= serialize($on_page);
                        //header("Location:allForm.php?msg='Room name not specified'");
                        header("Location:allForm.php?msg=$p");
                        die();
                }

                $query5 = "delete from Room where roomName = '".$_POST['dRoom']."';";
                execute($query5);
			$on_page[1]="addRoom";
			$on_page[0]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Room Deleted";
		$p= serialize($on_page);
                header("Location:allForm.php?msg=$p");
                die();
        }
else
{

$b=$_POST['a_u'];
$a="add";
$u="update";
$q = "select buildId from Building where buildingName='".$_POST['buildingName']."';" ;
$r = execute($q);

if($b== $a){
//echo "kapil";

                $r11=$_POST['roomName'];
                if(empty($r11))
			{
			$on_page[0]="addRoom";
			$on_page[1]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Room name not filled";
		$p= serialize($on_page);
                        header("Location:allForm.php?msg=$p");
			
                        //header("Location:allForm.php?msg=Room name not filled");           //checking if text field empty
                        die();
			}
		 $rname=escape($_POST['roomName']);

                }
 else
{
               if(empty($_POST['roomName']))
		{                          //if update
                        if(empty($_POST['Room'])){
			$on_page[0]="addRoom";
			$on_page[1]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Room name not specified";
		$p= serialize($on_page);
                        header("Location:allForm.php?msg=$p");
                        //        header("Location:allForm.php?msg='Room name not specified'");
                                die();
                        }
                        $rname=$_POST['Room'];
                }
                else
                        $rname=escape($_POST['roomName']);
        }



if(mysql_num_rows($r)!=1)
 {
        if($_POST['a_u'] == 'add')
	{
			$on_page[0]="addRoom";
			$on_page[1]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Cannot insert.Cannot get proper building";
		$p= serialize($on_page);
                header("Location:allForm.php?msg=$p");
                die();
        }
}
                $row = mysql_fetch_array($r);
                $id =  $row[0];
                if($_POST['description'] == '')
                {
                        $_POST['description'] = 'EMPTY';                //default entry
                }
                if($_POST['a_u'] == 'add'){

                $q_test = "select  roomName, buildingName from Room where roomName = '".$rname."' and buildingName = ".$id.";";
		//echo $q_test;
                $lm=execute($q_test);
		$pp=mysql_num_rows($lm);
		//echo $pp;
                if($pp!= 0) {
			$on_page[0]="addRoom";
			$on_page[1]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="room already exists";
		$p= serialize($on_page);
                        header("Location:allForm.php?msg=$p");
                      
                        //header("Location:allForm.php?msg='room already exists'");
                        die();
                }
		else
		{
                $q = "insert into Room (roomName,buildingName,capacity,description) values ('" . $rname . "','" . $id . "','".$_POST['cap']."','".$_POST['description']."');" ;
                execute($q);
	//	 $q1 = "insert into Room (roomName,buildingName,capacity,description) values ('" . $rname . "','" . $id . "','".$_POST['cap']."','".$_POST['description']."');" ;


		}
                }
	$query3="select roomId from Room where roomName = '".$rname."';";
	$id2=execute($query3);
	$id2=mysql_fetch_array($id2);
	$id2=$id2[0];
	if($_POST['a_u'] == 'update' )                  //update query on update
                {
                        if(!empty($id)){
                        $q = "update Room set roomName='" .$rname. "', buildingName='" . $id . "', capacity='".$_POST['cap']."', description='".$_POST['description']."' where roomName ='".$_POST['Room']."';";
  }                  
   		 else{
                        $q = "update Room set roomName='" .$rname. "', capacity='".$_POST['cap']."', description='".$_POST['description']."' where roomName ='".$_POST['Room']."';" ;
		}                       
 		execute($q);
                $del="delete from Room_Cat where roomId=".$id2.";";
                execute($del);
                }
                if(empty($_POST['Category']))
                {
			$on_page[0]="addRoom";
			$on_page[1]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Room inserted/updated successfully.You did not have category preferences";
		$p= serialize($on_page);
                        header("Location:allForm.php?msg=$p");

                        //header("Location:allForm.php?msg='Room inserted/updated successfully.You did not have category preferences.'");
                         die();
                }
                else{                                                   // adding categories to the room.
                        $count=count($_POST['Category']);
                        for($i=0;$i<$count;$i++)
                        {
                                $query2="insert into Room_Cat values('".$id2."','" .$_POST['Category'][$i]. "');";
                                execute($query2);
                        }
			$on_page[0]="addRoom";
			$on_page[1]="deleteRoom";
			$on_page[2]="deleteBuilding";
			$on_page[3]="addBuilding";
			$on_page[4]="Room inserted/updated successfully";
		$p= serialize($on_page);
                        header("Location:allForm.php?msg=$p");
                        //header("Location:allForm.php?msg='Room inserted/updated successfully.'");
                        die();
                }
       // }
}

?>

