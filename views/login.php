<html>
	<head>
		<title>Login</title>
		<script src="../assets/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</head>
	<?php include 'navbar.php' ?>
	<body>
		<div class="container">	
			<div class="col-md-3">	
			
			</div>

			<div class="col-md-6">
				<?php if( isset($_GET['error']) ): ?>
					<div class="alert alert-danger alert-dismissible">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						 	<span aria-hidden="true">&times;</span>
						 </button>
						<?= $_GET['error'] ?>
					</div>
				<?php endif; ?>

				<div class="panel panel-info">
					<div class="panel panel-heading">
						<h3 class="panel-title">Login</h3>
					</div>
					<form method="post" action="login1.php">
						<div class="panel panel-body">
							<div class="form-group">
								<label>Employee ID</label>
								<input type="text" class="form-control" name="empId" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>						
							<div class="col-md-12 text-center">
								<input type="submit" class="btn btn-default" value="Login">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-3">
			
			</div>
		</div>
	</body>
</html>