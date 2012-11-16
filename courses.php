<?php
include("essential.php");
include("header.php");
session_start();
$_SESSION["del_cou"]=10;
$_SESSION["mod_cou"]=10;
echo"
<h2>lectures - Edit Course Details<br/><br/></h2>
<center>
<form action='modifying.php' method='post'>
<input type='submit' value='MODIFY A COURSE'>
</form>
<br/>
<form action='deleting.php' method='post'>
<input type='submit' value='DELETE A COURSE'>
</form>
</center>";
dbconnect();
mysql_query("drop table dassod");
echo "<br><br><br><br><br/>";
include("footer.php");
?>
