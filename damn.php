<?php
include('essential.php');
include("header.php");
include("adminOnly.php");
$a=$_POST['a'];
dbconnect();
mysql_query("DELETE FROM Instances WHERE eventTitle='$a'");
mysql_query("delete from CourseRooms where Code='$a'");
mysql_query("delete from Tablem where Code='$a'");
// all courses , tuts , labs wud be deleted related to dat course.
mysql_close($con);
echo'
<script type="text/javascript">
window.location="courses.php";
</script>';
include("footer.php");
?>
