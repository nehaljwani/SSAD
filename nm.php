<?php
//include("new_mail.php");

function accept($name,$mail_to,$room_no,$request_id)
{
 	$mail_to=$mail_to;
 	$date = date('Y-m-d H:i:s');
	$body="Dear ".$name.",\nYour request with Request id ".$request_id." for Room no.".$room_no." has been accepted by Admins.\nThis is a System Generated Mail. Please do not reply.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
 	$subject="Room allocation: Request Accepted";
 	mail($mail_to,$subject,$body);
}

function reject($name,$mail_to,$room_no,$request_id)
{
 	$mail_to=$mail_to;
 	$date = date('Y-m-d H:i:s');
	$body="Dear ".$name.",\nYour request with Request id ".$request_id." for Room no.".$room_no." has been rejected by Admins due to non availability.\nThis is a System Generated Mail. Please do not reply.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
 	$subject="Room allocation: Request Rejected";
 	mail($mail_to,$subject,$body);
}

function forward($name,$mail_to,$room_no,$request_id,$original_mail_id)
{
 	$mail_to=$mail_to;
 	$date = date('Y-m-d H:i:s');
	$body="Sir,\n".$name." with mail id ".$original_mail_id." has sent the Request for Room no. ".$room_no.".The Request id is. ".$request_id." .Kindly check and if possible give your Consent\n\n\n\nCheers,\nAdmins\n\n\n\nMail generated at: ".$date;
//.$original_mail_id." has sent the mail requesting for Room no.".$room_no." .The request id is "//.$request_id." Kindly check about the neccessity of request.\n\n\n\nCheers,\nAdmins.\n\n\nMail generated at :".$date;
 	$subject="Room allocation: Request forwarded";
 	mail($mail_to,$subject,$body);
}


if($_POST['check']==1)
{
accept("Nehal","nehal.wani@students.iiit.ac.in","303","1");
}
if($_POST['check']==2)
{
reject("Nehal","nehal.wani@students.iiit.ac.in","303","1");
}
if($_POST['check']==3)
{
forward("shubham","nehal.wani@students.iiit.ac.in","303","1","shubham.sangal@students.iiit.ac.in");
}

?>

