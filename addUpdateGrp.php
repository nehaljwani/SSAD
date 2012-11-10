<?php
include("essential.php");
require_once('header.php');
dbconnect();
$query = "select groupName from Groups;";
$r='Gpname';
$list1=generate_list($query,$r);
?>

<html>
<title>Update Group</title>
<body>

<h2 align='center'> Modify Group </h2>
<br>
<br>
<form name='modifyGrp'  action='addUpdateGrp2.php' method='post'>
<table align='center'>
<tr><td>
Group Name: </td>
<td><?php echo $list1 ?></td>
</tr><tr><td></td><td><input type='submit' name='select' value='select' /></td>
</tr></table>
</form>
<?php require_once('footer.php');?>
</body>
</html>
