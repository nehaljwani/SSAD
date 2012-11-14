<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : TrendyBiz
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120818

--><?php

require_once('CAS.php');

phpCAS::setDebug();

phpCAS::client(CAS_VERSION_2_0, "login.iiit.ac.in", 443, "/cas");

phpCAS::setNoCasServerValidation();

phpCAS::forceAuthentication();

$userID = phpCAS::getUser();

$userID = explode('@', $userID);

$userID = $userID[0];

if(isset($_GET['logout'])){
  phpCAS::logout();
}


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
			<ul>
				<li class="current_page_item"><a href="index.php">Homepage</a></li>
				<li><a href="conflictTable.php">Conflict View</a></li>
				<li><a href="giveFeedback.php">Feedback</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Links</a></li>
				<li><a href="masterpage.php">MasterPage</a></li>
				<li><a href="?logout=true"><?php echo $userID; ?> (Logout)</a></li>
			</ul>
		</div>
	</div>
	<div class="divider">&nbsp;</div>
        <div id="page" class="container">
        <?php if(isset($_GET['msg'])){ ?><div id="msgbox"><span id="msg"><?php echo $_GET['msg']; ?></span></div><?php } ?>
                <div id="content">
<!--Split 1-->
