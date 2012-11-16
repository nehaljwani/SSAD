<?php 
include('essential.php');
include('header.php'); 
include("adminOnly.php");

$query = "select * from CourseRooms";
$result = execute($query);
$row = mysql_fetch_array($result);
$empty=0;
if($row)
{
	$empty=0;
}
else
{
	$empty=1;
}


?>
<script type="text/javascript">

function confirm_allocation()
{
		var conf = confirm("Allocation has been done already. Are you sure to Reallocate ?");
		if(conf == true)
		{
			window.location = 'predef.php';
		}
}

</script>

<form name='predef' action="my.php" method='post'>
<table align='left'>

 <h2 align='left'>lectures</h2><br/>
<ul class="list-style1">

<tr>
<td><li><a href="file.php" id="mybody">File Upload</a></li><br/></td></tr><br/>
<tr>
<td><li><a href="a.php" id="mybody">Clashes</a></li><br></td>
</tr>
<tr>
<td><li><a href="#" onclick="confirm_allocation()" id="mybody">Allocate</li><br></td>
</tr>
<tr>
<td><li><a href="courses.php" id="mybody">Modify Course Details</a></li><br/></td>
</tr>
<tr>
<td><li><a href="modifyrooms.php" id="mybody">Modify Rooms</a></li><br/></td>
</tr>
<td><li><a href="allviews.php" id="mybody">All Views</a></li><br></td>
</tr>
                </table>
                </form>
                </table>
                </form>
<br/><br/><br/><br/><br/>
<?php include('footer.php'); ?>
