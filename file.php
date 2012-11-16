<?php 
require_once('essential.php');
require_once('header.php'); 
?>
<form action="project1.php"method="post"
enctype="multipart/form-data">

 <h2 >lectures - File Upload</h2><br/>
<table align='left'>
<tr>
<td id="mybody">CSV-FILE<br>(Code,Name,Day,Start-Time,End-Time) </td></tr><tr><td><input type="file" name="file1" id="file"/></td><br/></tr><br/>
<tr>
<td> <input type='submit' name='submit' id='submit' value='upload'/></td></tr>
  </table></form>
                <br/><br/><br/>
<br/><br/>
<?php require_once('footer.php'); ?>
