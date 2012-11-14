<?php
require_once("header.php");
include("essential.php");
$id=$_GET['id'];
$query1="select * from BugTracker where BugId=$id";
$result1=execute($query1);
while($row=mysql_fetch_array($result1))
{
	$i=0;

	?>
		Bug No. <?php echo $row['BugId'] ?> reported by <?php echo $row['reporterEmail'] ?>.</b></p>
		<p><b>Bug is: <?php echo $row['Details'] ?></b></p>

<?php
}
$query2="select * from BugComments where BugId=$id";
$result2=execute($query2);
while($row2=mysql_fetch_array($result2))
{
	?>
		<p><u><?php echo $row2['CommentorEmail']?> comments:</u></p>
		<p><?php echo $row2['Comments'] ?></p>
		<hr>
		<?php
}
?>
<p>Write a new Comment</p>
<form action="confirmcomment.php" method="post">
<input type="hidden" name="id" value=<?php echo $id?>>
<input type="hidden" name="email" value=<?php echo phpCAS::getUser()?>>
<textarea name="bug" rows="10" cols="50" value=""></textarea><br>
<input type="submit" value="submit"/>
<?php
require_once("footer.php");
?>
		
