function getPublishedTicket(json) {
	$.getJSON(json,'',function(result) {
		var tableData = '';
		console.log(result);

		if(result != "null") {
			$.each(result,function(i,field) {	
				 tableData += '<tr>';
				 tableData += '<td>'+field.ticketNo+'</td>';
				 tableData += '<td>'+field.date+'</td>';
				 tableData += '<td>'+field.employee+'</td>'
				 tableData += '<td><form id="ticket-form'+field.ticketNo+'" action="ticket-form.php" method="post" target="_blank" style="margin-bottom:0px;"><input type="hidden" name="ticketNo" value="'+field.ticketNo+'"><div class="btn-group"><button id="view-published-btn'+field.ticketNo+'" class="btn btn-default">View</button></div></form></td>';
				 tableData += '</tr>';

				 $(document).on('click','#view-published-btn'+field.ticketNo,function(event){
				 	$('#ticket-form'+field.ticketNo).submit();
				 });

			});
		}else {
			tableData += '<tr></tr>';
		}

		 $('#admin-published-ticket-table').html(tableData);
	});
}

function getTodayPublishedTicket(json) {
	$.getJSON(json,'',function(result) {
		var tableData = '';
		console.log(result);

		if(result != "null") {
			$.each(result,function(i,field) {	
				 tableData += '<tr>';
				 tableData += '<td>'+field.ticketNo+'</td>';
				 tableData += '<td>'+field.date+'</td>';
				 tableData += '<td>'+field.employee+'</td>'
				 tableData += '<td><form id="ticket-form'+field.ticketNo+'" action="ticket-form.php" method="post" target="_blank" style="margin-bottom:0px;"><input type="hidden" name="ticketNo" value="'+field.ticketNo+'"><div class="btn-group"><button id="view-published-btn'+field.ticketNo+'" class="btn btn-default">View</button></div></form></td>';
				 tableData += '</tr>';

				 $(document).on('click','#view-published-btn'+field.ticketNo,function(event){
				 	$('#ticket-form'+field.ticketNo).submit();
				 });

			});
		}else {
			tableData += '<tr></tr>';
		}

		 $('#admin-published-ticket-today').html(tableData);
	});
}

$(function(){

	setInterval(function(){
		getTodayPublishedTicket('today-published-json-encoder.php');
		},10000);

	getPublishedTicket('published-ticket-json-encoder.php');

	$('#search-ticket').keyup(function(){
		var search = $('#search-ticket').val();
		getPublishedTicket('search-published-ticket-json-encoder.php?search='+search);
	});

});