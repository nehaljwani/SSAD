<?php
include("essential.php");
include("header.php");
include("adminOnly.php");
dbconnect();
echo "
<script>
function myFunction()
{
	alert('Course Successfully Added');
}
</script>
<center><form action='master10.php' method='post'>
<h3>
Type : <select name=0>
<option value='UG1'>UG1</option>
<option value='UG2'>UG2</option>
<option value='PG1'>PG1</option>
<option value='BC'>BC</option>
<option value='ELECTIVE'>ELECTIVE</option>
</select><br><br>
Code : <input type='text' name=1><br><br>
Name : <input type='text' name=2></h3><br>
<input type='submit' onclick=myFunction() value='submit'></form></center>";
include('footer.php');
?>
