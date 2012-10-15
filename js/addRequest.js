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
		/*	function t2s(time) {
				    time = time.split(/:/);
				        return time[0] * 3600 + time[1] * 60 + time[2];
			}*/
		$('#eventStartTime').change(function() {
/*			$('#eventEndTime').children().each(function(){ 
				if(parseInt(t2s($(this).val()))<=parseInt(t2s($('#eventStartTime').val()))){
					$(this).css('display','none');
				} 
				else{
					$(this).css('display','inherit');
				}
			});
*/
//			$('#eventEndTime :nth-child(4)').attr('selected', 'selected') // To select via index
			$("#eventEndTime").get(0).selectedIndex=($("#eventStartTime").get(0).selectedIndex+1)%48;

		});
});
