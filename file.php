<html>
<body>
<?php require_once('header.php'); ?>


<form action="project1.php"method="post"
enctype="multipart/form-data">

<table align='left'>
 <h2 align='left'>lectures-File Upload</h2><br/>
<tr>
<td id="mybody">CSV-FILE1<br>(Code,Name,Day,Start-Time,End-Time) </td></tr><tr><td><input type="file" name="file1" id="file"/></td><br/></tr><br/>
<tr>
<td> <input type='submit' name='submit' id='submit' value='upload'/></td></tr>
  </table></form>
                <br/><br/><br/>
<br/><br/>
<form action="project2.php"method="post"
enctype="multipart/form-data">
<table align='left'>
<tr>
<td id="mybody">CSV-FILE2<br/>(Code,Name,Type) </td></tr><tr><td><input type="file" name="file2" id="file"/></td><br/></tr>
<tr><td><input type='submit' name='submit' id='submit' value='upload'/></td></tr>

</table>
                </form>
<br/><br/><br/><br/><br/>
<?php require_once('footer.php'); ?>
</body>
</html>