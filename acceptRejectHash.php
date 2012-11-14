<?php
include("essential.php");
dbconnect();

//print_r($_POST);

//echo $_POST['forwardID'];
$a="accept";
$b="reject";
$c="forward";
$d= "Specify a reason for rejection (optional) )";
$rID = getIDFromHash($_POST['reqID']);
$reqArray = getRequestByID(getIDFromHash($_POST['reqID']));
//print_r($reqArray);
$clashArrays = clashMux(checkConflicts());
foreach($clashArrays as $clashArray){
	if(in_array($rID, $clashArray)){
		break;
	}
}

$_POST['reqID'] = getIDFromHash($_POST['reqID']);

//Get comma separated string of concerned persons, insert into db
$reqID = getIDFromHash($_POST['reqID']);
$cc = $_POST['cc'];
$ccPersons = CSVToArray($cc);

foreach($ccPersons as $guy){
	$query = "INSERT INTO ccPerson(reqNo, email) values(\"{$reqID}\", \"{$guy}\");";
	//echo $query;
	execute($query) /*or die("ccPersonAddingError")*/;
}

//clashArray now has all elements clashing with the current request, including the current request
//

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
	reject($req['creator'], $req['creatorEmail'], $req['room'], $req['reqNo'],$_POST['reason'], getCC($rID));
	reject($req['concernedPName'], $req['concernedPEmail'], $req['room'], $req['reqNo'],$_POST['reason']);
}
else if($_POST['reqAction']==$a)
{
	$query="SELECT * FROM Requests WHERE reqNo=".$_POST['reqID'].";";
	$acceptedEvent=execute($query);
	$roomRecords=mysql_fetch_assoc($acceptedEvent);
	$instances=weeklyRequestToInstance($roomRecords['eventStartDate'], $roomRecords['eventEndDate'], CSVToArray($roomRecords['eventDays']));
	foreach($instances as $instance){
		$query="INSERT INTO Instances(reqNo,hash,creator,creatorEmail,creatorPhone,concernedPName,concernedPEmail,concernedPPhone,appStatus,reqGId,reqDate,eventStartDate,eventEndDate,eventStartTime,eventEndTime,eventTitle,eventDesc,eventDays,concernedAdmin,room,reqType) VALUES(
			'".$roomRecords['reqNo']."',
			'".$roomRecords['hash']."',
			'".$roomRecords['creator']."',
			'".$roomRecords['creatorEmail']."',
			'".$roomRecords['creatorPhone']."',
			'".$roomRecords['concernedPName']."',
			'".$roomRecords['concernedPEmail']."',
			'".$roomRecords['concernedPPhone']."',
			'Accepted',     
			'".$roomRecords['reqGId']."',
			'".$roomRecords['reqDate']."',
			'".$instance."',
			'".$instance."',
			'".$roomRecords['eventStartTime']."',
			'".$roomRecords['eventEndTime']."',
			'".$roomRecords['eventTitle']."',
			'".$roomRecords['eventDesc']."',
			'".$roomRecords['eventDays']."',
			'".$roomRecords['concernedAdmin']."',
			'".$roomRecords['room']."',
			'".$roomRecords['reqType']."'
		);";
		execute($query);
	}   

	$sq="update Requests set appStatus='Accepted' where reqNo=".$_POST['reqID'].";";
	$clash=requestClash($roomRecords['eventStartDate'], $roomRecords['eventEndDate'],$roomRecords['eventStartTime'], $roomRecords['eventEndTime'],$roomRecords['room']);
	while($req=mysql_fetch_assoc($clash)){
		//print_r($req);
		if($req['reqNo'] != $rID){
			//echo $req['reqNo'];
			//echo "<HI><br><br><br><br>\n";
			$otherQuery = "update Requests set appStatus = 'Rejected', reqRejectReason = 'A request conflicting with your request was accepted.' where reqNo = {$req['reqNo']}";
			//echo $otherQuery."\n";
			execute($otherQuery);

			reject($req['creator'], $req['creatorEmail'], $req['room'], $req['reqNo'], getCC($rID));
			reject($req['concernedPName'], $req['concernedPEmail'], $req['room'], $req['reqNo'], getCC($rID));
		}
	}
	$req = getRequestByID($rID);
	accept($req['creator'], $req['creatorEmail'], $req['room'], $req['reqNo'], getCC($rID));
	accept($req['concernedPName'], $req['concernedPEmail'], $req['room'], $req['reqNo'], getCC($rID));
}
else if($_POST['reqAction']==$c)
{
	$sq="update Requests set concernedAdmin = {$_POST['forwardID']} where reqNo = {$_POST['reqID']}";
	$req = getRequestByID($rID);
	$emails = getEmails($_POST['forwardID']);
	//print_r($emails);
	foreach($emails as $email){
		forward($req['concernedPName'], $email, $req['room'], $req['reqNo'], $req['concernedPEmail'], getCC($rID));
	}
}
//echo $sq;
execute($sq);

//echo "<br />";


//cho "HIHIHIII";
//print_r($clashArray);
//echo "HIHIHIII";




echo "<script> window.location.replace('table.php') </script>"; 
?>
