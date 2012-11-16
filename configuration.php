<?php 

require_once('essential.php');
require_once('header.php');
?>
<h2 class="title">Configuration Data</h2>
<h3 class="title">Semester Slots</h3>
<script type="text/javascript">

function blah(id , bool) {
	if(bool) {
		document.getElementById(id).readOnly = true;
	}
	else {
		
		document.getElementById(id.concat('1')).readOnly = false;
		document.getElementById(id.concat('2')).readOnly = false;
	}
}

</script>
</head>
<form name='configuration' action='confirm_configuration.php' method='post'>
<table id="box-table-a">
<tr>
<thead>
<th scope="col">Name</th>
<th scope="col">Start Date</th>
<th scope="col">End Date</th>
<th scope="col">Edit</th>
</tr>
</thead>
<?php
$queue="select * from Configuration;";
$resu=execute($queue);
$pri=0;
$gh=0;
while($row=mysql_fetch_row($resu))
{
	?>
		<tr>
		<?php
		$i=0;
	foreach($row as $col){
		if($i==0){
			$pri=$col;
		}
		?>
			<td><input type="text"  id="<?php echo 'ta'.$gh.$i; ?>" value='<?php echo $col;?>' name="<?php echo 'ta'.$gh.$i; ?>"/> </td>
	<script> blah("<?php echo 'ta'.$gh.$i; ?>",'1') </script>
			<?php 
			$i++;
	} ?>
		<td><button type="button" onclick="blah('<?php echo 'ta'.$gh; ?>',false)">Edit</button></td>
		</tr>
		<?php 
	$gh++;
}
		?>
		</table>
		<input type='submit' name='add' value='Update'/>
		</form>

<h4 class="title">Limits</h4>

<form id='setLimit' action='confirm_configuration.php' method='post'>
<table id="box-table-a">
<tr>
<thead>
<th scope="col">Desc</th>
<th scope="col">Days</th>
</tr>
</thead>
<?php
$queue="select * from Limits;";
$resu=execute($queue);
$pri=0;
$gh=0;
while($row=mysql_fetch_assoc($resu))
{
	?>
		<tr>
			<td><input type='text' name='Name' value='<?php echo $row['Name']; ?>'></td>
			<td><input type='text' name='Days' value='<?php echo $row['Days']; ?>'></td>
		</tr>
	<?php
}
		?>
		</table>
		<input type='submit' name='limit' value='Update'/>
		</form>


<?php require_once('footer.php'); ?>
