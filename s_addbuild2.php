<?php
include("essential.php");
include("header.php");

$gID = getCurGroup();

if($gID != 2){ 
	        die("You do not have sufficient privileges to access this page");
}


dbconnect();
$on_page=array();
if(isset($_POST['delete']))                                     // if to delete a building
{
	if(empty($_POST['bname']))
	{
		$on_page[0]="deleteBuilding";
		$on_page[1]="addRoom";
		$on_page[2]="deleteRoom";
		$on_page[3]="addBuilding";
		$on_page[4]="Give the building name";
		$p= serialize($on_page);
		header("Location:allForm.php?msg2=$p");
//		header("Location:allForm.php?msg2=Give the building name");
		die();
	}
	$query21="delete from Room where buildingName in (select buildId from Building where buildingName= '".$_POST['bname']."');";
	execute($query21);
	$query2="delete from Building where buildingName = '".$_POST['bname']."';";
	execute($query2);
		$on_page[0]="deleteBuilding";
		$on_page[1]="addRoom";
		$on_page[2]="deleteRoom";
		$on_page[3]="addBuilding";
		$on_page[4]="Building Deleted";
		$p= serialize($on_page);
		header("Location:allForm.php?msg2=$p");
//	header("Location:allForm.php");
	die();
}
if(isset($_POST['add'])){                                       // add button
	if($_POST['Bname']){
		$building = escape($_POST['Bname']);
		//      dbconnect();
		$q_t = "select buildingName from Building where buildingName='".$building."';";
		$r_t = execute($q_t);
		if(mysql_num_rows($r_t) !=0)
		{
		$on_page[1]="addRoom";
		$on_page[2]="deleteRoom";
		$on_page[3]="deleteBuilding";
		$on_page[0]="addBuilding";
		$on_page[4]="Building already in the system";
		$p= serialize($on_page);
		header("Location:allForm.php?msg2=$p");
//			header("Location:allForm.php?msg2='Building already in the system'");
			die();
		}

		$q = "INSERT INTO Building (buildingName) VALUES('".$building."');";
		echo $q;
		$r=execute($q);
		if (mysql_affected_rows()){
		$on_page[1]="addRoom";
		$on_page[2]="deleteRoom";
		$on_page[0]="addBuilding";
		$on_page[3]="deleteBuilding";
		$on_page[4]="Building Added";
		$p= serialize($on_page);
		header("Location:allForm.php?msg2=$p");

		//	header("Location:allForm.php?msg2=Building Added");
			die();

		}
	}
}
?>
