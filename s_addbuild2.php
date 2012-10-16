<?php
include("essential.php");
dbconnect();

if(isset($_POST['delete']))                                     // if to delete a building
{
        if(empty($_POST['bname']))
        {
                header("Location:s_Addbuilding.php?msg=Give the building name");
                die();
        }
        $query2="delete from Building where buildingName = '".$_POST['bname']."';";
        execute($query2);
        header("Location:s_Addbuilding.php?msg=Building Deleted");
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
                header("Location:s_Addbuilding.php?msg='Building already in the system'");
                die();
        }

        $q = "INSERT INTO Building (buildingName) VALUES('".$building."');";
	echo $q;
        $r=execute($q);
        if (mysql_affected_rows()){

                header("Location:s_Addbuilding.php?msg=Building Added");
                die();

        }
}
}
?>
