<?php 
include("essential.php");
require_once("header.php");
$email=phpCAS::getUser();
?>
<div class="post">
<h2 class="title">Requests made by you </h2>
<table id="box-table-a">
<script language="javascript" type="text/javascript" src="js/table.js"></script>
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Creator</th>
<th scope="col">Room</th>
<th scope="col">Event</th>
<th scope="col">Date</th>
<th scope="col">Time</th>
<th scope="col">Type</th>
<th scope="col">Status</th>
<th scope="col">Details</th>
<th scope="col">Delete</th>
</tr>
</thead>
<?php
									        
$query="SELECT reqNo,creator,room,eventTitle,eventStartDate,eventStartTime,reqType,appStatus FROM Requests where creatorEmail='".$email."' order by appStatus";
                  getMyRequests($query);
		  ?>
		  </table>
		  </div>
		  <?php
		  
require_once("footer.php");
?>

