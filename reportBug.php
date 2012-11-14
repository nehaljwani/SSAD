<?php
require_once("header.php");
include("essential.php");
?>
<div class="post">
<h2>Report a Bug</h2>
<form action="confirmBug.php" method="post">
<table>
<tr>
<td>
Email:
</td>
<td>
<input type="text" readonly value="<?php echo phpCAS::getUser();?>" name="email"/>
</td>
</tr>
<tr>
<td>
Bug Details:
</td>
<td>
<textarea name="bug" rows="10" cols="50" value=""></textarea>
</td>
<td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" value="submit"/>
</td>
</tr>
</table>
</form>
</div>
<?php require_once("footer.php");
?>
