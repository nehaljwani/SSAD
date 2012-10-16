$(document).ready(function() {
	var n=$('#box-table-a').find('th').length
	w=[]
	for(i=0;i<n;i++)
	w.push(0)
	i=0
	$('.myTable').find('tbody').each(function(){$(this).find('tr:first').each(function(){$(this).find('td').each(function(){
		currw=$(this).width()
		if(currw>w[i])
		w[i]=currw
		i=(i+1)%n
	})})})
	i=0
	$('#box-table-a').find('thead').each(function(){$(this).find('tr:first').each(function(){$(this).find('th').each(function(){
		$(this).width(w[i])
		i=(i+1)%n
	})})})
	$('.myTable').find('tbody').each(function(){$(this).find('tr:first').each(function(){$(this).find('td').each(function(){
	$(this).width(w[i])
	i=(i+1)%n
})})})

});
