$(document).ready(function() {
		$('.days').hide();
		$('.CP').hide();
		$('#switchAlias').click(function() {
                 	var checkStatus = $(this).is(':checked');
			if(checkStatus === false){
				$('.CP').hide();
			}
			else{
				$('.CP').show();
			}
		});
		$('.repeat').change(function() {
                 	var checkStatus = $('#repType1').is(':checked');
			if(checkStatus == true){
				$('.days').hide();
			}
			else{
				$('.days').show();
			}
		});
		$('#buildingName').change(function() {
			$building=($('#buildingName').val());
			$("select.room").children(':not(#'+$building+')').css('display','none');
			$("select.room").children('#'+$building).css('display','block');
		});
		$('#eventStartTime').change(function() {
			$("#eventEndTime").get(0).selectedIndex=($("#eventStartTime").get(0).selectedIndex+1)%48;

		});
		$("#all").change( function() {
			if($("#all").prop('checked')==true){
	   			$('.weekday').each(function(){    $(this).prop('checked','true')    });
			}
			else {
		           $('.weekday').each(function(){    $(this).removeAttr('checked')    });
			}
		})
		$('.weekday').change(function(){ 
	  	        if($('input.weekday:checked').length==7) { 
			 	   $('#all').prop('checked','true')    
			}
			else {  
				$('#all').removeAttr('checked')     
			}        
		})
});
