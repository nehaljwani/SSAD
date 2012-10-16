<?php
include("essential.php");
dbconnect();

print_r($_POST);

echo $_POST['forwardID'];
$a="accept";
$b="reject";
$c="forward";
$d= "Specify a reason for rejection (optional) )";
$rID = $_POST['reqID'];

$reqArray = getRequestByID($_POST['reqID']);
print_r($reqArray);
$clashArrays = clashMux(checkConflicts());

foreach($clashArrays as $clashArray){
	if(in_array($rID, $clashArray)){
		break;
	}
}

//clashArray now has all elements clashing with the current request, including the current request

if($_POST['reqAction']==$b)
{
	if($_POST['reason']==$d)
	{
		$sq="update Requests set appStatus='Rejected', reqRejectReason='None' where reqNo=".$_POST['reqID'].";";
	}
	else
	{
		$sq="update Requests set appStatus='Rejected',reqRejectReason ='".$_POST['reason']."' where reqNo=".$_POST['reqID'].";";
	}
	$req = getRequestByID($rID);
	reject($req['creator'], $req['creatorEmail'], $req['room'], $req['reqNo'],$_POST['reason']);
	reject($req['concernedPName'], $req['concernedPEmail'], $req['room'], $req['reqNo'],$_POST['reason']);
}
else if($_POST['reqAction']==$a)
{
	$sq="update Requests set appstatus='Accepted' where reqNo=".$_POST['reqID'].";";
	foreach($clashArray as $rejectThis){
		if($rejectThis != $rID){
			echo$rejectThis;
			$otherQuery = "update Requests set appStatus = 'Rejected', reqRejectReason = 'A request conflicting with your request was accepted.' where reqNo = {$rejectThis}";
			echo $otherQuery."\n";
			execute($otherQuery);

			$req = getRequestByID($rejectThis);
			reject($req['creator'], $req['creatorEmail'], $req['room'], $req['reqNo']);
			reject($req['concernedPName'], $req['concernedPEmail'], $req['room'], $req['reqNo']);
		}
	}
	$req = getRequestByID($rID);
	accept($req['creator'], $req['creatorEmail'], $req['room'], $req['reqNo']);
	accept($req['concernedPName'], $req['concernedPEmail'], $req['room'], $req['reqNo']);
}
else if($_POST['reqAction']==$c)
{
	$sq="update Requests set concernedAdmin = {$_POST['forwardID']} where reqNo = {$_POST['reqID']}";
	$req = getRequestByID($rID);
	$emails = getEmails($_POST['forwardID']);
	print_r($emails);
	foreach($emails as $email){
		forward($req['concernedPName'], $email, $req['room'], $req['reqNo'], $req['concernedPEmail']);
	}
}
echo $sq;
execute($sq);

echo "<br />";


print_r($clashArray);


?>
