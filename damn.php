<?php
$a=$_POST['a'];
include('essential.php');
dbconnect();
mysql_query("delete from CourseRooms where Code='$a'");
// func. call
mysql_close($con);
echo'
<script type="text/javascript">
window.location="courses.php";
</script>';
?>
