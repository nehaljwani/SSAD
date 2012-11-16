$(document).ready(function(){
	$('#Mname').hide();
	$('#email').hide();
	$('#heade').hide();
	$('#td1').hide();
	$('#td2').hide();
	$('#submit').hide();
	$('#tablehead').hide();
	$('#deleteform').hide();
	for($i=0;$i<100;$i++){
		if($('#grop'+$i).length){
			$('#grop'+$i).hide();
		}
	}
	
	$('#Gpname').change(function(){
	$('#Mname').hide();
	$('#email').hide();
	$('#heade').hide();
	$('#td1').hide();
	$('#td2').hide();
	$('#submit').hide();
	$('#tablehead').hide();
	$('#deleteform').hide();
		for($i=0;$i<100;$i++){
		         if($('#grop'+$i).length){
				        $('#grop'+$i).hide();
					 }
					 }

		$('#Gpname option').each(function() {
			if($(this).is(':selected')) { 
			$('#Mname').show();
			$('#email').show();
			$('#heade').show();
			$('#td1').show();
			$('#td2').show();
			$('#submit').show();
			$('#tablehead').show();
			$('#deleteform').show();
				$sel=$(this).attr('id');  
				$('#grop'+$sel).show();
			}
			})
		})
})
