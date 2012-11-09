<?php include "essential.php";
session_start();
$email=$_SESSION['email'];
$name=$_POST['name'];
$comment=$_POST['Feedback'];
$query = "insert into Feedback_Form(Name,Email_id,Comment) values('$name','$email','$comment')".";";
$rv=execute($query);
if(!$rv)
{
	die('Error: ' . mysql_error());
}
else
{
	header("Location:giveFeedback.php");
}
?>
