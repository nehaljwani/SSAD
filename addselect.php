<?php
include("essential.php");
require_once("header.php");
?>
<div class='post'>
<h2> Change Bugs Status</h2>
<form action='confirm_update_status.php' method='POST'>

<select>
  <option value="Pending">Pending</option>
    <option value="Under Process">Under Process</option>
      <option value="Solved">Solved</option>
	</select>
	<input type='submit' name='update' value='Update'/>
</form>
<?php
require_once("footer.php");
?>
