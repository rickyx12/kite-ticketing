<?php
	require_once '../session/session.php';
	require '../class/database.php';

	$db = new database();
?>
<html>
	<head>
		<title>Ticket</title>
		<script src="../assets/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
		<script src="../assets/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

		<script src="../assets/sweetalert.min.js"></script>

		<link rel="stylesheet" type="text/css" href="../assets/tooltipster/dist/css/tooltipster.bundle.min.css" />
		<script src="../assets/tooltipster/dist/js/tooltipster.bundle.min.js"></script>

	</head>
	<?php include 'navbar.php' ?>
	<body>
		<div class="container">
		
	<div>

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#ticket" aria-controls="home" role="tab" data-toggle="tab">Ticket</a></li>
	    <li role="presentation"><a href="#published" aria-controls="profile" role="tab" data-toggle="tab">Published</a></li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="ticket">
	    	<?php if($db->doubleSelectNow('ticket','ticketNo','status','publish','date',date("Y-m-d")) == "" ): ?>
				<div class="col-md-12 allow">
					<div class="row">
						<div class="col-md-12 text-right">
							<br>
							<button class="btn btn-default" data-toggle="modal" data-target="#new-ticket-modal">
								New Task
							</button>					
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Subject</th>
										<th>Code/Title</th>
										<th>Start</th>
										<th>End</th>
										<th>Activity</th>
										<th>Remarks</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="ticket-table">
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-right">
							<button id="publish-btn" class="btn btn-success btn-publish">Publish <i class="glyphicon glyphicon-ok"></i></button>
						</div>	
					</div>
				</div>

				<div class="col-md-2 not-allow">
					
				</div>
				<div class="col-md-8 not-allow">
					<br><br><br>
					<center>
					<div class="alert alert-danger text-center">
						Your Ticket for today is already published
					</div>
				</div>
				<div class="col-md-2">
					
				</div>				
			<?php else: ?>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-8">
					<br><br><br>
					<center>
					<div class="alert alert-danger text-center">
						Your Ticket for today is already published
					</div>
				</div>
				<div class="col-md-2">
					
				</div>
			<?php endif; ?>	    	
	    </div>

	    <div role="tabpanel" class="tab-pane" id="published">
	    	<br>
	    	<div class="row">
	    		<div class="col-md-4">
	    			<div class="input-group">
	    				<input type="text" id="search-ticket" class="form-control" placeholder="Search">
	    				<span class="input-group-addon">
	    					<i class="glyphicon glyphicon-search"></i>
	    				</span>
	    			</div>
	    		</div>
	    	</div>
	    	<br>
			<div class="row">
				<div class="col-md-8">
					<table class="table table-bordered">
				       	<thead>
				       		<tr>
				       			<th>Ticket#</th>
				       			<th>Date</th>
				       			<th></th>
				       		</tr>
				       	</thead>
				       	<tbody id="published-ticket-table">
				       	</tbody>
				    </table>
			    </div>		
			</div>	    	
	    </div>
	  </div>

	</div>
		</div>



		<div id="new-ticket-modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">New Task</h4>
		      </div>
		      <div class="modal-body">
			       	<div class="form-group">
			       		<label>Subject</label>
			       		<input type="text" class="form-control" id="subject">
			       	</div>
			       	<div class="form-group">
			       		<label>Code/Title</label>
			       		<input type="text" class="form-control" id="title">
			       	</div>
			       	<div class="form-group">
			       		<label>Start</label>
				        <div class="input-group bootstrap-timepicker timepicker">
				            <input id="start-time" type="text" class="form-control input-small">
				            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				        </div>
			       	</div>
			       	<div class="form-group">
			       		<label>End</label>
				        <div class="input-group bootstrap-timepicker timepicker">
				            <input id="end-time" type="text" class="form-control input-small">
				            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				        </div>
			       	</div>		       	<div class="form-group">
			       		<label>Activity</label>
			       		<input type="text" class="form-control" id="activity">
			       	</div>
			       	<div class="form-group">
			       		<label>Remarks</label>
			       		<input type="text" class="form-control" id="remarks">
			       	</div>		       	
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">		
		        	Close
		        </button>
		        <button type="button" id="add-ticket-btn" class="btn btn-success" data-dismiss="modal">
		        	Add
		        </button>
		      </div>
		    </div>

		  </div>
		</div>


	</body>
	<script src="../assets/add-ticket.js"></script>
</html>