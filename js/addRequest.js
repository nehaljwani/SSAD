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
				$day=$('select#eventStartDate_Day_ID.calendarDateInput.myday').attr('value');
				$('select#eventEndDate_Day_ID.calendarDateInput.myday').attr('value',$day);
				$month=$('select#eventStartDate_Month_ID.calendarDateInput.mymonth').attr('value')
				$('select#eventEndDate_Month_ID.calendarDateInput.mymonth').attr('value',$month);
				$('#endDate').hide();
				$('#startDate').children().first().html('Event Date');
			}
			else{
				$('.days').show();
				$('#endDate').show();
				$('#startDate').children().first().html('Start Date');
			}
		});
		$('select#eventStartDate_Month_ID.calendarDateInput.mymonth').change(function(){
                 	var checkStatus = $('#repType1').is(':checked');
			if(checkStatus == true){
				$month=$('select#eventStartDate_Month_ID.calendarDateInput.mymonth').attr('value')
				$('select#eventEndDate_Month_ID.calendarDateInput.mymonth').attr('value',$month);
				$("#reqForm :input[name='eventEndDate']").val($("#reqForm :input[name='eventStartDate']").val())
			}
		})
		$('select#eventStartDate_Day_ID.calendarDateInput.myday').change(function(){
                 	var checkStatus = $('#repType1').is(':checked');
			if(checkStatus == true){
				$day=$('select#eventStartDate_Day_ID.calendarDateInput.myday').attr('value');
				$('select#eventEndDate_Day_ID.calendarDateInput.myday').attr('value',$day);
				$("#reqForm :input[name='eventEndDate']").val($("#reqForm :input[name='eventStartDate']").val())
			}
		})
		$('#buildingName').change(function() {
			$building=($('#buildingName').val());
			$("select.room").children(':not(#'+$building+')').css('display','none');
			$("select.room").children('#'+$building).css('display','block');
			$("select.room").children('#'+$building).first().attr('selected','selected');
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
		$('#endDate').hide();
		$('#startDate').children().first().html('Event Date');
});
