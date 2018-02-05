<?php
	require_once '../session/session.php';
?>

<html>
	<head>
		<title>Admin</title>
		<script src="../assets/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>		
		<script src="../assets/admin-panel.js"></script>
	</head>
	<?php include 'navbar.php' ?>
	<body>
		<div class="container">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		  	<li role="presentation" class="active"><a href="#today" aria-controls="home" role="tab" data-toggle="tab">Today</a></li>
		    <li role="presentation"><a href="#published" aria-controls="home" role="tab" data-toggle="tab">Published</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">

		  	<div role="tabpanel" class="tab-pane active" id="today">
		  		<br>
		  		<div class="row">
		  			<div class="col-md-6">
		  				<table class="table table-bordered">
		  					<thead>
		  						<tr>
		  							<th>Ticket#</th>
		  							<th>Date</th>
		  							<th>Employee</th>
		  							<th></th>
		  						</tr>
		  					</thead>
		  					<tbody id="admin-published-ticket-today">
		  					</tbody>
		  				</table>
		  			</div>
		  		</div>
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
		    		<div class="col-md-6">
				    	<table class="table table-bordered">
				    		<thead>
				    			<tr>
				    				<th>Ticket#</th>
				    				<th>Date</th>
				    				<th>Employee</th>
				    				<th></th>
				    			</tr>
				    		</thead>
				    		<tbody id="admin-published-ticket-table">
				    		</tbody>
				    	</table>
			    	</div>
		    	</div>
		    </div>
		  </div>		
		</div>
	</body>
</html>