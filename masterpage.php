<?php require_once('header.php'); ?>
<form action="project2.php"method="post"
enctype="multipart/form-data">
<table align='left'>
<tr>
<td id="mybody">CSV-FILE<br/>(Code,Name,Type) </td></tr><tr><td><input type="file" name="file2" id="file"/></td><br/></tr>
<tr><td><input type='submit' name='submit' id='submit' value='upload'/></td></tr>

</table>
                </form>
<br/><br/><br/><br/><br/>
<?php require_once('footer.php'); ?>
