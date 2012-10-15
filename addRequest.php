<?php
	foreach ($_POST as $k => $v) {
		echo "$k => $v"."<br />";
}
?>
<?php
include("essential.php"); // Importing pre-defined functions
dbconnect();

$hash=sha1(uniqid(mt_rand(), true));
$eventEndDate=$_POST["eventEndDate"];
$creator=$_POST["creator"];
$creatorEmail=$_POST["creatorEmail"];
$creatorPhone=$_POST["creatorPhone"];
$concernedPName=$_POST["concernedPName"];
$concernedPEmail=$_POST["concernedPEmail"];
$appStatus="Pending";//If admin, then $appStatus="Approved"
$concernedPPhone=$_POST["concernedPPhone"];
$reqGId=0;//To be taken on the basis of user's groupId
$reqDate=date("Y-m-d H:i:s");
$eventStartDate=$_POST["eventStartDate"];
$eventStartTime=$_POST["eventStartTime"];
$eventEndTime=$_POST["eventStartTime"];
$eventTitle=$_POST["eventTitle"];
$eventDesc=$_POST["eventDesc"];
$concernedAdmin=$_POST["concernedAdmin"];
$room=$_POST["room"];
$reqType=$_POST["reqType"];

if($_POST['concernedPEmail']==''){
	$concernedPName=$_POST["creator"];
	$concernedPEmail=$_POST["creatorEmail"];
	$concernedPPhone=$_POST["creatorPhone"];
}

$query="INSERT INTO Requests(reqNo, hash, creator, creatorEmail, creatorPhone, concernedPName, concernedPEmail, concernedPPhone, appStatus, reqGId, reqDate, eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventTitle, eventDesc, concernedAdmin, room, reqType) VALUES(
	'',
	'".$hash."',
	'".$creator."',
	'".$creatorEmail."',
	'".$creatorPhone."',
	'".$concernedPName."',
	'".$concernedPEmail."',
	'".$concernedPPhone."',
	'".$appStatus."',
	'".$reqGId."',
	'".$reqDate."',
	'".$eventStartDate."',
	'".$eventEndDate."',
	'".$eventStartTime."',
	'".$eventEndTime."',
	'".$eventTitle."',
	'".$eventDesc."',
	'".$concernedAdmin."',
	'".$room."',
	'".$reqType."'
);";

echo $query;
execute($query);
?>
