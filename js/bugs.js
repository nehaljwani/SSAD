$(document).ready(function() {
		$('#addBugs').show();
		$('#viewBugs').hide();
		$('#addbugs').click(function(){
			$('#addBugs').show();
			$('#viewBugs').hide();
			$('#delbtn').hide();
			});
		$('#viewbugs').click(function(){
			$('#addBugs').hide();
			$('#viewBugs').show();
			$('#delbtn').hide();
			});
		})

