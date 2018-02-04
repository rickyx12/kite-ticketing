<html>
	<head>
		<title>Registration</title>
		<script src="../assets/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	</head>
	<?php include 'navbar.php' ?>
	<body>
		<div class="container">	
			<div class="col-md-3">	
			
			</div>

			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel panel-heading">
						<h3 class="panel-title">Registration</h3>
					</div>
					<form method="post" action="registration1.php">
						<div class="panel panel-body">
								<div class="form-group">
									<label>Employee ID</label>
									<input type="text" name="empId" class="form-control" autocomplete="off">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label>Name</label>	
									<input type="text" name="employeeName" class="form-control" autocomplete="off">							
								</div>
								<div class="form-group">
									<label>Role</label>
									<select name="role" class="form-control">
										<option value="user">User</option>
										<option value="admin">Admin</option>
									</select>
								</div>						
							<div class="col-md-12 text-center">
								<input type="submit" class="btn btn-default" value="Register">
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