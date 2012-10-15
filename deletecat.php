<?php
include("essential.php");
dbconnect();
$cname = escape($_POST['cat_name']);                    // filtering input
$desc = escape($_POST['description']);
$q = "select catName from Category where catName = '".$cname."';";
$r = execute($q);
if(mysql_num_rows($r) != 0)
{
	header("Location:cat1.php?msg='Category already exists'");
	die();
}
$q = "insert into Category(catName, description) values ('".$cname."', '".$desc."');";          //inserted
execute($q);
header("Location:cat1.php?msg='Category successfully added!!!'");

die();

?>

