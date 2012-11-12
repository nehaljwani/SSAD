<?php
include("header.php");
session_start();
$_SESSION["del_cou"]=10;
$_SESSION["mod_cou"]=10;
?>
<center>
<h1>Edit Course Details<br/><br/></h1>
<form action='modifying.php' method='post'>
<input type='submit' value='MODIFY A COURSE'>
</form>
<form action='deleting.php' method='post'>
<input type='submit' value='DELETE A COURSE'>
</form>
</center>
</body>
</html>
<?php
include('essential.php');
dbconnect();
mysql_query("drop table dassod");
echo "<br><br><br><br><br/>";
include("footer.php");
?>
