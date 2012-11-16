<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : TrendyBiz
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120818

-->
<?php

require_once('CAS.php');

phpCAS::setDebug();

phpCAS::client(CAS_VERSION_2_0, "login.iiit.ac.in", 443, "/cas");

phpCAS::setNoCasServerValidation();

phpCAS::forceAuthentication();
$gID = getCurGroup();

$userID = phpCAS::getUser();

$userID = explode('@', $userID);

$userID = $userID[0];

if(isset($_GET['logout'])){
  phpCAS::logout();
}

$filePath = $_SERVER['PHP_SELF'];
$fileArray = explode('/', $filePath);
$length = sizeof($fileArray);
$file = $fileArray[$length-1];
$fArray = explode('.', $file);
$file = $fArray[0];

$classVar = " class=\"current_page_item\"";

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Room Allocation Portal - Team 18</title>
<!--link href="http://fonts.googleapis.com/css?family=Dancing+Script|Open+Sans+Condensed:300" rel="stylesheet" type="text/css" /-->
<link href="css/fonts.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul><?php if($gID==2){ ?>
				<li <?php if($file=="index") echo $classVar;?>><a href="index.php">Home</a></li>
				<li <?php if($file=="table") echo $classVar; ?>><a href="table.php?view=All">View Requests</a></li>
				<li<?php if($file=="masterpage") echo $classVar; ?>><a href="masterpage.php">MasterPage</a></li>
				<li<?php if($file=="giveFeedback") echo $classVar; ?>><a href="feedback_view.php">View Feedbacks</a></li>
				<li<?php if($file=="allForm") echo $classVar; ?>><a href="allForm.php">Modify Rooms</a></li>
				<li<?php if($file=="humans") echo $classVar; ?>><a href="humans.txt">Team</a></li>
				<li><a href="?logout=true"><?php echo $userID; ?> (Logout)</a></li>
			    <?php }else{ ?>
				<li <?php if($file=="index") echo $classVar;?>><a href="index.php">Home</a></li>
				<li <?php if($file=="requestForm") echo $classVar; ?>><a href="requestForm.php">New Request</a></li>
				<li <?php if($file=="table") echo $classVar; ?>><a href="table.php?view=All">All Requests</a></li>
				<li <?php if($file=="all_Bugs") echo $classVar; ?>><a href="all_Bugs.php">Report Bugs</a></li>
				<li<?php if($file=="giveFeedback") echo $classVar; ?>><a href="giveFeedback.php">Give Feedback</a></li>
				<li<?php if($file=="humans") echo $classVar; ?>><a href="humans.txt">Team</a></li>
				<li><a href="?logout=true"><?php echo $userID; ?> (Logout)</a></li>
			    <?php } ?>
			</ul>
		</div>
	</div>
	<div class="divider">&nbsp;</div>
        <div id="page" class="container">
        <?php if(isset($_GET['msg'])){ ?><div id="msgbox"><span id="msg"><?php echo $_GET['msg']; ?></span></div><?php } ?>
                <div id="content">
<!--Split 1-->
