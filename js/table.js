$(document).ready(function() {
	$('#cancelForm').hide()
	$buttons=['All','Pending','Rejected','nonConflicts','Conflicts','Cancelled','Accepted'];
	for($i=0;$i<$buttons.length;$i++){
		$('#'+$buttons[$i]).click(function(){
			window.location.replace('table.php?view='+$(this).attr('id'));
		})
	}
	$('.cancelBtn').click(function(){
		$('#box-table-a').hide();
		$('#cancelForm').show();
		$('#cancelForm td input').val(($(this).val()));
	})
})
