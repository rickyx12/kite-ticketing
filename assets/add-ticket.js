    
    	function getTicket(json) {
    		$.getJSON(json,'',function(result) {
    			var tableData = '';
    			console.log(result);

    			if(result != "null") {
	    			$.each(result,function(i,field) {	
	    				 tableData += '<tr>';
	    				 tableData += '<td>'+field.subject+'</td>';
	    				 tableData += '<td>'+field.title+'</td>';
	    				 tableData += '<td>'+field.start+'</td>';
	    				 tableData += '<td>'+field.end+'</td>';
	    				 tableData += '<td>'+field.activity+'</td>';
	    				 tableData += '<td>'+field.remarks+'</td>';
	    				 tableData += '<td><input type="checkbox" value="'+field.id+'" class="publish" checked>'
	    				 tableData += '</tr>';
	    			});
    			}else {
    				tableData += '<tr></tr>';
    			}

    			 $('#ticket-table').html(tableData);
    		});
    	}

    	function getPublishedTicket(json) {
    		$.getJSON(json,'',function(result) {
    			var tableData = '';
    			console.log(result);

    			if(result != "null") {
	    			$.each(result,function(i,field) {	
	    				 tableData += '<tr>';
	    				 tableData += '<td>'+field.ticketNo+'</td>';
	    				 tableData += '<td>'+field.date+'</td>';
	    				 tableData += '<td><form id="ticket-form'+field.ticketNo+'" action="ticket-form.php" method="post" target="_blank"><input type="hidden" name="ticketNo" value="'+field.ticketNo+'"><div class="btn-group"><button id="view-published-btn'+field.ticketNo+'" class="btn btn-default">View</button><button class="btn btn-danger">Print</button></div></form></td>';
	    				 tableData += '</tr>';

	    				 $(document).on('click','#view-published-btn'+field.ticketNo,function(event){
	    				 	$('#ticket-form'+field.ticketNo).submit();
	    				 });

	    			});
    			}else {
    				tableData += '<tr></tr>';
    			}

    			 $('#published-ticket-table').html(tableData);
    		});
    	}

$(function(){

	getTicket('ticket-json-encoder.php');
	getPublishedTicket('published-ticket-json-encoder.php');


	$('#add-ticket-btn').click(function(){

		var subject = $('#subject').val();
		var title = $('#title').val();
		var start = $('#start-time').val(); 
		var end = $('#end-time').val();
		var activity = $('#activity').val();
		var remarks = $('#remarks').val();

		var data = {
			subject:subject,
			title:title,
			start:start,
			end:end,
			activity:activity,
			remarks:remarks
		};

		$.ajax({
			url:'add-ticket.php',
			type:'POST',
			data:data,
			success:function(){
				getTicket('ticket-json-encoder.php');
				$('#subject').val('');
				$('#title').val('');
				$('#start-time').val('');
				$('#end-time').val('');
				$('#activity').val('');
				$('#remarks').val('');
			}
		});

	});	

	$('#publish-btn').click(function(){

		swal({
		  title: "Publish?",
		  text: "Once publish, you will not be able to undo this action",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willPublish) => {
		  if (willPublish) {
		    swal("Published!", {
		      icon: "success",
		    });

				var chkArray = [];
				
				$(".publish:checked").each(function() {
					chkArray.push($(this).val());
				});
				
				
				var selected;
				selected = chkArray.join(',') ;
				$.ajax({
					url:'publish.php',
					type:'POST',
					data:{ids:selected},
					success:function(){
						getTicket('ticket-json-encoder.php');
					}
				});

		  } 
		});
	});

});

$('#start-time').timepicker();
$('#end-time').timepicker();