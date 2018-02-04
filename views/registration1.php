<?php
	require '../class/database.php';
	require_once '../class/Bcrypt.php';

	$empId = $_POST['empId'];
	$password = $_POST['password'];
	$employeeName = $_POST['employeeName'];
	$role = $_POST['role'];

	$db = new database();

	$data = array(
		"employeeId" => $empId,
		"password" => Bcrypt::hashPassword($password),
		"name" => $employeeName,
		"role" => $role
	);

	$db->insertNow('user',$data);
	header("Location: registration.php");
?>