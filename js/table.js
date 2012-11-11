$(document).ready(function() {
	$buttons=['All','Pending','Rejected','nonConflicts','Conflicts'];
	for($i=0;$i<$buttons.length;$i++){
		$('#'+$buttons[$i]).click(function(){
			window.location.replace('table.php?view='+$(this).attr('id'));
		})
	}
})
