<!--Split 2-->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<div>	<?php 
			$gID = getCurGroup();
			if($gID == 2){//If Admin, display the following side bar
			?>
				<h2>Navigation</h2>
				<ul class="list-style1">
					<!-- Placed Lectures At top. Will change. -->
					<!--li class="first"><a href="requestForm.php">Create Request</a></li-->
					<li class="first"><a href="lectures.php">Lectures</a></li>
                                        <li><a href="tut1.php">Tutorials</a></li>
                                        <li><a href="lab1.php">Labs</a></li>
					<li><a href="instances.php">View instances</a></li>
					<li><a href="nhome.php">Availability Status</a></li>
					<li><a href="search.php">Advanced Search</a></li>
					<li><a href="table.php?view=All">View requests</a></li>
					<li><a href="tabledel.php">Remove requests</a></li>
					<li><a href="addUpdateGrp.php">Modify Groups</a></li>
					<li><a href="all_Bugs.php">Bug Tracker</a></li>
					<!--li><a href="feedback_view.php">View Feedbacks</a></li-->
					<!--li><a href="allForm.php">AllForms</a></li-->
                                        <!--li><a href="myRequests.php">My Requests</a></li-->

				</ul>
				<!--h2>Category 2</h2>
				<ul class="list-style1">
					<li class="first"><a href="#">Cat</a></li>
					<li><a href="#">Cat</a></li>
					<li><a href="#">Cat</a></li>
					<li><a href="#">Cat</a></li>
				</ul-->
			<?php }else{ //Else, display the following nav bar ?>
				<h2>Navigation</h2>
				<ul class="list-style1">
					<li class="first"><a href="requestForm.php">Create Request</a></li>
					<li><a href="nhome.php">Availability Status</a></li>
					<li><a href="search.php">Advanced Search</a></li>
					<li><a href="table.php?view=All">View requests</a></li>
                                        <li><a href="myRequests.php">My Requests</a></li>
                                        <li><a href="all_Bugs.php">Report Bugs</a></li>

				</ul>

			<?php } ?>
			</div>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
<div id="footer">
	<p><a href="humans.txt">Developed by Teams <b>17, 18 and 42</b></a> as a part of their <b>SSAD</b> Project. Template based on <a href="http://www.freecsstemplates.org">Trendybiz</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
