<?php
	require '../class/database.php';
	require_once '../class/Bcrypt.php';

	$empId = $_POST['empId'];
	$password = $_POST['password'];
	$employeeName = $_POST['employeeName'];

	$db = new database();

	$data = array(
		"employeeId" => $empId,
		"password" => Bcrypt::hashPassword($password),
		"name" => $employeeName
	);

	$db->insertNow('user',$data);
	header("Location: registration.php");
?>