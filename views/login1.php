<?php
	session_start();
	require "../class/database.php";
	require_once "../class/Bcrypt.php";		

	$empId = $_POST['empId'];
	$password = $_POST['password'];

	$db = new database();

	$hashedPassword = $db->selectNow('user','password','employeeId',$empId);

	if($db->selectNow('user','id','employeeId',$empId) != "") {
		if(Bcrypt::checkPassword($password,$hashedPassword)) {
			$_SESSION['id'] = $db->selectNow('user','id','employeeId',$empId);
			
			if($db->selectNow('user','role','employeeId',$empId) == "user") {
				header("Location: ticket.php");
			}else {
				header("Location: admin-panel.php");
			}
		}else {
			header("Location: login.php?error=Authentication Error");
		}
	}else {
		header("Location: login.php?error=Authentication Error");
	}

?>