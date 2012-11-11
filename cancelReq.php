<?php
include("essential.php");
dbconnect();
print_r($_POST);
$query="UPDATE Requests SET appStatus = 'Cancelled', reqRejectReason='".$_POST['cancelReason']."' WHERE reqNo = ".$_POST['reqNo'].";";
execute($query);
$query="DELETE FROM Instances WHERE reqNo = ".$_POST['reqNo'].";";
execute($query);
$query="SELECT creator, creatorEmail, room from Requests WHERE reqNo =  ".$_POST['reqNo'].";";
$result=mysql_fetch_assoc(execute($query));
$query="SELECT email from ccPerson WHERE reqNo =  ".$_POST['reqNo'].";";
$cc=array();
$result2=execute($query);
while($res=mysql_fetch_assoc($result2)){
	$cc[]=$res['email'];
}
$cc=arrayToCSV($cc);
cancel($result['creator'],$result['creatorEmail'],$result['room'],$_POST['reqNo'],$_POST['cancelReason'],$cc);
header("Location: table.php?view=Accepted");
?>
