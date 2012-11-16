<?php
include("essential.php");
include("header.php");
dbconnect();
echo "
<center>
<form action='edit2.php' method='post'>
<h3>Enter Number Of Courses for which Rooms are to be edited : <input type='text' name='number'></h3>
<input type='submit' value='submit'>
</form>
</center>";
include("footer.php");
?>
